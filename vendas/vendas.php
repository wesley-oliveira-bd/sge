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
  <a href="../produtos/cadastrar.php">Cadastrar produto</a>
  <a href="../clientes/cadastrar.php">Cadastrar cliente</a> 
  <a href="../vendas/controle.php">Lista de vendas</a>
  <a href="../vendas/vendas-produtos.php">Vendas por produtos</a>
  
  <h2>Nova Venda</h2>
  <button type="submit" id="btnNovaVenda">Nova Venda</button><br>
  <br>

  <div id="conteudo-venda" style="display: none;">  
    <form action="inserir.php" id="form-venda" method="POST">
      <!-- Cabeçalho da venda -->
       <label for="id_venda">ID:</label>
       <input type="number" name="id_venda" id="id_venda">
      <label>Data de Emissão:</label>
      <input type="text" name="data_emissao" id="data_emissao" readonly><br>
      <label>Cliente:</label>
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
            <th><input type="number" id="cliente_id" name="cliente_id" readonly></th>
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
      <label for="total_venda">Total final:   </label>
      <input type="number" name="total_venda" id="total_venda" value="0.00">
      <br><br>
      <!-- Pagamento -->
      <label>Forma de Pagamento:</label>
      <select id="forma_pagamento" name="forma_pgto" onchange="verificaPagamento()">
        <option value="">Selecione</option>
        <option value="dinheiro">Dinheiro</option>
        <option value="pix">Pix</option>
        <option value="cartao">Cartão</option>
        <option value="prazo">Prazo</option>
      </select><br>
      <div id="div_parcelamento" class="parcelamento">
        <label>Nº de Parcelas:</label>
        <input type="number" name="total_parcelas" id="parcelas" min="1" value="1" onchange="gerarParcelas()">
        <div id="campos_parcelas"></div>
      </div><br>
      <div id="campo_parcelas"></div>
      <div class="status">
        <input type="text" name="status" id="status" readonly>
      </div>
      <!-- Botões -->
      <button type="submit" name="salvar" value="salvar">Salvar</button>
      <button type="button">Pesquisar Vendas</button>
      <button type="button">Imprimir</button>
    </form>
  </div>
  </body>
  </html>
