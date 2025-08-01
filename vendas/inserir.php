<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../config/conexao.php';

    $id = $_POST["id_venda"];
    $data_emissao = $_POST["data_emissao"];
    $cliente_id = $_POST["cliente_id"];
    $total_venda = $_POST["total_venda"];

    $produto_ids = $_POST['produto_id'];
    $descricoes  = $_POST['descricao'];
    $unidades    = $_POST['unidade'];
    $quantidades = $_POST['qtd'];
    $valores     = $_POST['valor_unit'];

    // Atualiza a venda principal
    $sql_venda = "UPDATE vendas SET cliente_id='$cliente_id', total_venda='$total_venda' WHERE id='$id'";
    if (mysqli_query($conexao, $sql_venda)) {

        // Opcional: remove itens antigos da venda, se for edição
        //mysqli_query($conexao, "DELETE FROM vendaProdutos WHERE venda_id = '$id'");

        // Insere os produtos da venda
        for ($i = 0; $i < count($produto_ids); $i++) {
            $produto_id  = $produto_ids[$i];
            $qtd         = $quantidades[$i];
            $valor_unit  = $valores[$i];
            $valor_total = $qtd * $valor_unit;

            $sql_item = "INSERT INTO vendaprodutos (venda_id, cliente_id, produto_id, quant_venda, valor_unit, valor_total)
                         VALUES ('$id', '$cliente_id', '$produto_id', '$qtd', '$valor_unit', '$valor_total')";

            mysqli_query($conexao, $sql_item);
        }

        echo "Venda salva com sucesso!";
    } else {
        echo "Erro ao atualizar venda: " . mysqli_error($conexao);
    }

    echo "<br/><a href='vendas.php'>Voltar</a>";
}
?>
