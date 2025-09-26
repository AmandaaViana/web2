<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once("persistencia.php");
$filmes = buscarDados('filmes.json'); 

$generos = [
    "A" => "Ação",
    "F" => "Ficção",
    "S" => "Suspense",
    "T" => "Terror"
];

$msgErro = "";
$titulo = "";
$diretor = "";
$duraçao = "";
$genero = "";

if (isset($_POST['titulo'])) {
    $titulo = trim($_POST['titulo']);
    $diretor = trim($_POST['diretor']);
    $duraçao = $_POST['duraçao'];
    $genero = trim($_POST['genero']);

    $erros = array();
    if ($titulo == '') {
        array_push($erros,"Informe o titulo!");
    } else if(strlen($titulo) <= 3 ){
        array_push($erros,"Informe um titulo com mais de 3 caracteres!");
    } 
    if ($diretor == '') {
        array_push($erros,"Informe o diretor!");
    } 
    if ($duraçao == '') {
        array_push($erros,"Informe a duração do filme!");
    } else if ($duraçao < 0){
        array_push($erros,"A duração deve ser maior que 0!");
    }
    if ($genero == '') {
        array_push($erros,"Informe o genero!");
    } 
    
    if(empty($erros)) {
        $filme = array(
            "id" => uniqid(),
            "titulo" => $titulo,
            "diretor" => $diretor,
            "duraçao" => $duraçao,
            "genero" => $genero
        );
        array_push($filmes, $filme);
        salvarDados($filmes, "filmes.json");
        header("location: filmes.php"); 
    } else{
        $msgErro = implode("<br>" , $erros);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Filmes</title>
</head>
<body>
    <body>
    <h1>Cadastro de Filmes</h1>
    <h3>Cadastre seu Filme aqui</h3>
    <form method="post">
        <input name="titulo" placeholder="Informe o título" id="titulo" value="<?= $titulo ?>" />
        <br><br>
        <input name="diretor" placeholder="Informe o diretor" id="diretor" value="<?= $diretor ?>"/>
        <br><br>
        <input name="duraçao" placeholder="Duração do filme" id="duraçao" value="<?= $duraçao ?>"/>
        <br><br>

        <select name="genero" id="genero">
            <option value="">--Selecione o gênero--</option>
            <option value="A" <?=  $genero == 'A' ? 'selected' : '' ?> >Ação</option>
            <option value="F" <?=  $genero == 'F' ? 'selected' : '' ?> >Ficção</option>
            <option value="S" <?=  $genero == 'S' ? 'selected' : '' ?> >Suspense</option>
            <option value="T" <?=  $genero == 'T' ? 'selected' : '' ?> >Terror</option>
        </select>
        <br><br>
        <input type="submit" value="Enviar"/>
    </form>

    <div id="divErro" style="color: red;">
        <?= $msgErro ?>
    </div>

    <h3>Filmes cadastrados</h3>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Diretor</th>
            <th>Duração do filme</th>
            <th>Gênero</th>
            <th>Excluir</th>
        </tr>

        <?php foreach ($filmes as $f): ?>
            <tr>
                <td><?php echo $f['id'] ?></td>
                <td><?= $f['titulo'] ?></td>
                <td><?= $f['diretor'] ?></td>
                <td><?= $f['duraçao'] ?></td>
                <td><?= $generos[$f['genero']] ?? $f['genero'] ?></td>

                <td>
                    <a href="excluir.php?id=<?= $f['id'] ?>"
                        onclick="return confirm('Confirma a exclusao?')">
                        Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>