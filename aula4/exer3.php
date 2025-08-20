<?php

$logado = false;

if(isset($_POST["usuario"])) {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    if($usuario == 'ifpr' && $senha == 'tads') {
        echo "Bem vindo ao TADS";
        $logado = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h2>login</h2>
    <?php if(!$logado): ?>

        <form action="" method="post">
            <input name="usuario" type="text" placeholder=" Informe o login">
            <br><br>
            <input name="senha" type="password" placeholder="Informe a senha">
        </form>

        <br>
        <button>Enviar</button>

    <?php endif; ?>
</body>

</html>