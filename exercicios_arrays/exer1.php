<?php

$num = array( 8, 52, 89, 11, 41, 28, 66, 47, 2, 23);
$soma = 0;
$media = 0;

foreach ($num as $valor) {
    $soma += $valor;
    $media = $soma / 10;
}
    echo "Media aritimetica: " . $media;
?>
