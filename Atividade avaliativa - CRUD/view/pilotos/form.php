<?php

include_once(__DIR__ . "/../../controller/EquipeController.php");
include_once(__DIR__ . "/../../controller/MontadoraController.php");
include_once(__DIR__ . "/../../controller/SeriesController.php");

//carrega equipe
$equipeCont = new EquipeController();
$equipes = $equipeCont->listar();

//carrega montadora
$montadoraCont = new MontadoraController();
$montadoras = $montadoraCont->listar();

//carrega series
$seriesCont = new SeriesController();
$competicao = $seriesCont->listar();

include_once(__DIR__ . "/../include/header.php");
include_once(__DIR__ . "/../include/menu.php");
?>

<div class="container">
    <h3><?= ($piloto && $piloto->getId() > 0) ? 'Editar' : 'Inserir' ?> piloto</h3>

    <div class="row">
        <div class="col-6">
            <form method="POST" action="">

                <div class="mb-3">
                    <label for="txtNome" class="form-label">Nome:</label>
                    <input type="text" id="txtNome" name="nome"
                        placeholder="Informe o nome"
                        value="<?= $piloto ? $piloto->getNome() : '' ?>"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label for="txtIdade" class="form-label">Idade</label>
                    <input type="number" id="txtIdade" name="idade" placeholder="Informe sua idade"
                        value="<?= $piloto ? $piloto->getIdade() : '' ?>"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label for="selEquipe" class="form-label">Equipe:</label>
                    <select name="equipe" id="selEquipe" class="form-select">
                        <option value="">----Selecione----</option>
                        <?php foreach ($equipes as $e): ?>
                            <option value="<?= $e->getId(); ?>"
                                <?php if ($piloto && $piloto->getEquipe() && $piloto->getEquipe()->getId() == $e->getId())
                                    echo "Selected";
                                ?>>
                                <?= $e->getNome() ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="selMontadora" class="form-label">Montadora:</label>
                    <select name="montadora" id="selMontadora" class="form-select">
                        <option value="">----Selecione----</option>
                        <?php foreach ($montadoras as $m): ?>
                            <option value="<?= $m->getId(); ?>"
                                <?php if ($piloto && $piloto->getMontadora() && $piloto->getMontadora()->getId() == $m->getId())
                                    echo "Selected";
                                ?>> <?= $m->getNome() ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="selSeries" class="form-label">Series:</label>
                    <select name="series" id="selSeries" class="form-select">
                        <option value="">----Selecione----</option>
                        <?php foreach ($competicao as $c): ?>
                            <option value="<?= $c->getId(); ?>"
                                <?php if ($piloto && $piloto->getSeries() && $piloto->getSeries()->getId() == $c->getId())
                                    echo "Selected";
                                ?>> <?= $c->getNome() ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="txtVitorias" class="form-label">Vitorias:</label>
                    <input type="number" id="txtVitorias" name="vitorias" placeholder="Total de vitorias:"
                        value="<?= $piloto ? $piloto->getVitorias() : '' ?>"
                        class="form-control">
                </div>

                <input type="hidden" value="<?= $piloto ? $piloto->getId() : 0 ?>" name="id">

                <div class="mt-2">
                    <button class="btn btn-primary">Gravar</button>
                </div>

            </form>
        </div>

        <div class="col-6">
            <?php if ($msgErro) : ?>
                <div class="alert alert-danger">
                    <?= $msgErro ?>
                </div>
            <?php endif; ?>
        </div>

    </div><!-- Fecha a row -->
    <div class="mt-5">
        <a href="listar.php" class="btn btn-outline-danger">Voltar</a>
    </div>

    <?php
    include_once(__DIR__ . "/../include/footer.php");
    ?>