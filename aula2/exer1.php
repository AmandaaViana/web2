<?php

$times = array("Gremio", "Inter","Sao Paulo", "Palmeiras", "Flamengo");
$frutas = array("Banana", "Maça","Melancia", "Morango", "Uva");
$cor = array("Azul", "Verde","Amarelo", "Vermelho", "Preto");
$animais = array("Cachorro", "Gato","Leao", "Girafa", "Camaleao");
$comida = array("Arroz", "Feijao","Carne", "Salada", "Batata");

echo "Times:";
echo "<ol>";
foreach($times as $fut){
    echo "<li>" . $fut . "</li>";
}
echo "</ol>";

echo "Frutas:";
echo "<ol>";
foreach($frutas as $frut){
    echo "<li>" . $frut . "</li>";
}
echo "</ol>";

echo "Cores:";
echo "<ol>";
foreach($cor as $c){
    echo "<li>" . $c . "</li>";
}
echo "</ol>";

echo "Animais:";
echo "<ol>";
foreach($animais as $ani){
    echo "<li>" . $ani . "</li>";
}
echo "</ol>";

echo "Comidas:";
echo "<ol>";
foreach($comida as $co){
    echo "<li>" . $co . "</li>";
}
echo "</ol>";