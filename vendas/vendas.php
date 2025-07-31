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

  <?php include '../config/conexao.php'; ?>

  <h2>Nova Venda</h2>

  <form id="form-venda">

    <!-- Cabeçalho da venda -->
    <label>ID da Venda:</label>
    <input type="text" name="id_venda" id="id_venda" readonly><br>

    <label>Data de Emissão:</label>
    <input type="text" name="data_emissao" id="data_emissao" readonly><br>

    <label>Cliente:</label>
    <input type="text" id="cliente_nome" name="cliente_nome" autocomplete="off">
    <input type="number" id="cliente_id" name="cliente_id" readonly>
    <input type="text" id="cliente_celular" name="cliente_celular" readonly>
    <div id="resultadoBusca" style="position: absolute; background: #fff; border: 1px solid #ccc;"></div><br><br>


    <!-- INSERÇÃO DE PRODUTOS --> 
    <input type="text" name="busca_produto" id="busca_produto" autocomplete="off" placeholder="Digite o nome do produto">
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
    <label for="total_venda">Total final: </label>
    <input type="number" name="total_venda" id="total_venda">
    <br>

    <!-- Pagamento -->
    <label>Forma de Pagamento:</label>
    <select id="forma_pagamento" name="forma_pagamento" onchange="verificaPagamento()">
      <option value="">Selecione</option>
      <option value="dinheiro">Dinheiro</option>
      <option value="pix">Pix</option>
      <option value="cartao">Cartão</option>
      <option value="prazo">Prazo</option>
    </select><br><br>

    <div id="div_parcelamento" class="parcelamento">
      <label>Nº de Parcelas:</label>
      <input type="number" id="parcelas" min="1" value="1">
      <div id="campos_parcelas"></div>
    </div><br>

    <!-- Botões -->
    <button type="submit">Salvar</button>
    <button type="button">Pesquisar Vendas</button>
    <button type="button">Imprimir</button>
  </form>
  </body>
  </html>
