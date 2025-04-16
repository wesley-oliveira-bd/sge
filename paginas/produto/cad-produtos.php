<header>
    <h3>Cadastro de Produtos</h3>
</header>
<div>
    <form action="index.php?menuop=inserir-produto" method="post">
        <div>
            <label for="idProduto">ID:</label>
            <input type="text" name="idProduto" id="idProduto">
        </div>
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
            <input type="submit" value="Adicionar" name="btnAdcicionar">
        </div>
    </form>
</div>