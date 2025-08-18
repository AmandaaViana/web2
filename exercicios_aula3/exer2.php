<?php

  echo "Parametros recebidos: <br> <br>";
 
  $num1 = $_GET["num1"];
  $num2 = $_GET["num2"];
  $num3 = $_GET["num3"];
 
  if ($num1 > $num2 && $num1 > $num3)
      echo "O maior e: " . $num1;
    else {
      if ($num2 > $num1 && $num2 > $num3)
      echo "O maior e: " . $num2;
      else
      echo "O maior e: " . $num3;
    }
 
  //exer2.php?num1=10&num2=5&num3=26

?>
