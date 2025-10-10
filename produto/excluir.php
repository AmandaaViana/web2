<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once("Conexao.php");

$id = 0;
if(isset($_GET['id']));
$id = $_GET['id'];


if($id <= 0){
    echo "ID para exclusao é invalida";
    exit;
}

$con = Conexao::getConexao();
$sql = "DELETE FROM produtos WHERE id = ?";
$instrucao = $con->prepare($sql);
$instrucao->execute([$id]);

header("location: listar.php");
?>