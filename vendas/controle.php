<?php
include_once '../includes/header.php';
include_once '../config/conexao.php';
?>

<h2>Lista de vendas</h2>   
<form action="" method="post">
    <label for="consulta">Consulta:</label>
    <input type="text" name="consulta" id="consulta">
    <input type="submit" value="OK">
</form>

<?php  
$consulta = $_POST["consulta"] ?? "";

if ($consulta == "") {
    $exibe = "SELECT v.*, c.nome AS nome_cliente 
              FROM vendas v 
              INNER JOIN clientes c ON v.cliente_id = c.id";
} else {
    $exibe = "SELECT v.*, c.nome AS nome_cliente 
              FROM vendas v 
              INNER JOIN clientes c ON v.cliente_id = c.id
              WHERE c.nome LIKE '%$consulta%'";
}

$sql = mysqli_query($conexao, $exibe) or die("Erro: " . mysqli_error($conexao));

echo "<table border='1'>";
echo "<tr>
        <th>ID</th>
        <th>Data de Emissão</th>
        <th>Cliente</th>
        <th>Valor da venda</th>
        <th>Editar</th>
        <th>Excluir</th>
    </tr>";

while ($row = mysqli_fetch_assoc($sql)) {
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>" . date("d/m/Y", strtotime($row['data_emissao'])) . "</td>";
    echo "<td>{$row['nome_cliente']}</td>";
    echo "<td>{$row['total_venda']}</td>";
    echo "<td><a href='editar.php?id={$row['id']}'>editar</a></td>";
    echo "<td><a href='excluir.php?id={$row['id']}'>excluir</a></td>";
    echo "</tr>";
}

echo "</table>";

include_once '../includes/footer.php';
?>
