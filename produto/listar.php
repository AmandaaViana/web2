<?php

include_once("Conexao.php");
$con = Conexao::getConexao();

$sql = "SELECT * FROM produtos";
$instrucao = $con->prepare($sql);
$instrucao->execute();
$result = $instrucao->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title> 
</head>
<body>
    <h1>Produtos</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Descriçao</th>
            <th>Unidade de medida</th>
            <th></th>
        </tr>
        <?php foreach($result as $p): ?>
            <tr>
                <td> <?= $p['id'] ?> </td>
                <td> <?= $p['descricao'] ?> </td>
                <td> <?= $p['un_medida'] ?> </td>
                <td>
                    <a href="excluir.php?id=<?= $p['id'] ?>" 
                       onclick="return confirm('Confirma a exclusão?');">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>