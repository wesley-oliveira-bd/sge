<?php
include("../../db/conexao.php");
// Verifique a conexão
if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}

// Receba o nome para pesquisa
$nomePesquisa = isset($_POST['nome']) ? $conexao->real_escape_string($_POST['nome']) : '';

// Consulta SQL para buscar clientes (use LIKE para busca parcial)
$sql = "SELECT idCliente, nomeCliente, celularCliente FROM tbclientes WHERE nomeCliente LIKE '%" . $nomePesquisa . "%' LIMIT 10"; // Limite para não retornar muitos resultados

$result = $conexao->query($sql);

$clientes = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $clientes[] = $row;
    }
}

// Retorne os resultados como JSON
header('Content-Type: application/json');
echo json_encode($clientes);

$conexao->close();
?>