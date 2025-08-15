<?php

$primeiro = array ("gato", "cachorro", "pássaro", "peixe", "coelho");
$segundo = array ();

for($i=0;$i<count($primeiro);$i++){
    array_push($segundo,$primeiro[$i]);
}
for ($i = 0; $i < count($segundo); $i++) {
    echo $segundo[$i];
    if ($i < count($segundo) - 1) { 
        echo ", ";
    }
}  
?>
