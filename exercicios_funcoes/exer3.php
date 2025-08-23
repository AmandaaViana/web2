<?php

function desenhaLinha($nome, $habitantes, $area, $altitude, $estado) {
    echo "<tr>";
    echo "<td>" . $nome . "</td>";
    echo "<td>" . $habitantes . "</td>";
    echo "<td>" . $area . "</td>";
    echo "<td>" . $altitude . "</td>";
    echo "<td>" . $estado . "</td>";
    echo "</tr>";
}

echo "<table border='1'>";
echo "<tr><th>Nome</th><th>Habitantes</th><th>Area</th><th>Altitude</th><th>Estado</th></tr>";

desenhaLinha("Foz do Iguaçu", "250.000", "500km²", "145m", "Paraná-PR");
desenhaLinha("Cascavel", "300.000", "420km²", "320m", "Paraná-PR");
desenhaLinha("Chapeco", "240.000", "120km²", "620m", "Santa Catarina-SC");
desenhaLinha("Blumenau", "330.000", "200km²", "85m", "Santa Catarina-SC");
desenhaLinha("Cutitiba", "1.500.000", "300km²", "850m", "Parana-PR");

echo "</table>";

?>
