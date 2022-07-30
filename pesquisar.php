<?php
include "DB.php";
include "estilo.php";
include "artista.php";
include "gravadora.php";
include "cd.php";

$cds='';
if(isset($_POST['botao']) && $_POST['botao']=="Confirmar"){
    if($_POST['nomedoartista'] != '' ){
        $name= $_POST['nomedoartista'];
        $sql = "SELECT idArtista FROM artista WHERE nome LIKE '%".$name."%'";
        $db = new DB();
        $name = $db->search($sql);
        $idArtista = $name[0]['idArtista'];
    } else{
        $idArtista='';
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
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Pesquisar</title>
</head>
<style>
    body {
        text-align: center;
        background-color: whitesmoke;
        font-size: 30px;
    } 
    table{
        border-color: black;
        border: 1px;
    }
</style>

<body>
    <h1> PESQUISAR </h1>
    <form method="POST" enctype="multipart/form-data">
        <label for='nomedoartista'>Nome do artista:</label>
    <?php echo"<input type='text' name='nomedoartista'>"; ?><br>
        <label for='ano'>Ano:</label>
    <?php echo"<input type='int' name='ano' >" ?><br>
        <label for='titulo'>Título:</label>
    <?php echo"<input type='text' name='titulo'>" ?><br>
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
    <div class="container">
    <table class="table">
        <thead>
            <tr>
                <th>Título do CD</th>
                <th>Ano de lançamento</th>
                <th>Artista Musical</th>
                <th>Gravadora do CD</th>
                <th>Estilo Musical</th>
            </tr>
        </thead>

        <?php

        if ($cds!='') {
            foreach ($cds as $cd) {
                echo "<tr>";
                echo "   <td>" . $cd['titulo'] . "</td>";
                echo "   <td>" . $cd['ano'] . "</td>";
                $artista = new artista('');
                $nomeArtista = $artista->listarArtista($cd['artista_idArtista']);
                echo "<td>".$nomeArtista[0]['nome']. "</td>";
                $gravadora = new gravadora('');
                echo "<td>" .$gravadora->listarGravadora($cd['gravadora_idGravadora'])[0]['identificacao']. "</td>";
                $estilo = new estilo('');
                echo "<td>" .$estilo->listarEstilo($cd['estilo_idEstilo'])['0']['identificacao']. "</td>";
                
                }
        } else {
            echo '<tr> <td>Não há CDs para os filtros correspondentes!</td> </tr>';
        }

        ?>

    </table>
    </div>
    <a href='index.php'>Voltar</a>

</body>

</html>