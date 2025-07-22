<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
      include_once '../includes/header.php';
      include_once '../config/conexao.php';
      
      $exibe = "SELECT * FROM produtos";
      $sql = mysqli_query($conexao, $exibe) or die("Não foi possível executar consulta." . mysqli_error($conexao));

      echo "<table border='1'>";
        echo "<tr>
                <th>ID</th>
                <th>Referência</th>
                <th>Descrição</th>
                <th>Unidade</th>
                <th>Custo</th>
                <th>Margem</th>
                <th>Venda</th>
                <th>Estoque</th>
                <th>Obs</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>";
        while ($row = mysqli_fetch_assoc($sql)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['referencia']}</td>";
            echo "<td>{$row['descricao']}</td>";
            echo "<td>{$row['unid']}</td>";
            echo "<td>{$row['custo']}</td>";
            echo "<td>{$row['margem']}</td>";
            echo "<td>{$row['venda']}</td>";
            echo "<td>{$row['estoque']}</td>";
            echo "<td>{$row['obs']}</td>";
            echo "<td>editar</td>";
            echo "<td>excluir</td>";
            echo "</tr>";
            
        }
      echo "</table>";
      


      include_once '../includes/footer.php';
   ?>

</body>
</html>