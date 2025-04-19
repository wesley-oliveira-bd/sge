<header>
    <h3>Cadastro de Produtos</h3>
</header>
<div>
    <form action="index.php?menuop=inserir-produto" method="post">
        
        <div>
            <label for="refProduto">Referência:</label>
            <input type="text" name="refProduto" id="refProduto">
        </div>
        <div>
            <label for="descricaoProduto">Descrição:</label>
            <input type="text" name="descricaoProduto" id="descricaoProduto">
        </div>
        <div>
            <label for="unidProduto">Unid:</label>
            <input type="text" name="unidProduto" id="unidProduto">
        </div>
        <div>
            <label for="qtProduto">Quant.:</label>
            <input type="text" name="qtProduto" id="qtProduto">
        </div>
        <div>
            <label for="custoProduto">Preço custo:</label>
            <input type="text" name="custoProduto" id="custoProduto">
        </div>
        <div>
            <label for="vendaProduto">Preço venda:</label>
            <input type="text" name="vendaProduto" id="vendaProduto">
        </div>
        <div>
            <label for="margemProduto">Margem(%):</label>
            <input type="text" name="margemProduto" id="margemProduto">
        </div>
        <div>
            <label for="obsProduto">Observ.:</label>
            <input type="text" name="obsProduto" id="obsProduto">
        </div>
        <div>
            <input type="button" value="Foto">
        </div>
        <hr>
        <div>
            <input type="submit" value="Adicionar" name="btnAdcionar">
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