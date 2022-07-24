<?php
include "DB.php";
include "estilo.php";
include "artista.php";
include "gravadora.php";
include "cd.php";

if(isset($_POST['botao']) && $_POST['botao']=="Confirmar"){
    if($_POST['nomedoartista'] != '' ){
        $name= $_POST['nomedoartista'];
        $sql = "SELECT idArtista FROM artista WHERE nome LIKE '%".$name."%' LIMIT 1";
        $db = new DB();
        $name = $db->search($sql);
        $idArtista = $name[0]['idArtista'];
    } else{
        $name='';
    }
    $newCd = new cd($_POST['titulo'],$_POST['ano'], $idArtista, $_POST['gravadora'], $_POST['estilo']);
    $cds = $newCd->pesquisar();
}

$estilos = estilo::listarestilos();
$artistas = artista::listarartistas();
$gravadoras = gravadora::listargravadoras();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar</title>
</head>
<style>
    body {
        text-align: center;
        background-color: whitesmoke;
        font-size: 30px;
    }
</style>

<body>
    <h1> PESQUISAR </h1>
    <form method="POST" enctype="multipart/form-data">
        <label for='nomedoartista'>Nome do artista:</label>
    <?php echo"<input name='nomedoartista' id='nomedoartista' type='text'>"; ?><br>
        <label for='ano'>Ano:</label>
    <?php echo"<input name=ano id=ano type='number'>" ?><br>
        <label for='titulo'>Título:</label>
    <?php echo"<input name=titulo id=ano type='text'>" ?><br>
        <label for='titulo'>Estilo:</label>
        <select name="estilo">
            <option></option>
            <?php
            foreach ($estilos as $estiloAux) {
                echo "<option value='" . $estiloAux['idEstilo'] . "' >" . $estiloAux['identificacao'] . "</option>";
            }

            ?>



        </select> </br>
        <label for='titulo'>Gravadora:</label>
        <select name="gravadora">
            <option></option>
            <?php
            foreach ($gravadoras as $gravadoraAux) {
                echo "<option value='" . $gravadoraAux['idGravadora'] . "' >" . $gravadoraAux['identificacao'] . "</option>";
            }

            ?>
        </select>
        <p>
            <?php echo "<input name='botao' type='submit' value='Confirmar'/>"; ?>
        </p>
    </form>
    <table>
        <thead>
            <tr>
                <th>Título do CD</th>
                <th>Ano de lançamento</th>
                <th>Gravadora do CD</th>
                <th>Artista Musical</th>
                <th>Estilo Musical</th>
            </tr>
        </thead>

        <?php

        if ($cds) {
            foreach ($cds as $cd) {
                echo "<tr>";
                echo "   <td>" . $cd['titulo'] . "</td>";
                echo "   <td>" . $cd['ano'] . "</td>";
                echo "   <td>" . $gravadora->listarGravadora($cd['Idgravadora'])->getNome() . "</td>";
                echo "   <td>" . $artista->listarArtista($cd['Idartista'])->getNome() . "</td>";
                echo "   <td>" . $estilo->listarEstilo($cd['Idestilo'])->getNome() . "</td>";
                echo "</tr>";
                }
        } else {
            echo '<tr> <td>Não há CDs para os filtros correspondentes!</td><td></td><td></td><td></td><td></td> </tr>';
        }

        ?>

    </table>
    <a href='../index.html'>Voltar</a>

</body>

</html>