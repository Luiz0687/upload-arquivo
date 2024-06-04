<?php
$pastaDestino = "/uploads/";
var_dump($_FILES);

var_dump($_FILES['arquivo']['size']);
//verificar o tamanho do arquivo é maior que 2 MB
if ($_FILES['arquivo']['size'] > 2000000){
    echo "O tamanho do arquivo é maior que o limite permitido.";
    die();
}

//verificar se o arquivo é uma imagem
//var_dump($_FILES['arquivo']['name']);
var_dump(pathinfo($_FILES['arquivo']['name'],PATHINFO_EXTENSION));
$extensao = pathinfo($_FILES['arquivo']['name'],PATHINFO_EXTENSION);

if ( $extensao != "png" && $extensao != "jpg" && 
     $extensao != "jpeg" && $extensao != "gif" &&
     $extensao != "jfif" && $extensao != "svg"
     {
        echo "O arquivo não é uma imagem! apenas selecione arquivos " .
        "com extensão png, jpg, jpeg, gif,jfif ou svg.";
        die();
     }
)
//verifica se é uma imagem de fato
if (getimagesize($_FILES['arquivo']['tmp_name']) === false ){
    echo "problemas ao enviar a imagem. Tente novamente.";
    die();
}
//se tudo der certo até aqui, faz o upload
$fezUpload = move_uploaded_file($_FILES['arquivo']['tmp_name'], 
$pastaDestino . $_FILES['arquivo']['name']);
    if ($fezUpload == true){
        header("location:index.php");
    } else {
        echo "Erro ao mover arquivo.";
    }


//var_dump(pathinfo($_FILES['arquivo']['name'],PATHINFO_FILENAME));
//var_dump(pathinfo($_FILES['arquivo']['name'],PATHINFO_BASENAME));
//var_dump(pathinfo($_FILES['arquivo']['name'],PATHINFO_DIRNAME));