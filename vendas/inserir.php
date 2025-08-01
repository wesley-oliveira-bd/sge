<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        include '../config/conexao.php';

        $id = $_POST["id_venda"];
        $data_emissao = $_POST["data_emissao"];
        $cliente_id = $_POST["cliente_id"];
        $total_venda = $_POST["total_venda"];

        $sql_venda = "UPDATE vendas SET cliente_id='$cliente_id', total_venda='$total_venda' WHERE vendas.id='$id' ";

        if(mysqli_query($conexao, $sql_venda)){
            echo "Venda salva com sucesso!";
        } else {
            echo "Erro ao atualizar!" . mysqli_error($conexao);
        }

        echo "<br/><a href='vendas.php'>Voltar</a>";
        
    }
?>