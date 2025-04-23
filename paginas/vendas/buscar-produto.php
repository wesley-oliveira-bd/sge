<?php
include("../../db/conexao.php");
// Verifique a conexão
if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

// Receba o nome para pesquisa
$nomePesquisa = isset($_POST['nome']) ? $conexao->real_escape_string($_POST['nome']) : '';

// Consulta SQL para buscar produtos (use LIKE para busca parcial)
$sql = "SELECT idProduto, descricaoProduto, vendaProduto, qtProduto FROM tbprodutos WHERE descricaoProduto LIKE '%" . $nomePesquisa . "%' LIMIT 10"; // Limite para não retornar muitos resultados

$result = $conexao->query($sql);

$produtos = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $produtos[] = $row;
    }
}

// Retorne os resultados como JSON
header('Content-Type: application/json');
echo json_encode($produtos);

$conexao->close();
?>