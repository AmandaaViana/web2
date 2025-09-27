<?php

include_once("calculadora.php");
//criar objeto da classe calculadora
$calc = new Calculadora(5,8);
//$calc->setNum1(5);
//$calc->setNum2(8);

echo $calc->somar();