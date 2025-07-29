<?php
include '../config/conexao.php';

if (isset($_POST['termo'])) {
  $termo = $_POST['termo'];

  $sql = "SELECT id, nome, celular FROM clientes WHERE nome LIKE ? LIMIT 10";
  $stmt = $conexao->prepare($sql);
  $busca = "%" . $termo . "%";
  $stmt->bind_param("s", $busca);
  $stmt->execute();
  $resultado = $stmt->get_result();

  if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
      $id = htmlspecialchars($row['id']);
      $nome = htmlspecialchars($row['nome']);
      $celular = htmlspecialchars($row['celular']);

      echo "<div onclick=\"selecionarCliente('$id', '$nome', '$celular')\" style='padding: 5px; cursor: pointer;'>$nome</div>";
    }
    } else {
    echo "<div style='padding: 5px;'>Nenhum cliente encontrado</div>";
   }
}
?>
