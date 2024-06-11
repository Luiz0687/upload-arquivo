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
</form>
        <table border="1px">
            <thead>
            <tr>
                <th>nome do arquivo</th>
                <th colspan="2"> opções</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($arquivos as $arquivo) {
                $arq = $arquivo['nome_arquivo'];
            echo "<tr>"; //Inciar a linha
            echo "<td> $arq </td>";//primeira coluna com o nome do arquivo
            echo "<td>"; //inicia a segunda coluna 
            echo "<a "; //abriu o link
            echo "href='alterar.php?nome_arquivo=$arq'>";
            echo "alterar</td>";//Imprimiu o texto da teg a
            echo "</a>";//Fcehou o link
            echo "</td>";//fechei a segunda coluna
            echo "<td>"; //abriu a terceira coluna
            echo "<button ";//abriu o botão
            echo "onclick=";//criou o atributo onclick
            echo "'excluir(\"$arq\")'>";//chamamos a funcao excluir 
            echo "excluir";//mostra o texto botao
            echo "</button>";//fechar o botão
            echo"</td>";//fechar a terceira coluna
            echo "</tr>";//fechar a linha
            }
         ?>
        </tbody>
        </table>
        <script>
            function excluir(nome_arquivo){
                let deletar = confirm("Você tem certeza que deseja excluir o arquivo " + nome_arquivo + "?");
                 if (deletar == true){
                    window.location.href = "deletar.php?nome_arquivo="+ nome_arquivo;
                 }

            }
            </script>
</body>
</html>