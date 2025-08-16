<?php

//GET



echo "Parametro recebido: <br>";
  
  $cor= $_GET["cor"];
  
  echo $cor . " style";
  echo "<body style='background-color:". $cor . "></body>";

  echo $_GET["cor"] . "<br>";

  

?>