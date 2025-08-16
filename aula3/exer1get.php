<?php
//GET

echo "Numeros recebidos: <br>";
  
  $num1 = $_GET["numero1"];
  $num2 = $_GET["numero2"];
  $soma = $num1 + $num2;

  echo "Numero 1: " . $num1. "<br>";
  echo "Numero 2: " . $num2. "<br>";

  echo  "A soma é: " . $soma . "<br>";

  echo $_GET["soma"] . "<br>";

  //exer1get.php?numero1=20&numero2=26

?>