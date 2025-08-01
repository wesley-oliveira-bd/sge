<?php
include '../config/conexao.php';
date_default_timezone_set('America/Sao_Paulo');

$data = date('Y-m-d'); // data atual

$sql = "INSERT INTO vendas (data_emissao, cliente_id, cliente_nome, cliente_celular, total_venda)
        VALUES ('$data', 0, '', '', 0.00)";

if (mysqli_query($conexao, $sql)) {
  echo mysqli_insert_id($conexao); // retorna o ID gerado
} else {
  echo "erro";
}
?>
