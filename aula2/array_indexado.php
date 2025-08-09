<?php 

$numeros = array(5,16,7,9,12);

echo $numeros[3];
$numeros[2] = [3];
/*
echo "<br>Impressao dos elementos do array<br>";
for($i=0;$i<=count($numeros);$i++){
    echo $numeros[$i]. "<br>";
}*/

array_push($numeros,8);

foreach($numeros as $num){
    echo $num . "<br>";
}