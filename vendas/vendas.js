document.addEventListener("DOMContentLoaded", function () {
  document.getElementById('data_emissao').value = new Date().toLocaleDateString('pt-BR');

});


function verificaPagamento() {
  const forma = document.getElementById('forma_pagamento').value;
  const div = document.getElementById('div_parcelamento');
  div.style.display = (forma === 'cartao' || forma === 'prazo') ? 'block' : 'none';
}

function gerarParcelas() {
  const parcelas = parseInt(document.getElementById('parcelas').value || 1);
  const valorTotal = parseFloat(document.getElementById('total_venda').value) || 0;
  const container = document.getElementById('campos_parcelas');
  const dataEmissaoInput = document.getElementById('data_emissao');
  container.innerHTML = '';

  document.addEventListener('input', function(e) {
    if (e.target.id === 'parcelas') {
      gerarParcelas();
    }
  });

    // Converter data_emissao para objeto Date
    const [dia, mes, ano] = dataEmissaoInput.value.split('/').map(Number);
    let dataBase = new Date(ano, mes - 1, dia);

    for (let i = 1; i <= parcelas; i++) {
      const valorParcela = (valorTotal / parcelas).toFixed(2);

      // Clonar a data base e adicionar 30 dias * (i - 1)
      let dataVencimento = new Date(dataBase);
      dataVencimento.setDate(dataBase.getDate() + (30 * i));

      // Formatar para dd/mm/yyyy
      const diaVenc = String(dataVencimento.getDate()).padStart(2, '0');
      const mesVenc = String(dataVencimento.getMonth() + 1).padStart(2, '0');
      const anoVenc = dataVencimento.getFullYear();
      const vencimentoFormatado = `${diaVenc}/${mesVenc}/${anoVenc}`;

      const campo = document.createElement('div');
      campo.innerHTML = `
        Parcela ${i}: 
        <input type="text" value="R$ ${valorParcela}" readonly>
        Vencimento: 
        <input type="text" value="${vencimentoFormatado}" readonly>
      `;
      container.appendChild(campo);
    }
}


//busca de clientes
$(document).ready(function() {
  $('#cliente_nome').keyup(function() {
    let termo = $(this).val();

    if (termo.length >= 2) {
      $.ajax({
        url: 'buscar-clientes.php',
        method: 'POST',
        data: { termo: termo },
        success: function(resposta) {
          $('#resultadoBusca').html(resposta).show();
        }
      });
    } else {
      $('#resultadoBusca').hide();
    }
  });

  // Oculta sugestões ao clicar fora
  $(document).click(function(e) {
    if (!$(e.target).closest('#cliente_nome, #resultadoBusca').length) {
      $('#resultadoBusca').hide();
    }
  });
});


//função para completar os campos id e celular no cabeçalho do cliente
function selecionarCliente(id, nome, celular) {
  $('#cliente_nome').val(nome);
  $('#cliente_id').val(id);
  $('#cliente_celular').val(celular);
  $('#resultadoBusca').hide();
}
//FIM BUSCA CLIENTE

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
      atualizarTotais();


      //Limpa o campo e esconde sugestões
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
      atualizarTotais();

    }

    function atualizarTotais() {
  const linhas = document.querySelectorAll('#corpo-produtos tr');
  let total = 0;

  linhas.forEach(linha => {
    const qtd = parseFloat(linha.querySelector('td:nth-child(4) input').value) || 0;
    const unit = parseFloat(linha.querySelector('td:nth-child(5) input').value) || 0;
    total += qtd * unit;
  });

  document.getElementById('total_venda').value = total.toFixed(2);
}


//ABERTURA DE NOVA VENDA
$(document).ready(function () {
  $('#btnNovaVenda').on('click', function () {
    $.ajax({
      url: 'nova-venda.php',
      type: 'POST',
      success: function (id) {
        if (!isNaN(id)) {
          $('#id_venda').val(id);

          // Formata a data para dd/mm/yyyy
          const hoje = new Date();
          const dia = String(hoje.getDate()).padStart(2, '0');
          const mes = String(hoje.getMonth() + 1).padStart(2, '0');
          const ano = hoje.getFullYear();
          const dataFormatada = `${dia}/${mes}/${ano}`;

          $('#data_emissao').val(dataFormatada);
          $('#conteudo-venda').slideDown();
        } else {
          alert('Erro ao criar nova venda.');
        }
      },
      error: function () {
        alert('Erro na comunicação com o servidor.');
      }
    });
  });
});

