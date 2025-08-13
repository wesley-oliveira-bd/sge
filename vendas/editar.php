<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="vendas.js" defer></script>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <title>Nova Venda</title>
</head>
<body>

    <?php
        include_once '../includes/header.php';
        include_once '../config/conexao.php';
        date_default_timezone_set('America/Sao_Paulo');


        $id = intval($_GET['id']); // segurança básica

        // Consulta da venda (1 registro esperado)
        $consulta_vendas = "SELECT * FROM vendas WHERE id = $id";
        $result_venda = mysqli_query($conexao, $consulta_vendas) or die(mysqli_error($conexao));
        $dados_venda = mysqli_fetch_assoc($result_venda);

        // Consulta dos produtos da venda (vários registros)
        $consulta_produtos = "SELECT * FROM vendaprodutos WHERE venda_id = $id";
        $result_produtos = mysqli_query($conexao, $consulta_produtos) or die(mysqli_error($conexao));
        $produtos = [];
        while ($row = mysqli_fetch_assoc($result_produtos)) {
            $produtos[] = $row;
        }

        // Consulta das parcelas/contas a receber (vários registros)
        $consulta_contas = "SELECT * FROM contasreceber WHERE venda_id = $id";
        $result_contas = mysqli_query($conexao, $consulta_contas) or die(mysqli_error($conexao));
        $contas = [];
        while ($row = mysqli_fetch_assoc($result_contas)) {
            $contas[] = $row;
        }
    ?>
  
  
   <div id="conteudo-venda">  
    <form action="inserir.php" id="form-venda" method="POST">
      <!-- Cabeçalho da venda -->
       <label for="id_venda">ID:</label>
       <input type="number" name="id_venda" id="id_venda" value="<?= $dados_venda['id']; ?>" readonly>
      <label>Data de Emissão:</label>
      <input type="text" name="data_emissao" id="data_emissao_editada" value="<?=date("d/m/Y", strtotime($dados_venda['data_emissao'])); ?>" readonly><br>
      
      <label for="cliente_id">Cliente:</label>
      <table border="1">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Celular</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th><input type="number" id="cliente_id" name="cliente_id" value="<?=$dados_venda['cliente_id']; ?>" readonly></th>
            <th>
              <input type="text" id="cliente_nome" name="cliente_nome" autocomplete="off" placeholder="Digite o nome do cliente">
              <div id="resultadoBusca" style="position: absolute; background: #fff; border: 1px solid #ccc;"></div>
            </th>
            <th><input type="text" id="cliente_celular" name="cliente_celular" readonly></th>
          </tr>
        </tbody>
      </table><br>
    

      <!-- INSERÇÃO DE PRODUTOS -->
      <label for="">Produto:</label>
      <input type="text" name="busca_produto" id="busca_produto" autocomplete="off" placeholder="Digite o nome do produto"><br>
      <div id="resultadoProdutos"></div>
      <table id="tabela-produtos" border="1">
        <thead>
          <tr>
            <th>ID</th>
            <th>Descrição</th>
            <th>Unid.</th>
            <th>Qtd</th>
            <th>V. Unitário</th>
            <th>V. Total</th>
            <th>Ação</th>
          </tr>
        </thead>
        <tbody id="corpo-produtos">
        <!-- Produtos serão inseridos aqui -->
        </tbody>
      </table>
    
      <br>
      <label for="desconto_venda">Desconto:</label>
      <input type="number" name="desconto_venda" id="desconto_venda" value="0.00" step="0.01" min="0">
      <label for="acrescimo_venda">Acréscimo:</label>
      <input type="number" name="acrescimo_venda" id="acrescimo_venda" value="0.00" step="0.01" min="0">
      <label for="total_venda">Total final:   </label>
      <input type="number" name="total_venda" id="total_venda" value="0.00" step="0.01" min="0">
      
      <br><br>
      <!-- Pagamento -->
      <label>Forma de Pagamento:</label>
      <select id="forma_pagamento" name="forma_pgto" onchange="verificaPagamento()">
          <option value="">Selecione</option>
          <option value="dinheiro" <?= ($contas[0]['forma_pgto']) === 'dinheiro' ? 'selected' : '' ?>>Dinheiro</option>
          <option value="pix" <?= ($contas[0]['forma_pgto']) === 'pix' ? 'selected' : '' ?>>Pix</option>
          <option value="cartao" <?= ($contas[0]['forma_pgto']) === 'cartao' ? 'selected' : '' ?>>Cartão</option>
          <option value="prazo" <?= ($contas[0]['forma_pgto']) === 'prazo' ? 'selected' : '' ?>>Prazo</option>
      </select><br>


      <div id="div_parcelamento" class="parcelamento">
        <label>Nº de Parcelas:</label>
        <input type="number" name="total_parcelas" id="parcelas" min="1" value="1" onchange="gerarParcelas()">
        <div id="campos_parcelas"></div>
      </div><br>
      <div id="campo_parcelas"></div>
      
      <input type="text" name="status" id="status">
      
      <!-- Botões -->
      <button type="submit" name="salvar" value="salvar">Salvar</button>
      <button type="button">Pesquisar Vendas</button>
      <button type="button">Imprimir</button>
    </form>
  </div>
  </body>
  </html>
