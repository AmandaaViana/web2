<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once("persistencia.php");

$livros = buscarDados('livros.json'); // TODO- buscar os livros ja salvos
//print_r($livros);

    if (isset($_POST['titulo'])){
        $titulo = $_POST['titulo'];
        $genero = $_POST['genero'];
        $numPaginas = $_POST['numPaginas'];

        $livro = array (
            "id" => uniqid(),
            "titulo" => $titulo,
            "genero" => $genero,
            "paginas" => $numPaginas
        );
        array_push($livros,$livro);
        salvarDados($livros, "livros.json");

        header("location: livros.php"); //forçar o recarregamento da pagina 
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

<form method="post">
    <input name="titulo" placeholder="Informe o título" />
    <br><br> 

    <select name="genero">
        <option value="">--Selecione o gênero--</option>
        <option value="D">Drama</option>
        <option value="F">Ficção</option>
        <option value="R">Romance</option>
        <option value="O">Outro</option>
    </select>
    <br><br>

    <input name="numPaginas" placeholder="Informe o número de páginas">
    <br><br>

    <input type="submit" value="Enviar" />
</form>

<h3>Livros cadastrados</h3>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Gênero</th>
        <th>Quant. Páginas</th>
        <th>Excluir</th>
    </tr>

    <?php foreach($livros as $l): ?>
        <tr>
            <td><?php echo $l['id']?></td>
            <td><?= $l['titulo']?></td>
            <td><?= $l['genero']?></td>
            <td><?= $l['paginas']?></td>
            <td>
                 <a href="excluir.php?id=<?= $l['id'] ?>"
                onclick="return confirm('Confirma a exclusao?')">
                Excluir</a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
