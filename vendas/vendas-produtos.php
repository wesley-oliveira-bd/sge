<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
      $consulta = isset($_POST["consulta"]) ? $_POST["consulta"] : "";


      if ($consulta == ""){

          $exibe = "SELECT *, produtos.descricao AS descricao_produto, clientes.nome AS nome_cliente
                    FROM vendaprodutos
                    INNER JOIN produtos ON vendaprodutos.produto_id = produtos.id
                    INNER JOIN clientes ON vendaprodutos.cliente_id = clientes.id";  



          $sql = mysqli_query($conexao, $exibe) or die("Não foi possível executar consulta." . mysqli_error($conexao));
      } else {
          $exibe = "SELECT *, produtos.descricao AS descricao_produto 
                    FROM vendaprodutos
                    INNER JOIN produtos ON vendaprodutos.produto_id = produtos.id
                    WHERE produtos.descricao LIKE '%$consulta%'";
          $sql = mysqli_query($conexao, $exibe);
      }

      echo "<table border='1'>";
        echo "<tr>
                <th>ID</th>
                <th>Id da venda</th>
                <th>Cliente</th>
                <th>Descrição</th>
                <th>Quant.</th>
                <th>Valor unit.</th>
                <th>Valor total</th>
                
            </tr>";
        while ($row = mysqli_fetch_assoc($sql)) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['venda_id']}</td>";
            echo "<td>{$row['nome_cliente']}</td>";
            echo "<td>{$row['descricao_produto']}</td>";
            echo "<td>{$row['quant_venda']}</td>";
            echo "<td>{$row['valor_unit']}</td>";
            echo "<td>{$row['valor_total']}</td>";
            echo "</tr>";
            
        }
      echo "</table>";
      


      include_once '../includes/footer.php';
   ?>
    
</body>
</html>