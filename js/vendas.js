document.addEventListener('DOMContentLoaded', function () {
    const btnIncluirProduto = document.getElementById('btnIncluirProduto');
    const containerProdutos = document.getElementById('containerProdutos');
    const valorTotalVendaInput = document.getElementById('valorTotalVenda');
    const valorDescontoInput = document.getElementById('valorDesconto');
    const valorAcrescimoInput = document.getElementById('valorAcrescimo');
    const valorFinalInput = document.getElementById('valorFinal');
    let contadorLinhas = 0;

    function atualizarValorFinal() {
        const valorTotalVenda = parseFloat(valorTotalVendaInput.value) || 0;
        const valorDesconto = parseFloat(valorDescontoInput.value) || 0;
        const valorAcrescimo = parseFloat(valorAcrescimoInput.value) || 0;
        const valorFinal = valorTotalVenda - valorDesconto + valorAcrescimo;
        valorFinalInput.value = valorFinal.toFixed(2);
    }

    function atualizarValorTotalGeral() {
        let totalGeral = 0;
        const valoresTotaisItens = containerProdutos.querySelectorAll('input[name$="[valorTotal]"]');
        valoresTotaisItens.forEach(function (inputValorTotal) {
            const valor = parseFloat(inputValorTotal.value) || 0;
            totalGeral += valor;
        });
        valorTotalVendaInput.value = totalGeral.toFixed(2);
        atualizarValorFinal();
    }

    btnIncluirProduto.addEventListener('click', function () {
        contadorLinhas++;
        const novaLinha = document.createElement('div');
        novaLinha.classList.add('linha-produto');
        novaLinha.innerHTML = `
            <div class="row linha-produto-itens">
                <div class="col-1">
                    <label class="form-label" for="idProduto_${contadorLinhas}">ID:</label>
                    <input class="form-control input-cinza-claro" type="text" id="idProduto_${contadorLinhas}" name="produtos[${contadorLinhas}][idProduto]">
                </div>
                <div class="col-4">
                    <label class="form-label" for="descricaoProduto_${contadorLinhas}">Descrição:</label>
                    <div class="input-group">
                        <input class="form-control input-cinza-claro" type="text" id="descricaoProduto_${contadorLinhas}" name="produtos[${contadorLinhas}][descricaoProduto]">
                        <button class="btn btn-outline-secondary ms-2" type="button" id="btnBuscarProduto_${contadorLinhas}">
                        <i class="bi bi-search"></i></button>
                    </div>
                </div>
                <div class="col-1">
                    <label class="form-label" for="quantidade_${contadorLinhas}">Quant:</label>
                    <input class="form-control input-cinza-claro" type="number" id="quantidade_${contadorLinhas}" name="produtos[${contadorLinhas}][quantidade]" value="1" min="1">
                </div>
                <div class="col-2">
                    <label class="form-label" for="valorUnitario_${contadorLinhas}">Valor Unitário:</label>
                    <input class="form-control input-cinza-claro" type="number" id="valorUnitario_${contadorLinhas}" name="produtos[${contadorLinhas}][valorUnitario]" value="0.00" step="0.01">
                </div>
                <div class="col-2">
                    <label class="form-label" for="valorTotal_${contadorLinhas}">Valor Total:</label>
                    <input class="form-control input-cinza-claro" type="text" id="valorTotal_${contadorLinhas}" name="produtos[${contadorLinhas}][valorTotal]" value="0.00" readonly>
                </div>
                <div class="col-1">
                    <a class="btnExcluirProduto btn btn-outline-warning mt-4"><i class="bi bi-trash"></i></a>
                </div>
            </div>
        `;

        containerProdutos.appendChild(novaLinha);

        const quantidadeInput = novaLinha.querySelector(`#quantidade_${contadorLinhas}`);
        const valorUnitarioInput = novaLinha.querySelector(`#valorUnitario_${contadorLinhas}`);
        const valorTotalInput = novaLinha.querySelector(`#valorTotal_${contadorLinhas}`);
        const btnExcluir = novaLinha.querySelector('.btnExcluirProduto');

        function atualizarValorTotalItem() {
            const quantidade = parseFloat(quantidadeInput.value) || 0;
            const valorUnitario = parseFloat(valorUnitarioInput.value) || 0;
            const valorTotal = quantidade * valorUnitario;
            valorTotalInput.value = valorTotal.toFixed(2);
            atualizarValorTotalGeral();
        }

        quantidadeInput.addEventListener('input', atualizarValorTotalItem);
        valorUnitarioInput.addEventListener('input', atualizarValorTotalItem);

        btnExcluir.addEventListener('click', function () {
            containerProdutos.removeChild(novaLinha);
            atualizarValorTotalGeral();
        });

        const btnBuscarProduto = novaLinha.querySelector(`#btnBuscarProduto_${contadorLinhas}`);
        btnBuscarProduto.addEventListener('click', function () {
            const modalProdutos = new bootstrap.Modal(document.getElementById('modalProdutos'));
            modalProdutos.show();

            let pesquisarDescricaoProdutoModalInput = document.getElementById('pesquisarDescricaoProdutoModal');
            const resultadoBuscaProdutosDiv = document.getElementById('resultadoBuscaProdutos');

            pesquisarDescricaoProdutoModalInput.value = '';
            resultadoBuscaProdutosDiv.innerHTML = '';

            // Substitui input antigo por um novo, para evitar múltiplos eventos
            const novoInput = pesquisarDescricaoProdutoModalInput.cloneNode(true);
            pesquisarDescricaoProdutoModalInput.parentNode.replaceChild(novoInput, pesquisarDescricaoProdutoModalInput);
            pesquisarDescricaoProdutoModalInput = novoInput;

            pesquisarDescricaoProdutoModalInput.addEventListener('input', function buscarInputHandler() {
                const nomePesquisa = this.value.trim();
                if (nomePesquisa.length >= 3) {
                    buscarProdutos(nomePesquisa);
                } else {
                    resultadoBuscaProdutosDiv.innerHTML = '';
                }
            });

            function buscarProdutos(nome) {
                fetch('./paginas/vendas/buscar-produto.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'nome=' + encodeURIComponent(nome),
                })
                    .then(response => response.json())
                    .then(data => {
                        exibirResultadosBusca(data);
                    })
                    .catch(error => {
                        console.error('Erro ao buscar produtos:', error);
                        resultadoBuscaProdutosDiv.innerHTML = '<p class="text-danger">Erro ao buscar produtos.</p>';
                    });
            }

            function exibirResultadosBusca(produtos) {
                resultadoBuscaProdutosDiv.innerHTML = '';
                if (produtos.length > 0) {
                    const listaProdutos = document.createElement('ul');
                    listaProdutos.classList.add('list-group');
                    produtos.forEach(produto => {
                        const listItem = document.createElement('li');
                        listItem.classList.add('list-group-item', 'list-group-item-action', 'cursor-pointer');
                        listItem.textContent = `${produto.descricaoProduto} (ID: ${produto.idProduto}, Preço: ${produto.vendaProduto})`;
                        listItem.addEventListener('click', function () {
                            novaLinha.querySelector(`#idProduto_${contadorLinhas}`).value = produto.idProduto;
                            novaLinha.querySelector(`#descricaoProduto_${contadorLinhas}`).value = produto.descricaoProduto;
                            novaLinha.querySelector(`#valorUnitario_${contadorLinhas}`).value = produto.vendaProduto;
                            atualizarValorTotalGeral();
                            modalProdutos.hide();
                        });
                        listaProdutos.appendChild(listItem);
                    });
                    resultadoBuscaProdutosDiv.appendChild(listaProdutos);
                } else {
                    resultadoBuscaProdutosDiv.innerHTML = '<p class="text-muted">Nenhum produto encontrado com esse nome.</p>';
                }
            }
        });

        atualizarValorTotalGeral();
    });

    valorDescontoInput.addEventListener('input', atualizarValorFinal);
    valorAcrescimoInput.addEventListener('input', atualizarValorFinal);

    atualizarValorFinal();
});

// Modal clientes (sem alterações)
document.addEventListener('DOMContentLoaded', function () {
    const btnBuscarCliente = document.getElementById('btnBuscarCliente');
    const modalClientes = new bootstrap.Modal(document.getElementById('modalClientes'));
    const pesquisarNomeClienteModalInput = document.getElementById('pesquisarNomeClienteModal');
    const resultadoBuscaClientesDiv = document.getElementById('resultadoBuscaClientes');
    const idClienteInput = document.getElementById('idCliente');
    const nomeClienteInput = document.getElementById('nomeCliente');
    const celularClienteInput = document.getElementById('celularCliente');

    btnBuscarCliente.addEventListener('click', function () {
        modalClientes.show();
        pesquisarNomeClienteModalInput.value = '';
        resultadoBuscaClientesDiv.innerHTML = '';
    });

    pesquisarNomeClienteModalInput.addEventListener('input', function () {
        const nomePesquisa = this.value.trim();
        if (nomePesquisa.length >= 3) {
            buscarClientes(nomePesquisa);
        } else {
            resultadoBuscaClientesDiv.innerHTML = '';
        }
    });

    function buscarClientes(nome) {
        fetch('./paginas/vendas/buscar-clientes.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'nome=' + encodeURIComponent(nome),
        })
            .then(response => response.json())
            .then(data => {
                exibirResultadosBusca(data);
            })
            .catch(error => {
                console.error('Erro ao buscar clientes:', error);
                resultadoBuscaClientesDiv.innerHTML = '<p class="text-danger">Erro ao buscar clientes.</p>';
            });
    }

    function exibirResultadosBusca(clientes) {
        resultadoBuscaClientesDiv.innerHTML = '';
        if (clientes.length > 0) {
            const listaClientes = document.createElement('ul');
            listaClientes.classList.add('list-group');
            clientes.forEach(cliente => {
                const listItem = document.createElement('li');
                listItem.classList.add('list-group-item', 'list-group-item-action', 'cursor-pointer');
                listItem.textContent = `${cliente.nomeCliente} (ID: ${cliente.idCliente}, Celular: ${cliente.celularCliente})`;
                listItem.addEventListener('click', function () {
                    idClienteInput.value = cliente.idCliente;
                    nomeClienteInput.value = cliente.nomeCliente;
                    celularClienteInput.value = cliente.celularCliente;
                    modalClientes.hide();
                });
                listaClientes.appendChild(listItem);
            });
            resultadoBuscaClientesDiv.appendChild(listaClientes);
        } else {
            resultadoBuscaClientesDiv.innerHTML = '<p class="text-muted">Nenhum cliente encontrado com esse nome.</p>';
        }
    }
});
