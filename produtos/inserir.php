<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    include '../config/conexao.php';

    $referencia = $_POST["referencia"];
    $descricao = $_POST["descricao"];
    $unid = $_POST["unid"];
    $custo = $_POST["custo"];
    $margem = $_POST["margem"];
    $venda = $_POST["venda"];
    $estoque = $_POST["estoque"];
    $obs = $_POST["obs"];

    $sql = "INSERT INTO produtos (referencia, descricao, unid, custo, margem, venda, estoque, obs) VALUES ( '$referencia', '$descricao', '$unid', '$custo', '$margem', '$venda', '$estoque', '$obs')";

    if(mysqli_query($conexao, $sql)){
        echo "Produto cadastrado com sucesso!";
        
    } else {
        echo "Erro ao cadastrar!" . mysqli_error($conexao);
        
    }

    echo "<br/><a href='controle.php'>Voltar</a>";
    
    
    ?>
</body>
</html>