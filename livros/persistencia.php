<?php

define("DIR_ARQUIVOS", "arquivos");

function salvarDados($array, $arquivo){
    
    $json = json_encode($array, JSON_PRETTY_PRINT);//1-converter o array pr json

    file_put_contents(DIR_ARQUIVOS . "/" . $arquivo, $json);//2-salvar o json o arquvo
}
function buscarDados($arquivo) : array{
    $dados = array();

    //buscar dados dos arquivos
    $nomeArquivo = DIR_ARQUIVOS . "/" . $arquivo;
    if(file_exists($nomeArquivo)){
        $json = file_get_contents($nomeArquivo);
        $dados = json_decode($json, true);
    }
    return $dados;
}

?>