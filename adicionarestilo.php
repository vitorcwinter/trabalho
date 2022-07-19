<?php
include "../BD.php"; // include inclui um arquivo dentro de outro
session_start();
if(isset($_POST['botao'])){
    if($_POST['botao']=="Enviar"){
        $sql = "insert into estilo (identificacao) values('{$_POST['nome']}')";
        $mysqli->query($sql);
        header("location: ../index.php");
    
    }
}
?>

<form id="formulario" action = "estilo.php" method = "POST">
    <fieldset>
        <h1> Adicionar estilo</h1>
        <p>
            <label for= "nome">Identificação: </label>
            <input name="nome" id="nome" type="text" />
        </p>
    </fieldset>
    <p>
        <input name="botao" type="submit" value="Enviar" id="enviar"/>
    </p>
</form>