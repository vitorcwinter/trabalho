<?php
include "DB.php";
include "artista.php";
if (isset($_POST['botao'])) {
    if ($_POST['botao'] == "Confirmar") {
        $novoArtista = new artista($_POST['nome']);
        $novoArtista->addArtista();
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
    <title>Adicionar Artista</title>
</head>
<style>
    body {
        text-align: center;
        background-color: whitesmoke;
        font-size: 30px;
    }
</style>

<body>
    <form id="formulario" action="" method="POST" enctype="multipart/form-data">
        <?php echo "<h1> Adicionar Artista</h1>"; ?>
        <p>
            <label for="nome">Nome do Artista: </label>
            <?php echo "<input name='nome' id='nome' type='nome' />"; ?>
        </p>
        <p>
            <?php echo "<input name='botao' type='submit' value='Confirmar'/>"; ?>
        </p>
    </form>
</body>

</html>