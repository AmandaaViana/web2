<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once("Conexao.php");

//capturar o id que veio no paramentro
$id = 0;
if(isset($_GET['id']));
$id = $_GET['id'];

//validar o id
if($id <= 0){
    echo "ID para exclusao é invalida";
    exit;
}

//executar o sql para excluir
$con = Conexao::getConexao();
$sql = "DELETE FROM produtos WHERE id = ?";
$instrucao = $con->prepare($sql);
$instrucao->execute([$id]);

//redirecionar para a listagem
header("location: listar.php");
?>