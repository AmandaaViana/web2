<?php

include_once("Connection.php");
//validaçao dos parametros
if(!isset($_GET['nome']) || !isset ($_GET['cidade'])){
    echo "Informe os paramentros [nome] [cidade]!";
    exit;//ele para e nao le o resto da pagina
}

//receber o nome e a cidade do time por parametro GET
$nome = $_GET['nome'];
$cidade = $_GET['cidade'];

//inserir o time no banco de dados
$conn = Connection::getConnection();
$sql = "INSERT INTO times (nome,cidade) VALUES (?, ?)";

$stm = $conn->prepare($sql);
$stm->execute(array($nome,$cidade));

//voltar para a listagem
header("location: time_listar.php");