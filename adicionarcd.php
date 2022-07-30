<?php
include "DB.php";
include "estilo.php";
include "artista.php";
include "gravadora.php";
include "cd.php";

$estilos=estilo::listarestilos();
$artistas=artista::listarartistas();
$gravadoras=gravadora::listargravadoras();


if(isset($_POST['botao'])){
    if($_POST['botao']=="Confirmar"){
        $newCD = new cd($_POST['nome'],$_POST['ano'],$_POST['artista'],$_POST['gravadora'],$_POST['estilo']);
        $newCD->addCD();
        header("location: index.php");
    
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar CD</title>
</head>
<style> 
body{
    text-align: center;
    background-color: whitesmoke;
    font-size: 30px;
}
</style>
<body>
<form id="formulario" action ="" method = "POST" enctype="multipart/form-data">
       <?php echo "<h1> Adicionar CD</h1>"; ?>
        <p>
            <label for= "nome">Título do CD: </label>
            <?php echo "<input required name='nome' id='nome' type='text' />"; ?>
        </p>
        <p>
            <label for= "nome">Ano do CD: </label>
            <?php echo "<input required name='ano' id='nome' type='int' />"; ?>
        </p>
        <p>
        <label for= "nomeestilo">Selecione o estilo: </label> <select required name="estilo">
            <option></option>
            <?php
        foreach($estilos as $estiloAux){
            echo "<option value='".$estiloAux['idEstilo']."' >".$estiloAux['identificacao']."</option>"; 
        }

?> 



        </select> </br>
        </p>
        <p>
    <label for= "nomeartista">Selecione o artista: </label> <select required name="artista">
    <option></option>
    <?php
        foreach($artistas as $artistaAux){
            echo "<option value='".$artistaAux['idArtista']."' >".$artistaAux['nome']."</option>"; 
        }

?> 



    </br>
    </select> </br>
    </p>
    <p>
    <label for= "nomegravadora">Selecione a gravadora: </label> <select required name="gravadora">
    <option></option>
    <?php
        foreach($gravadoras as $gravadoraAux){
            echo "<option value='".$gravadoraAux['idGravadora']."' >".$gravadoraAux['identificacao']."</option>"; 
        }

?> 
</select>
</p>

    <p>
<?php echo "<input name='botao' type='submit' value='Confirmar'/>"; ?>
    </p>
</form> 
</body>
</html>