<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Venda de Produtos</title>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    #resultadoProdutos {
      position: absolute;
      background: #fff;
      border: 1px solid #ccc;
      width: 300px;
      z-index: 1000;
    }
    #resultadoProdutos div {
      padding: 5px;
      cursor: pointer;
    }
    #resultadoProdutos div:hover {
      background-color: #f0f0f0;
    }
    table {
      margin-top: 20px;
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      padding: 5px;
      border: 1px solid #ccc;
    }
  </style>
</head>
<body>

  <h2>Buscar Produto</h2>

  <input type="text" name="busca_produto" id="busca_produto" autocomplete="off" placeholder="Digite o nome do produto">
  <div id="resultadoProdutos"></div>

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
      <!-- Produtos serão inseridos aqui -->
    </tbody>
  </table>

  

  <script>
    // Função para buscar produtos
    $(document).ready(function () {
      $('#busca_produto').keyup(function () {
        let termo = $(this).val();

        if (termo.length >= 2) {
          $.ajax({
            url: 'buscar-produtos.php',
            method: 'POST',
            data: { termo: termo },
            success: function (resposta) {
              $('#resultadoProdutos').html(resposta).show();
            }
          });
        } else {
          $('#resultadoProdutos').hide();
        }
      });

      // Oculta sugestões ao clicar fora
      $(document).click(function (e) {
        if (!$(e.target).closest('#resultadoProdutos, #busca_produto').length) {
          $('#resultadoProdutos').hide();
        }
      });
    });

    // Função chamada ao clicar no item da lista
    function selecionarProdutos(id, descricao, unid, venda) {
      const tabela = document.getElementById('corpo-produtos');
      const novaLinha = document.createElement('tr');

      novaLinha.innerHTML = `
        <td>${id}</td>
        <td>${descricao}</td>
        <td>${unid}</td>
        <td><input type="number" value="1" min="1" onchange="atualizarTotal(this)"></td>
        <td><input type="number" value="${venda}" step="0.01" onchange="atualizarTotal(this)"></td>
        <td class="total">${parseFloat(venda).toFixed(2)}</td>
        <td><button onclick="this.closest('tr').remove()">Remover</button></td>
      `;

      tabela.appendChild(novaLinha);

      // Limpa o campo e esconde sugestões
      document.getElementById('busca_produto').value = '';
      document.getElementById('resultadoProdutos').innerHTML = '';
    }

    // Atualiza valor total da linha
    function atualizarTotal(campo) {
      const linha = campo.closest('tr');
      const qtd = linha.querySelector('td:nth-child(4) input').value;
      const unit = linha.querySelector('td:nth-child(5) input').value;
      const total = linha.querySelector('.total');

      total.textContent = (parseFloat(qtd) * parseFloat(unit)).toFixed(2);
    }
  </script>

</body>
</html>
