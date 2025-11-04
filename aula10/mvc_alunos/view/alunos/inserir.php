<?php

include_once(__DIR__."/../../model/Aluno.php");
include_once(__DIR__."/../../controller/AlunoController.php");

$msgErro = "";
$aluno = NULL;

//verificar se o usuario clicou em gravar
if(isset($_POST['nome'])){
    //capturar o valores preenchidos no formulario
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : NULL; //operador ternario 
    $idade = is_numeric($_POST['idade']) ? $_POST['idade'] : NULL;
    $estrangeiro = trim($_POST['estrang']) ? trim($_POST['estrang']) : NULL;
    $idCurso = is_numeric($_POST['curso']) ? $_POST['curso'] : NULL;

    //criar objeto aluno
    $aluno = new Aluno();
    $aluno->setId(0);
    $aluno->setNome($nome);
    $aluno->setIdade($idade);
    $aluno->setEstrangeiro($estrangeiro);

    if($idCurso){
        $curso = new Curso();
        $curso->setId($idCurso);
        $aluno->setCurso($curso);
    }else
        $aluno->setCurso(NULL);
        
    //print_r($aluno);
    $alunoCont = new AlunoController;
    $erros = $alunoCont->inserir($aluno);

    if(! $erros)
        header("location: listar.php");
    else {
        $msgErro = implode("<br>",$erros);
    }
}

include_once(__DIR__."/form.php")
?>