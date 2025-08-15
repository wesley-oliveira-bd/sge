<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../config/conexao.php';

    $id_venda = isset($_POST['id_venda']) ? (int)$_POST['id_venda'] : 0;

    if ($id_venda > 0) {
        // Primeiro, deleta produtos da venda
        mysqli_query($conexao, "DELETE FROM vendaprodutos WHERE venda_id = '$id_venda'");

        // Depois, deleta parcelas
        mysqli_query($conexao, "DELETE FROM contasreceber WHERE venda_id = '$id_venda'");

        // Finalmente, deleta a venda
        if (mysqli_query($conexao, "DELETE FROM vendas WHERE id = '$id_venda'")) {
            echo "ok";
        } else {
            echo "Erro ao deletar venda: " . mysqli_error($conexao);
        }
    } else {
        echo "ID de venda inválido.";
    }
}
?>
