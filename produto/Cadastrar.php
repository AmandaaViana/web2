<?php

include_once("Conexao.php");

if(!isset($_GET['descricao']) || !isset($_GET['unidade_medida'])){
    echo "Informe os paramentros [descricao] [unidade_medida]!";
    exit;
}

$descricao = $_GET['descricao'];
$unidade_medida = $_GET['unidade_medida'];
$con = Conexao::getConexao();
$sql = "INSERT INTO produtos (descricao, unidade_medida) VALUES (?, ?)";
$instrucao = $con->prepare($sql);
$instrucao->execute(array($descricao, $unidade_medida));

header("location: listar.php");
?>
