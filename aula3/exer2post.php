<?php
//POST
  echo "Numeros recebidos: <br>";
  
  $num1 = $_POST["numero1"];
  $num2 = $_POST["numero2"];
  $num3 = $_POST["numero3"];
  $media = ($num1 + $num2 + $num3) / 3;

  echo $media . "<br>";

  echo $_POST["media"] . "<br>";

 
  //localhost/web2/aula3/exer2post.php
