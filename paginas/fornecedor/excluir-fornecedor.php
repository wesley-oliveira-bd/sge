<header><h3>Excluir Fornecedor</h3></header>

<?php 
    $idFornecedor = mysqli_real_escape_string($conexao, $_GET["idFornecedor"]);
    $sql = "DELETE FROM tbfornecedores WHERE idFornecedor='{$idFornecedor}'";

    mysqli_query($conexao, $sql) or die("Erro ao excluir o registro. " . mysqli_error($conexao));
    echo "Registro excluído com sucesso. ";
?>