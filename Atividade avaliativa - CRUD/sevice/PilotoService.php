<?php 

include_once(__DIR__."/../model/Equipe.php");

class PilotoService{
    public function validar(Piloto $piloto){
        $erros = array();

        //valida se o nome foi preenchido
        if ($piloto->getNome() == NULL)
            array_push($erros, "Informe o nome!");

        if ($piloto->getIdade() == NULL)
            array_push($erros, "Informe a idade!");

        if ($piloto->getEquipe() == NULL)
            array_push($erros, "Informe a equipe!");

        if ($piloto->getMontadora() == NULL)
            array_push($erros, "Informe a montadora!");

        if ($piloto->getSeries() == NULL)
            array_push($erros, "Informe a Series!");

        if ($piloto->getVitorias() == NULL)
            array_push($erros, "Informe as Vitorias!");

        return $erros;
    }
}

?>