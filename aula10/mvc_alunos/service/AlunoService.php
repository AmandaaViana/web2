<?php

include_once(__DIR__ . "/../model/Aluno.php");

class AlunoService{

    public function validar(Aluno $aluno){
        $erros = array();

        //validar se o nome foi preenchido
        //if(! $aluno->getNome()) é outra forma de fazer
        if ($aluno->getNome() == NULL)
            array_push($erros, "Informe o nome!");

        if ($aluno->getIdade() == NULL)
            array_push($erros, "Informe a idade!");

        if ($aluno->getEstrangeiro() == NULL)
            array_push($erros, "Informe se o aluno é estrangeiro!");

        if ($aluno->getCurso() == NULL)
            array_push($erros, "Informe o curso!");
        
        return $erros;
    }
}
