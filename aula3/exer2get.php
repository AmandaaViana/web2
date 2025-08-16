<?php
//GET

echo "Numeros recebidos: <br>";
  
  $num1 = $_GET["numero1"];
  $num2 = $_GET["numero2"];
  $num3 = $_GET["numero3"];
  $media = ($num1 + $num2 + $num3) / 3;

  echo "Numero 1: " . $num1. "<br>";
  echo "Numero 2: " . $num2. "<br>";
  echo "Numero 3: " . $num3. "<br>";

  echo "A media aritimetica é: " . $media . "<br>";

  echo $_GET["media"] . "<br>";

  //exer2get.php?numero1=20&numero2=26&numero3=50

?>