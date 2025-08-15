<?php


$pessoa1 = array ("nome"=>"Manuel de Medeiros",
                  "endereço"=>"Rua das Acacias",
                  "cidade"=>"Foz do Iguaçu",
                  "uf"=>"PR");

$pessoa2 = array ("nome"=>"Juliana de Amaral",
                  "endereço"=>"Rua dos Pinheiros",
                  "cidade"=>"Florianopolis",
                  "uf"=>"SC");

$pessoa3 = array ("nome"=>"Rodrigo Baidek",
                  "endereço"=>"Rua Dom Pedro I",
                  "cidade"=>"Petropolis",
                  "uf"=>"RJ");

$pessoa4 = array ("nome"=>"Fabiola da Silva",
                  "endereço"=>"Rua Chile",
                  "cidade"=>"Guarulhos",
                  "uf"=>"SP");

$pessoas = array($pessoa1, $pessoa2, $pessoa3, $pessoa4);

echo "<table border=1>";
echo "<tr>";
echo "<td>Nome</td>";
echo "<td>Endereço</td>";
echo "<td>Cidade</td>";
echo "<td>UF</td>";
echo "</tr>";

foreach($pessoas as $p){
    echo "<tr>";
    echo "<td>" . $p["nome"] . "</td>";
    echo "<td>" . $p["endereço"]. "</td>";
    echo "<td>" . $p["cidade"] . "</td>";
    echo "<td>" . $p["uf"] . "</td>";
    echo "</tr>";
    
}
 echo "</table>";