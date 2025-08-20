<?php
//veiculo_exec.php
$modelo = $_POST["modelo"];
$marca = $_POST["marca"];
$combust = $_POST["combustivel"];
 
echo "<h1>Dados informados para o veículo</h1>";
echo "Modelo: " . $modelo . "<br>";
echo "Marca: " . $marca . "<br>";

if ($combust == 'A')
   echo "Combustível: Álcool";
else if ($combust == 'G')
    echo "Combustível: Gasolina";
else
    echo "Combustível: Flex";

echo "<br><br>";
echo "<a href='veiculo.php'>Cadastrar outro veículo</a>";

?>