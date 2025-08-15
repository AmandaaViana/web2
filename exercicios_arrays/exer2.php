<?php

$primeiro = array ("gato", "cachorro", "pássaro", "peixe", "coelho");
$segundo = array ();

for($i=0;$i<count($primeiro);$i++){
    array_push($segundo,$primeiro[$i]);
}
    print_r($segundo);
   
?>
