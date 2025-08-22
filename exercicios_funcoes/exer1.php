<?php

    function calcularY ($x){
        $resultado = 5 * $x + 2 * $x + 3;
        return $resultado;
    }
  
    for ($i = 1; $i <= 5; $i++) {
        echo calcularY($i) . "<br>";
    }
  
?>
