<?php
include '../config/conexao.php';

if (isset($_POST['termo'])) {
  $termo = $_POST['termo'];

  $sql = "SELECT id, descricao, unid, venda FROM produtos WHERE descricao LIKE ? LIMIT 10";
  $stmt = $conexao->prepare($sql);
  $busca = "%" . $termo . "%";
  $stmt->bind_param("s", $busca);
  $stmt->execute();
  $resultado = $stmt->get_result();

  if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
      $id = htmlspecialchars($row['id']);
      $descricao = htmlspecialchars($row['descricao']);
      $unid = htmlspecialchars($row['unid']);
      $venda = htmlspecialchars($row['venda']);

      echo "<div onclick=\"selecionarProdutos('$id', '$descricao', '$unid', '$venda')\" style='padding: 5px; cursor: pointer;'>$descricao</div>";
    }
    } else {
    echo "<div style='padding: 5px;'>Nenhum produto encontrado</div>";
   }
}
?>
