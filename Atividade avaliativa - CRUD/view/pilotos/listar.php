<?php

include_once(__DIR__ . "/../../controller/PilotoController.php");

$pilotoCont = new PilotoController();
$pilotos = $pilotoCont->listar();

include_once(__DIR__ . "/../include/header.php");
include_once(__DIR__ . "/../include/menu.php");
?>

<div class="container">
    <h3>Listagem de Pilotos</h3>

    <div>
        <a href="inserir.php" type="button" class="btn btn-primary">inserir</a>
    </div>

    <table class="table table-hover">
        <!-- Cabeçalho -->
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Equipe</th>
            <th>Montadora</th>
            <th>Series</th>
            <th>Vitorias</th>
            <th>Editar</th>
            <th>Excluir</th>
        </tr>

        <!-- Dados -->

        <?php foreach ($pilotos as $p): ?>
            <tr>
                <td><?= $p->getId() ?></td>
                <td><?= $p->getNome() ?></td>
                <td><?= $p->getIdade() ?></td>
                <td><?= $p->getEquipe()->getNome() ?></td>
                <td><?= $p->getMontadora()->getNome() ?></td>
                <td><?= $p->getSeries()->getNome() ?></td>
                <td><?= $p->getVitorias() ?></td>

                <td>
                    <a href="editar.php?id=<?= $p->getId() ?>">
                        <img src="../../img/btn_editar.png">
                    </a>
                </td>
                <td>
                    <a href="excluir.php?id=<?= $p->getId() ?>">
                        <img src="../../img/btn_excluir.png">
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <?php
    include_once(__DIR__ . "/../include/footer.php");
    ?>