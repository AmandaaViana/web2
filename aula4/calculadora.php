<?php
//teste se foi recebido
if (isset($_POST['valor1'])) {
		$valor1 = $_POST['valor1']; 
	} else {
    	$valor1 = null;
    	echo "Não foi recebido o valor 1 <br>";
	}

if (isset($_POST['valor2'])) {
   		$valor2 = $_POST['valor2'];
	} else {
    	$valor2 = null;
    	echo "Não foi recebido o valor 2 <br>";
	}
if (isset($_POST['operacao'])) {
   		$operacao = $_POST['operacao'];
	} else {
    	$operacao = null;
    	echo "Não foi recebido a operaçao <br>";
    }

//principal
if($valor1 && $valor2 && $operacao) {
        $resultado = 0;
        if($operacao == '+')
            $resultado = $valor1 + $valor2;
        else if($operacao == '-')
            $resultado = $valor1 - $valor2;
        else if($operacao == '*')
            $resultado = $valor1 * $valor2;
        else if($operacao == '/')
            $resultado = $valor1 / $valor2;

        echo "O resultado e " . $resultado;
    } else
        $erro = "Valores inválidos!";

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario HTML</title>
</head>
<body>
    <h1>Calculadora</h1>

    <form method="POST">
        <input type="number" placeholder="Informe um valor" name="valor1">
        <br><br>
        
        <select name="operacao">
              <option value="">----Selecione a operação----</option>
              <option value="+">Somar</option>
              <option value="-">Subtrair</option>
              <option value="*">Multiplicar</option>
              <option value="/">Dividir</option>
          </select>
        <br><br>
        
        <input type="number" placeholder="Informe outro valor" name="valor2">
        <br><br>
          
        <button type="submit">Calcular</button>
        
        
    </form>
</body>
</html>
