<?php


  echo "Parametros recebidos: <br> <br>";
  
  $nome = $_POST["nome"];
  $sobrenome = $_POST["sobrenome"];
  $idade = $_POST["idade"];
 
  echo "Nome completo: " . $nome . " " . $sobrenome . "<br>";
  echo "Idade: " . $idade;
	 
  //exer1.php?nome=amanda&sobrenome=viana&idade=26

?>
