<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once("persistencia.php");
$filmes = buscarDados("filmes.json");
$id = $_GET['id'];

$idxExcluir = -1;
foreach($filmes as $idx => $f) {
    if($id == $f['id']) {
        $idxExcluir = $idx;
        break;
    }
}
array_splice($filmes, $idxExcluir, 1);
salvarDados($filmes, "filmes.json");
header("location: filmes.php");