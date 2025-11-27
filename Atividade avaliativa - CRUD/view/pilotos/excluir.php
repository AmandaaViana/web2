<?php 

include_once(__DIR__."/../../controller/PilotoController.php");

//capturar o ID pela superglobal $_GET
$id = 0;
if (isset($_GET['id']))
    $id = $_GET['id'];
//chamar o controler para excluir
$pilotoCont = new PilotoController();
$pilotoCont->excluir($id);

header("location: listar.php");

?>