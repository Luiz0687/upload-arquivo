<?php
$conexao = mysqli_connect("localhost", "root","","upload-arquivo");
$sql = "SELECT * FROM arquivo";
$resultado = mysqli_query($conexao, $sql);
if ($resultado != false){
    $arquivos = mysqli_fetch_all($resultado,MYSQLI_BOTH);
} else {
    echo "Erro ao executar comando  SQL.";
    die();
}
?>


<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>uploads de arquivos</title>
</head>
<body>
    <form action = "upload.php" method = "post" enctype = "multipart/form-data">
        selecione o arquivo:
        <input type = "file" name = "arquivo"><br>
        <input type = "submit" value = "enviar">
        <table>
            <thead>
            <tr>
                <th>nome do arquivo</th>
                <th colspan="2"> opções</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($arquivos as $arquivo) {
             echo "<tr><td>".$arquivo ['nome_arquivo'] . "</td>";
             echo "<td><a href='alterar.php?nome_arquivo=" . 
            $arquivo['nome_arquivo']."'>alterar</td>";
            echo "<td><button>excluir</button></td></tr>";
            }
         ?>
        </tbody>
        </table>
</body>
</html>