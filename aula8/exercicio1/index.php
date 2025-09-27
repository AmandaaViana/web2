<?php

include_once("Pessoa.php");

$pessoa = new Pessoa();
$pessoa->setNome("Amanda");
$pessoa->setSobrenome("Viana");

echo $pessoa->nomeCompleto();