<header><h3>Nova Venda</h3></header>

<form class="p-4" id="formVenda" action="index.php?menuop=gravar-venda" method="post">
    <div class="row">
        <div class="col-2">
            <label class="form-label" for="idVenda">ID:</label>
            <input class="form-control input-cinza-claro" type="text" name="idVenda" id="idVenda">
        </div>
        <div class="col-3">
            <label class="form-label" for="dataVenda">Data:</label>
            <input class="form-control input-cinza-claro" type="date" name="dataVenda" id="dataVenda">
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            <label class="form-label" for="idCliente">ID Cliente:</label>
            <input class="form-control input-cinza-claro" type="text" name="idCliente" id="idCliente" readonly>
        </div>
        <div class="col-6">
            <label class="form-label me-2" for="nomeCliente">Nome:</label>
            <div class="input-group">
                <input class="form-control input-cinza-claro flex-grow-1" type="text" name="nomeCliente" id="nomeCliente">
                <button class="btn btn-outline-secondary ms-2" type="button" id="btnBuscarCliente"><i class="bi bi-search"></i></button>
            </div>
        </div>
        <div class="col-4">
            <label class="form-label" for="celularCliente">Celular:</label>
            <input class="form-control input-cinza-claro" type="text" name="celularCliente" id="celularCliente" readonly>
        </div>
    </div>
    
    <!--Modal cliente -->
    <div class="modal fade" id="modalClientes" tabindex="-1" aria-labelledby="modalClientesLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalClientesLabel">Buscar Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" id="pesquisarNomeClienteModal" class="form-control mb-3" placeholder="Digite o nome para pesquisar">
                    <div id="resultadoBuscaClientes">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>      

        <!--Modal produtos -->
        <div class="modal fade" id="modalProdutos" tabindex="-1" aria-labelledby="modalProdutosLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalProdutosLabel">Buscar Produtos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" id="pesquisarDescricaoProdutoModal" class="form-control mb-3" placeholder="Digite o nome para pesquisar">
                        <div id="resultadoBuscaProdutos">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>      

    <hr>
    <h5>Produtos da Venda</h5>
    <div id="containerProdutos"></div>
    <hr>

    <div class="row d-flex align-items-center">
        <div class="col-2">
            <button class="btn btn-primary mt-4"  type="button" id="btnIncluirProduto">Incluir Produto</button>
        </div>
        <div class="col-2">
            <label class="form-label" for="valorTotalVenda">Valor Total:</label>
            <input class="form-control input-cinza-claro" type="text" id="valorTotalVenda" name="valorTotalVenda" value="0.00" readonly>
        </div>
        <div class="col-2">
            <label class="form-label" for="valorDesconto">Desconto:</label>
            <input class="form-control input-cinza-claro" type="number" id="valorDesconto" name="valorDesconto" value="0.00" step="0.01">
        </div>
        <div class="col-2">
            <label class="form-label" for="valorAcrescimo">Acréscimo:</label>
            <input class="form-control input-cinza-claro" type="number" id="valorAcrescimo" name="valorAcrescimo" value="0.00" step="0.01">
        </div>
        <div class="col-2">
            <label class="form-label" for="valorFinal">Total Final:</label>
            <input class="form-control input-cinza-claro" type="text" id="valorFinal" name="valorFinal" value="0.00" readonly>
        </div>
    </div>
    <hr>
    <!-- inicio bloco forma de pagamento -->
    
    <div class="col-3">
            <label class="form-label" for="formaPgto">Pagamento:</label>
            <select class="form-control input-cinza-claro" id="formaPgto" name="formaPgto">
                <option value="">Selecione a forma de pagamento</option>
                <option value="dinheiro">Dinheiro</option>
                <option value="pix">Pix</option>
                <option value="30d">30 dias</option>
                <option value="30/60d">30/60 dias</option>
                <option value="30/60/90d">30/60/90 dias</option>
                <option value="30/60/90/120d">30/60/90/120 dias</option>
                <option value="cartao_credito">Cartão de Crédito</option>
                <option value="cartao_debito">Cartão de Débito</option>
            </select>
    </div>
    
    <hr>
    <div class="row">
        <div class="col-2"><button class="btn btn-primary" type="submit">Salvar Venda</button></div>
    </div>
</form>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.9/font/bootstrap-icons.min.css">
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const dataVendaInput = document.getElementById('dataVenda');
    const hoje = new Date();
    const ano = hoje.getFullYear();
    const mes = String(hoje.getMonth() + 1).padStart(2, '0');
    const dia = String(hoje.getDate()).padStart(2, '0');
    const dataAtualFormatada = `${ano}-${mes}-${dia}`;
    dataVendaInput.value = dataAtualFormatada;
  });
</script>
