<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once("persistencia.php");

$livros = buscarDados('livros.json'); // TODO- buscar os livros ja salvos
//print_r($livros);

$msgErro = "";
$titulo = "";
$numPaginas = "";
$autor = "";
$genero = "";

if (isset($_POST['titulo'])) {
    $titulo = trim($_POST['titulo']);
    $genero = trim($_POST['genero']);
    $numPaginas = $_POST['numPaginas'];
    $autor = trim($_POST['autor']);

    //validar os dados

    $erros = array();
    if ($titulo == '') {
        array_push($erros,"Informe o titulo!");
    } else if(strlen($titulo) <= 3 ){
        array_push($erros,"Informe um titulo com mais de 3 caracteres!");
    } 

    if ($genero == '') {
        array_push($erros,"Informe o genero!");
    } 
    if ($numPaginas == '') {
        array_push($erros,"Informe o numero de paginas!");
    } else if ($numPaginas < 0){
        array_push($erros,"O numero de paginas deve ser maior que 0!");
    }

    if ($autor == '') {
        array_push($erros,"Informe o autor!");
    } 
    if(empty($erros)) {
        //passou as validaçoes, salva no arquivo
        $livro = array(
            "id" => uniqid(),
            "titulo" => $titulo,
            "genero" => $genero,
            "paginas" => $numPaginas,
            "autor" => $autor
        );
        array_push($livros, $livro);
        salvarDados($livros, "livros.json");

        header("location: livros.php"); //forçar o recarregamento da pagina 
    } else{
        $msgErro = implode("<br>" , $erros);
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de livros</title>
</head>

<body>

    <h1>Cadastro de livros</h1>

    <h3>Cadastre seu livro aqui</h3>

    <!--<form method="post" onsubmit="return validar();"> -->
    <form method="post">
        <input name="titulo" placeholder="Informe o título" id="titulo" value="<?= $titulo ?>" />
        <br><br>

        <select name="genero" id="genero">
            <option value="">--Selecione o gênero--</option>
            <option value="D" <?=  $genero == 'D' ? 'selected' : '' ?> >Drama</option>
            <option value="F" <?=  $genero == 'F' ? 'selected' : '' ?> >Ficção</option>
            <option value="R" <?=  $genero == 'R' ? 'selected' : '' ?> >Romance</option>
            <option value="O" <?=  $genero == 'O' ? 'selected' : '' ?> >Outro</option>
        </select>
        <br><br>

        <input name="numPaginas" placeholder="Número de páginas" id="numPaginas" value="<?= $numPaginas ?>"/>
        <br><br>

        <input name="autor" placeholder="Informe o autor" id="autor" value="<?= $autor ?>"/>
        <br><br>

        <input type="submit" value="Enviar" />
    </form>

    <div id="divErro" style="color: red;">
        <?= $msgErro ?>
    </div>

    <h3>Livros cadastrados</h3>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Gênero</th>
            <th>Quant. Páginas</th>
            <th>Autor</th>
            <th>Excluir</th>
        </tr>

        <?php foreach ($livros as $l): ?>
            <tr>
                <td><?php echo $l['id'] ?></td>
                <td><?= $l['titulo'] ?></td>
                <td><?= $l['genero'] ?></td>
                <td><?= $l['paginas'] ?></td>
                <td><?= $l['autor'] ?></td>
                <td>
                    <a href="excluir.php?id=<?= $l['id'] ?>"
                        onclick="return confirm('Confirma a exclusao?')">
                        Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </table>

    <script src="validacao.js"></script>
</body>

</html>