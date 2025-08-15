<?php

$flor = array ("Orquidea", "Margarida", "Petunia");
$fruta = array ("Laranja", "maça", "Limao");
$cidade = array ("Foz do Iguaçu", "Cascavel", "Toledo");
$turismo = array ("Itaipu", "Cataratas", "Parque das Aves");

$matriz = array ();
array_push($matriz,$flor,$fruta,$cidade,$turismo);

$categorias = array("Flores", "Frutas", "Cidades", "Pontos Turísticos");

echo "<table border='1'>";
echo "<tr><th>Categoria</th><th>Itens</th></tr>";

for ($i = 0; $i < count($matriz); $i++) {
    echo "<tr>";
    echo "<td>" . $categorias[$i] . "</td>";
    echo "<td>";
  
for ($j = 0; $j < count($matriz[$i]); $j++) {
        echo $matriz[$i][$j];
        if ($j < count($matriz[$i]) - 1) {
            echo ", ";
        }
    }
    echo "</td>";
    echo "</tr>";
}
echo "</table>";
?>
