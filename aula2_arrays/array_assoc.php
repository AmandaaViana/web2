<?php

$pessoa = array("nome"=>"Daniel",
                "idade"=> 27);
/*
echo $pessoa["nome"];

echo "<br>"
foreach($pessoa as $p)
    echo $p . "<br>";
*/

$pessoa2 = array("nome" => "julia",
                "idade" => 18);

$pessoas = array($pessoa, $pessoa2);

foreach($pessoas as $p){
    echo $p["nome"] . "-" .$p["idade"];
    echo "<br>";
}