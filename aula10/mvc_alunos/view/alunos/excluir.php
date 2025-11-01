<?php

include_once(__DIR__ . "/../../controller/AlunoController.php");

//capturar o ID pela superglobal $_GET
$id = 0;
if (isset($_GET['id']))
    $id = $_GET['id'];
//chamar o controler para excluir
$alunoCont = new AlunoController();
$alunoCont->excluir($id);

header("location: listar.php");
