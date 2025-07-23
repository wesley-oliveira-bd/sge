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

        $id = $_GET['id'];
        $consulta = "SELECT * FROM produtos WHERE id='$id' ";
        $sql = mysqli_query($conexao, $consulta) or die(mysqli_error($conexao));
        $row = mysqli_fetch_assoc($sql);
  
  ?>

<h2>Edição de Produto</h2>

<form action="salvar_alteracoes.php" method="POST" enctype="multipart/form-data">
  <label for="id">ID:</label><br>
  <input type="number" id="id" name="id" value="<?=$row['id']; ?>" readonly><br><br>

  <label for="referencia">Refer.:</label><br>
  <input type="text" id="referencia" name="referencia" value="<?=$row['referencia']?>" ><br><br>

  <label for="descricao">Descrição:</label><br>
  <input type="text" id="descricao" name="descricao"  required value="<?=$row['descricao']?>"><br><br>

  <label for="unid">Unid.:</label><br>
  <input type="text" id="unid" name="unid" required value="<?=$row['unid']?>" > <br><br>

  <label for="custo">Custo:</label><br>
  <input type="number" step="0.01" id="custo" name="custo" required value="<?=$row['custo']?>"><br><br>

  <label for="margem">Margem:</label><br>
  <input type="number" step="0.01" id="margem" name="margem" required value="<?=$row['margem']?>"><br><br>

  <label for="venda">Venda:</label><br>
  <input type="number" step="0.01" id="venda" name="venda" required value="<?=$row['venda']?>"><br><br>

  <label for="estoque">Estoque:</label><br>
  <input type="number" id="estoque" name="estoque" value="<?=$row['estoque']?>"><br><br>

  <label for="obs">Observ.:</label><br>
  <input type="text" id="obs" name="obs" value="<?=$row['obs']?>" ><br><br>

  <label for="imagem">Imagem do Produto:</label><br>
  <input type="file" id="imagem" name="imagem"><br><br>

  <input type="submit" value="Salvar alterações" name="alterar">
</form>

<script>
// Script para calcular automaticamente o valor de venda ou margem

// Seleciona os inputs do formulário
const custoInput = document.getElementById('custo');
const margemInput = document.getElementById('margem');
const vendaInput = document.getElementById('venda');

// Evita que os eventos entrem em loop
let atualizando = false;

// Calcula o valor de venda a partir do custo e margem
function calcularVenda() {
  if (atualizando) return;
  const custo = parseFloat(custoInput.value) || 0;
  const margem = parseFloat(margemInput.value) || 0;
  const venda = custo + (custo * margem / 100);
  atualizando = true;
  vendaInput.value = venda.toFixed(2);
  atualizando = false;
}

// Calcula a margem a partir do custo e valor de venda
function calcularMargem() {
  if (atualizando) return;
  const custo = parseFloat(custoInput.value) || 0;
  const venda = parseFloat(vendaInput.value) || 0;
  if (custo === 0) return; // Evita divisão por zero
  const margem = ((venda - custo) / custo) * 100;
  atualizando = true;
  margemInput.value = margem.toFixed(2);
  atualizando = false;
}

// Define os eventos de escuta
custoInput.addEventListener('input', () => {
  calcularVenda();
  calcularMargem();
});

margemInput.addEventListener('input', calcularVenda);
vendaInput.addEventListener('input', calcularMargem);
</script>



<?php include_once '../includes/footer.php'; ?>

</body>
</html>