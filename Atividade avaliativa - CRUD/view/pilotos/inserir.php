<?php

include_once(__DIR__."/../../model/Piloto.php");
include_once(__DIR__."/../../controller/PilotoController.php");


include_once(__DIR__."/../../model/Equipe.php");
include_once(__DIR__."/../../model/Montadora.php");
include_once(__DIR__."/../../model/Series.php");

$msgErro = "";
$piloto = NULL;

//verificar se o usuario clicou em gravar
if(isset($_POST['nome'])){
    //captura os valores preenchidos
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : NULL; //operador ternario 
    $idade = is_numeric($_POST['idade']) ? $_POST['idade'] : NULL;
    $idEquipe = trim($_POST['equipe']) ? trim($_POST['equipe']) : NULL;
    $idMontadora = trim($_POST['montadora']) ? trim($_POST['montadora']) : NULL;
    $idSeries = trim($_POST['series']) ? trim($_POST['series']) : NULL;

    //criar objeto
    $piloto = new Piloto();
    $piloto->setId(0);
    $piloto->setNome($nome);
    $piloto->setIdade($idade);
     
    if($idEquipe){
        $equipe = new Equipe();
        $equipe->setId($idEquipe);
        $piloto->setEquipe($equipe);
    }else
        $piloto->setEquipe(NULL);

    if($idMontadora){
        $montadora = new Montadora();
        $montadora->setId($idMontadora);
        $piloto->setMontadora($montadora); //o setMontadora é do model Piloto
    }else
        $piloto->setMontadora(NULL);
    
    if($idSeries){
        $series = new Series();
        $series->setId($idSeries);
        $piloto->setSeries($series); //o setSeries é do model piloto
    }else
        $piloto->setSeries(NULL);

    //print_r($piloto);

    $pilotoCont = new PilotoController;
    $erros = $pilotoCont->inserir($piloto);

    if(! $erros)
        header("location:listar.php");
    else{
        $msgErro = implode("<br>",$erros);
    }
}
include_once(__DIR__."/form.php");

?>