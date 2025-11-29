<?php

include_once(__DIR__ . "/../../controller/PilotoController.php");

$pilotoCont = new PilotoController();

$msgErro = "";
$piloto = NULL;

if (isset($_POST['nome'])) {
    //captura os valores preenchidos
    $id = $_POST["id"];
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : NULL; //operador ternario 
    $idade = is_numeric($_POST['idade']) ? $_POST['idade'] : NULL;
    $idEquipe = trim($_POST['equipe']) ? trim($_POST['equipe']) : NULL;
    $idMontadora = trim($_POST['montadora']) ? trim($_POST['montadora']) : NULL;
    $idSeries = trim($_POST['series']) ? trim($_POST['series']) : NULL;
    $vitorias = is_numeric($_POST['vitorias']) ? $_POST['vitorias'] : NULL;

    //Criar um objeto aluno
    $piloto = new Piloto();
    $piloto->setId($id);
    $piloto->setNome($nome);
    $piloto->setIdade($idade);
    $piloto->setVitorias($vitorias);

    if ($idEquipe) {
        $equipe = new Equipe();
        $equipe->setId($idEquipe);
        $piloto->setEquipe($equipe);
    } else
        $piloto->setEquipe(NULL);

    if ($idMontadora) {
        $montadora = new Montadora();
        $montadora->setId($idMontadora);
        $piloto->setMontadora($montadora);
    } else
        $piloto->setMontadora(NULL);

    if ($idSeries) {
        $series = new Series();
        $series->setId($idSeries);
        $piloto->setSeries($series);
    } else
        $piloto->setSeries(NULL);

    $erros = $pilotoCont->editar($piloto);

    if (! $erros)
        header("location:listar.php");
    else {
        $msgErro = implode("<br>", $erros);
    }
} else { //abrio o formulario pr fazer ediçao
    $id = 0;
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    $piloto = $pilotoCont->buscarPorId($id);

    if (! $piloto) {
        echo "Piloto nao encontrado!<br>";
        echo "<a href='listar.php'>Voltar</a>";
        exit;
    }
}

include_once(__DIR__ . "/form.php");
