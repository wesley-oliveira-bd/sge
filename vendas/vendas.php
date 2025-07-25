<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="vendas.js"></script>
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
    <input type="text" id="cliente_nome" >
    <input type="hidden" id="cliente_id">
    <input type="text" id="cliente_celular" readonly>
    <button type="button" onclick="buscarCliente()">Buscar Cliente</button><br><br>

    <!-- Tabela de produtos -->
    <table id="tabela-produtos">
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
        <!-- linhas serão inseridas aqui -->
      </tbody>
    </table>
    <button type="button" onclick="adicionarLinha()">Adicionar Produto</button><br><br>

    <!-- Total -->
    <label>Total da Venda:</label>
    <input type="text" id="total_venda" readonly><br><br>

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
