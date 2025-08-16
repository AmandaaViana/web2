<?php
//POST
  echo "Numeros recebidos: <br>";
  
  $num1 = $_POST["numero1"];
  $num2 = $_POST["numero2"];
  $soma = $num1 + $num2;

  echo $soma . "<br>";

  echo $_POST["soma"] . "<br>";


  //localhost/web2/aula3/exer1post.php
