<header><h3>Inserir Produto</h3></header>

<?php 
    $refProduto = mysqli_real_escape_string($conexao, $_POST["refProduto"]);
    $descricaoProduto = mysqli_real_escape_string($conexao, $_POST["descricaoProduto"]);
    $unidProduto = mysqli_real_escape_string($conexao, $_POST["unidProduto"]);
    $qtProduto = mysqli_real_escape_string($conexao, $_POST["qtProduto"]);
    $custoProduto = str_replace(',', '.', mysqli_real_escape_string($conexao, $_POST["custoProduto"]));
    $vendaProduto = str_replace(',', '.', mysqli_real_escape_string($conexao, $_POST["vendaProduto"]));
    $margemProduto = str_replace(',', '.', mysqli_real_escape_string($conexao, $_POST["margemProduto"]));
    $obsProduto = mysqli_real_escape_string($conexao, $_POST["obsProduto"]);

    $sql = "INSERT INTO tbprodutos (
        refProduto,
        descricaoProduto,
        unidProduto,
        qtProduto,
        custoProduto,
        vendaProduto,
        margemProduto,
        obsProduto
    ) VALUES (
        '{$refProduto}',
        '{$descricaoProduto}',
        '{$unidProduto}',
        '{$qtProduto}',
        '{$custoProduto}',
        '{$vendaProduto}',
        '{$margemProduto}',
        '{$obsProduto}'
    )";

    mysqli_query($conexao, $sql) or die("Erro ao execultar a consulta. " . mysqli_error($conexao));

    echo "O registro foi salvo com sucesso.";
?>
