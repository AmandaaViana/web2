<?php

function area($raio) {
    $pi = 3.14;
    $area = $pi * $raio * $raio;
    return $area;
}

function circulo($raio) {
    $pi = 3.14;
    $circulo = 2 * $pi * $raio;
    return $circulo;
}

$raio1 = 5;
$raio2 = 10;
$raio3 = 15;

echo "Para raio = $raio1<br>";
echo "Área: " . area($raio1) . "<br>";
echo "Circunferência: " . circulo($raio1) . "<br><br>";

echo "Para raio = $raio2<br>";
echo "Área: " . area($raio2) . "<br>";
echo "Circunferencia: " . circulo($raio2) . "<br><br>";

echo "Para raio = $raio3<br>";
echo "Área: " . area($raio3) . "<br>";
echo "Circunferencia: " . circulo($raio3) . "<br>";
?>
