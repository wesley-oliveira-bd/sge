<?php 
    $idProduto = mysqli_real_escape_string($conexao, $_POST["idProduto"]);
    $refProduto = mysqli_real_escape_string($conexao, $_POST["refProduto"]);
    $descricaoProduto = mysqli_real_escape_string($conexao, $_POST["descricaoProduto"]);
    $unidProduto = mysqli_real_escape_string($conexao, $_POST["unidProduto"]);
    $qtProduto = mysqli_real_escape_string($conexao, $_POST["qtProduto"]);
    $custoProduto = mysqli_real_escape_string($conexao, $_POST["custoProduto"]);
    $vendaProduto = mysqli_real_escape_string($conexao, $_POST["vendaProduto"]);
    $margemProduto = mysqli_real_escape_string($conexao, $_POST["margemProduto"]);
    $obsProduto = mysqli_real_escape_string($conexao, $_POST["obsProduto"]);

    $sql = "UPDATE tbprodutos SET
        refProduto = '{$refProduto}',
        descricaoProduto = '{$descricaoProduto}',
        unidProduto = '{$unidProduto}',
        qtProduto = '{$qtProduto}',
        custoProduto = '{$custoProduto}',
        vendaProduto = '{$vendaProduto}',
        margemProduto = '{$margemProduto}',
        obsProduto = '{$obsProduto}' WHERE idProduto = '{$idProduto}'";

    
 

    mysqli_query($conexao, $sql) or die("Erro ao execultar a consulta. " . mysqli_error($conexao));

    echo "O registro foi atualizado com sucesso.";
?>