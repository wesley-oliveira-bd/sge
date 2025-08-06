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
        date_default_timezone_set('America/Sao_Paulo');

    ?>

    <h2>Contas a receber</h2>   
    <form action="" method="post">
        <label for="consulta">Consulta:</label>
        <input type="text" name="consulta" id="consulta">
        <input type="submit" value="OK">
    </form>
    <?php  
      $consulta = isset($_POST["consulta"]) ? $_POST["consulta"] : "";


      if ($consulta == ""){
                $exibe = " SELECT *, clientes.nome AS nome_cliente, contasreceber.id as id_contasreceber
                 FROM contasreceber
                 INNER JOIN clientes ON contasreceber.cliente_id = clientes.id
                 ORDER BY contasreceber.id ASC";
            } else {
                $exibe = "SELECT *, clientes.nome AS nome_cliente, contasreceber.id as id_contasreceber
                 FROM contasreceber
                 INNER JOIN clientes ON contasreceber.cliente_id = clientes.id
                WHERE clientes.nome LIKE '%$consulta%' ";
            }

        $sql = mysqli_query($conexao, $exibe);



      echo "<table border='1'>";
        echo "<tr>
                <th>ID</th>
                <th>Id da venda</th>
                <th>Cliente</th>
                <th>Emissão</th>
                <th>Parcela</th>
                <th>/</th>
                <th>Tot.Parc.</th>
                <th>Valor</th>
                <th>Vencimento</th>
                <th>Valor pago</th>
                <th>Data pgto</th>
                <th>Forma</th>
                <th>Restante</th>
                <th>Status</th>
                <th>Editar</th>
                <th>Excluir</th>
                
            </tr>";
        while ($row = mysqli_fetch_assoc($sql)) {
            echo "<tr>";
            echo "<td>{$row['id_contasreceber']}</td>";
            echo "<td>{$row['venda_id']}</td>";
            echo "<td>{$row['nome_cliente']}</td>";
            echo "<td>" . date("d/m/Y", strtotime($row['data_emissao'])) . "</td>";
            echo "<td>{$row['numero_parcela']}</td>";
            echo "<td>de</td>";
            echo "<td>{$row['total_parcelas']}</td>";
            echo "<td>{$row['valor_parcela']}</td>";
            echo "<td>" . date("d/m/Y", strtotime($row['vencimento'])) . "</td>"; 
            echo "<td> {$row['valor_pago']} </td>";
            echo "<td> {$row['data_pgto']} </td>";
            echo "<td>{$row['forma_pgto']}</td>";
            echo "<td>{$row['resto_pgto']}</td>";
            echo "<td>{$row['status']}</td>";
            echo "<td><a href='editar.php?id=".$row['id']."'>editar</td>";
            echo "<td><a href='excluir.php?id=".$row['id']."'>excluir</td>";    
            echo "</tr>";
            
        }
      echo "</table>";
      


      include_once '../includes/footer.php';
   ?>
    
</body>
</html>