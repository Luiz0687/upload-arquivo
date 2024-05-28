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
var_dump($_FILES['arquivo']['name']);
var_dump(pathinfo($_FILES['arquivo']['name'],PATHINFO_EXTENSION));
var_dump(pathinfo($_FILES['arquivo']['name'],PATHINFO_FILENAME));
var_dump(pathinfo($_FILES['arquivo']['name'],PATHINFO_BASENAME));
var_dump(pathinfo($_FILES['arquivo']['name'],PATHINFO_DIRNAME));