<?php

include_once(__DIR__."/../../controller/AlunoController.php");

$alunoCont = new AlunoController();

$msgErro = "";
$aluno = NULL;

if(isset($_POST['nome'])){
    //ja clicou
    //capturar o valores preenchidos no formulario
    $id = $_POST["id"];
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : NULL; //operador ternario 
    $idade = is_numeric($_POST['idade']) ? $_POST['idade'] : NULL;
    $estrangeiro = trim($_POST['estrang']) ? trim($_POST['estrang']) : NULL;
    $idCurso = is_numeric($_POST['curso']) ? $_POST['curso'] : NULL;

    //Criar um objeto aluno
    $aluno = new Aluno();
    $aluno->setId($id);
    $aluno->setNome($nome);
    $aluno->setIdade($idade);
    $aluno->setEstrangeiro($estrang);

    if($idCurso) {
        $curso = new Curso();
        $curso->setId($idCurso);
        $aluno->setCurso($curso);
    } else 
        $aluno->setCurso(NULL);

    $erros = $alunoCont->editar($aluno);

    if(! $erros)
        header("location: listar.php");
    else {
        $msgErro = implode("<br>", $erros);
    }

}else{
    //abriu o formulario pr fazer ediçao
    $id = 0;
    if(isset($_GET['id']))
        $id = $_GET['id'];

    $aluno = $alunoCont->buscarPorId($id);

    if(! $aluno){
        echo "Aluno nao encontrado!<br>";
        echo "<a href='listar.php'>Voltar</a>";
        exit;
    }
}

include_once(__DIR__."/form.php");