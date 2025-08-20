<?php
//correto so esqueci de fazer a parte do post
  echo "Parametros recebidos: <br> <br>";
 
  $inicio = $_GET["inicio"];
  $razao = $_GET["razao"];
  $quantidade = $_GET["quantidade"];
 
 if (isset($_GET['inicio']) && isset($_GET['razao']) && isset($_GET['quantidade'])) {
	echo "Todos os valores foram recebidos";
      for ($i = 0; $i < $quantidade; $i++) {
      	$termo = $inicio + ($i * $razao);
		}
     echo " A progressão aritmética e: " . $termo . "<br>";
    } else if (isset($_GET['inicio']) && isset($_GET['razao']) && !isset($_GET['quantidade'])) {
    	echo "Os valores de inicio e razao foram recebidos";
	} else if (isset($_GET['inicio']) && !isset($_GET['razao']) && isset($_GET['quantidade'])) {
    	echo "Os valores de inicio e quantidade foram recebidos";
	} else if (!isset($_GET['inicio']) && isset($_GET['razao']) && isset($_GET['quantidade'])) {
    	echo "os valores de razao e quantidade foram recebidos";
	} else {
    	echo "Nenhum parâmetro foi recebido";
}

?>
