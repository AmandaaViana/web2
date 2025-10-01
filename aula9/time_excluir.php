<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once("Connection.php");
//capturar o id que veio no paramentro
$id = 0;
if(isset($_GET['id']));
$id = $_GET['id'];

//validar o id(numero maior que 0)
if($id <= 0){
    echo "ID para exclusao é invalida";
    exit;
}
//executar o sql para excluir
$conn = Connection::getConnection();

$sql = "DELETE FROM time WHERE id = ?";
$stm = $conn->prepare($sql);
$stm->execute([$id]);

//redirecionar para a listagem
header("location: time_listar.php");