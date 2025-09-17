<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once("persistencia.php");

//1- Carregar os dados do arquivo JSON
$filmes = buscarDados("filmes.json");

//2- Receber o ID do livro
$id = $_GET['id'];

//3- Encontrar a posição do livro no array para excluir
$idxExcluir = -1;
foreach($filmes as $idx => $f) {
    if($id == $f['id']) {
        $idxExcluir = $idx;
        break;
    }
}

//echo $idxExcluir;

//4- Remover o índice encontrado do array
array_splice($filmes, $idxExcluir, 1);

//5- Salvar os dados no arquivo
salvarDados($filmes, "filmes.json");

//6- Redirecinar para a listagem
header("location: filmes.php");
