<header>
    <h3>Cadastro de Produtos</h3>
</header>
<div>
    <form class="p-4" action="index.php?menuop=inserir-produto" method="post">
        
        <div class="row">
            <div class="col">
                <label class="form-label" for="refProduto">Referência:</label>
                <input class="form-control input-cinza-claro" type="text" name="refProduto" id="refProduto">
            </div>
            <div class="col">
                <label class="form-label" for="descricaoProduto">Descrição:</label>
                <input class="form-control input-cinza-claro" type="text" name="descricaoProduto" id="descricaoProduto">
            </div>
            <div class="rol">
                <label class="form-label" for="unidProduto">Unid:</label>
                <input class="form-control input-cinza-claro" type="text" name="unidProduto" id="unidProduto">
            </div>
        </div>

        
        <div class="row">
            <div class="col">
                <label class="form-label" for="qtProduto">Quant.:</label>
                <input class="form-control input-cinza-claro" type="text" name="qtProduto" id="qtProduto">
            </div>
            <div class="col">
                <label class="form-label" for="custoProduto">Preço custo:</label>
                <input class="form-control input-cinza-claro" type="text" name="custoProduto" id="custoProduto">
            </div>
            <div class="col">
                <label class="form-label" for="vendaProduto">Preço venda:</label>
                <input class="form-control input-cinza-claro" type="text" name="vendaProduto" id="vendaProduto">
            </div>
            <div class="col">
                <label class="form-label" for="margemProduto">Margem(%):</label>
                <input class="form-control input-cinza-claro" type="text" name="margemProduto" id="margemProduto">
            </div>
        </div>

        <div>
            <label class="form-label" for="obsProduto">Observ.:</label>
            <input class="form-control input-cinza-claro" type="text" name="obsProduto" id="obsProduto">
        </div>
        <div>
            <input class="btn btn-secondary mt-2" type="button" value="Foto">
        </div>
        <hr>
        <div>
            <input class="btn btn-primary mb-2" type="submit" value="Adicionar" name="btnAdcionar">
        </div>
    </form>
</div>
<div>
    <img width="450" src="./paginas/produto/fotos-produtos/sem_imagem.png" alt="foto sem imagem">
</div>

<script>
    const custoInput = document.getElementById("custoProduto");
    const vendaInput = document.getElementById("vendaProduto");
    const margemInput = document.getElementById("margemProduto");

    function calcularMargem() {
        const custo = parseFloat(custoInput.value.replace(",", "."));
        const venda = parseFloat(vendaInput.value.replace(",", "."));

        if (!isNaN(custo) && !isNaN(venda) && custo > 0) {
            const margem = ((venda - custo) / custo) * 100;
            margemInput.value = margem.toFixed(2).replace(".", ",");
        }
    }

    function calcularVenda() {
        const custo = parseFloat(custoInput.value.replace(",", "."));
        const margem = parseFloat(margemInput.value.replace(",", "."));

        if (!isNaN(custo) && !isNaN(margem)) {
            const venda = custo * (1 + margem / 100);
            vendaInput.value = venda.toFixed(2).replace(".", ",");
        }
    }

    // Eventos de digitação
    custoInput.addEventListener("input", () => {
        calcularMargem();
        calcularVenda();
    });

    vendaInput.addEventListener("input", calcularMargem);
    margemInput.addEventListener("input", calcularVenda);
</script>