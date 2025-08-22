<?php

function area($b, $a) {
    $areaR = $b * $a;
    return $areaR;
}

function perimetro($b, $a) {
    $perimetroR = 2 * ($b + $a);
    return $perimetroR;
}

$retangulos = [
    [5, 3],    
    [8, 4],   
    [10, 6]   
];

for ($i = 0; $i < 3; $i++) {
    echo "Retangulo " . ($i + 1) . "<br>";
    echo "Área: " . area($retangulos[$i][0], $retangulos[$i][1]) . "<br>";
    echo "Perímetro: " . perimetro($valores[$i][0], $valores[$i][1]) . "<br><br>";
}

?>
