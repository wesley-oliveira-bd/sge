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
  ?>
      <h2>Lista de clientes</h2>   

      <form action="" method="post">
        <label for="consulta">Consulta:</label>
        <input type="text" name="consulta" id="consulta">
        <input type="submit" value="OK">
      </form>
  
  <?php  
      $consulta = isset($_POST["consulta"]) ? $_POST["consulta"] : "";


      if ($consulta == ""){

          $exibe = "SELECT * FROM clientes";
          $sql = mysqli_query($conexao, $exibe) or die("Não foi possível executar consulta." . mysqli_error($conexao));
      } else {
          $exibe = "SELECT * FROM clientes WHERE nome LIKE '%$consulta%' ";
          $sql = mysqli_query($conexao, $exibe);
      }

      echo "<table border='1'>";
        echo "<tr>
                <th>Editar</th>
                <th>Excluir</th>
                <th>ID</th>
                <th>nome</th>
                <th>logradouro</th>
                <th>numero</th>
                <th>Compl.</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>UF</th>
                <th>CEP</th>
                <th>CPF/CNPJ</th>
                <th>Celular</th>
                <th>Instagram</th>
                <th>Obs.</th>
                <th>Limite</th>
                <th>Bloq.</th>
                <th>Tipo</th>
            </tr>";
        while ($row = mysqli_fetch_assoc($sql)) {
            echo "<tr>";
                echo "<td><a href='editar.php?id=".$row['id']."'>editar</td>";
                echo "<td><a href='excluir.php?id=".$row['id']."'>excluir</td>";
                echo "<td>{$row['id']}</td>";
                echo "<td>{$row['nome']}</td>";
                echo "<td>{$row['logradouro']}</td>";
                echo "<td>{$row['numero']}</td>";
                echo "<td>{$row['complemento']}</td>";
                echo "<td>{$row['bairro']}</td>";
                echo "<td>{$row['cidade']}</td>";
                echo "<td>{$row['uf']}</td>";
                echo "<td>{$row['cep']}</td>";
                if ($row['tipo'] === 'fisica') {
                   echo "<td>{$row['cpf']}</td>";
                } else if ($row['tipo'] === 'juridica') {
                   echo "<td>{$row['cnpj']}</td>";
                } else {
                   echo "<td>-</td>"; // Caso venha algo inesperado
                }
                echo "<td>{$row['celular']}</td>";
                echo "<td>{$row['instagram']}</td>";
                echo "<td>{$row['obs']}</td>";
                echo "<td>{$row['limite']}</td>";
                echo "<td>{$row['bloqueado']}</td>";
                echo "<td>{$row['tipo']}</td>";

            echo "</tr>";
            
        }
      echo "</table>";
      


      include_once '../includes/footer.php';
   ?>

</body>
</html>