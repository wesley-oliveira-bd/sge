document.addEventListener("DOMContentLoaded", function () {
  document.getElementById('data_emissao').value = new Date().toLocaleDateString('pt-BR');
  document.getElementById('id_venda').value = gerarIdVenda();
  adicionarLinha();
});

function gerarIdVenda() {
  return Math.floor(Math.random() * 100000);
}

/*function buscarCliente() {
  alert("Aqui você pode abrir uma janela/modal para buscar cliente");
  document.getElementById('cliente_id').value = 123;
  document.getElementById('cliente_nome').value = "João da Silva";
  document.getElementById('cliente_celular').value = "(11) 91234-5678";
}*/

function buscarProduto(callback) {
  alert("Aqui você pode abrir uma janela/modal para buscar produto");
  callback({
    id: 456,
    descricao: "Pneu Aro 15",
    unidade: "UN",
    valor_unitario: 250.00
  });
}

function adicionarLinha() {
  buscarProduto(function(produto) {
    const tbody = document.getElementById('corpo-produtos');
    const linha = document.createElement('tr');

    linha.innerHTML = `
      <td><input type="text" name="produto_id[]" value="${produto.id}" readonly></td>
      <td><input type="text" name="descricao[]" value="${produto.descricao}" readonly></td>
      <td><input type="text" name="unidade[]" value="${produto.unidade}" readonly></td>
      <td><input type="number" name="quantidade[]" value="1" min="1" onchange="atualizarTotais()"></td>
      <td><input type="text" name="valor_unitario[]" value="${produto.valor_unitario.toFixed(2)}" readonly></td>
      <td><input type="text" name="valor_total[]" value="${produto.valor_unitario.toFixed(2)}" readonly></td>
      <td><button type="button" onclick="this.closest('tr').remove(); atualizarTotais();">Remover</button></td>
    `;
    tbody.appendChild(linha);
    atualizarTotais();
  });
}

function atualizarTotais() {
  let total = 0;
  const linhas = document.querySelectorAll('#corpo-produtos tr');

  linhas.forEach(tr => {
    const qtd = parseFloat(tr.querySelector('[name="quantidade[]"]').value) || 0;
    const unit = parseFloat(tr.querySelector('[name="valor_unitario[]"]').value) || 0;
    const totalItem = qtd * unit;
    tr.querySelector('[name="valor_total[]"]').value = totalItem.toFixed(2);
    total += totalItem;
  });

  document.getElementById('total_venda').value = total.toFixed(2);
  gerarParcelas();
}

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






document.addEventListener('input', function(e) {
  if (e.target.id === 'parcelas') {
    gerarParcelas();
  }
});



$(function() {
  var clientes = [
    "joao da silva",
    "maria de souza",
    "joaquim teixeira",
    "antonio de oliveira"
  ];
  $("#cliente_nome" ).autocomplete({
    source: clientes
  });
});

