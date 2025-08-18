<?php

  echo "Parametros recebidos: <br> <br>";
    
    //testar se foi digitado
	if (isset($_GET['numIni'])) {
		$numIni = $_GET["numIni"];  
    	echo "Recebido: " . $numIni;
	} else {
    	$numIni = null;
    	echo "Não recebido numero inicial <br>";
	}

 	if (isset($_GET['numFim'])) {
   		$numFim = $_GET['numFim'];
    	echo "Recebido: " . $numFim;
	} else {
    	$numFim = null;
    	echo "Não recebido numero final <br>";
	}
	
    //principal

  if ($numIni == null && $numFim == null) {
      // Caso 1: nenhum recebido -> mostrar de 1 a 100
      for ($i = 1; $i <= 100; $i++) {
          echo $i . "<br>";
      }

  } elseif ($numIni != null && $numFim == null) {
      // Caso 2: só numIni recebido -> mostrar de numIni a 100
      for ($i = $numIni; $i <= 100; $i++) {
          echo $i . "<br>";
      }

  } elseif ($numIni == null && $numFim != null) {
      // Caso 3: só numFim recebido -> mostrar de 1 a numFim
      for ($i = 1; $i <= $numFim; $i++) {
          echo $i . "<br>";
      }

  } elseif ($numIni != null && $numFim != null) {
      // Caso 4: os dois recebidos -> verificar intervalo
      if ($numIni < 1 || $numFim > 100) {
          echo "Intervalo inválido!";
      } else {
          for ($i = $numIni; $i <= $numFim; $i++) {
              echo $i . "<br>";
          }
      }
  }
 
  //exer3.php?numIni=5&numFim=50

?>
