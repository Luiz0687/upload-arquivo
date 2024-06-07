<?php
$nome_arquivo = $_GET['nome_arquivo'];
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>alterar</title>
</head>
<body>
    <form action = "upload.php" method = "post" enctype = "multipart/form-data">
        alterando o arquivo <?= $nome_arquivo ?>: <br>
        <input type = "hidden" name = "nome_arquivo" value="<?=$nome_arquivo ?>">
        <input type = "file" name = "arquivo"><br>
        <input type = "submit" value = "enviar">
</form>

</body>


</html>




