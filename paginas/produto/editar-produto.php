<?php 

$idProduto = $_GET["idProduto"];
$sql = "SELECT * FROM tbprodutos WHERE idproduto={$idProduto}";
$rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar dados." . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);
?>


<header><h3>Editar Produtos</h3></header>

<div>
    <form action="index.php?menuop=atualizar-produto" method="post">
        <div>
            <label for="idProduto">ID:</label>
            <input type="text" name="idProduto" id="idProduto" value="<?=$dados["idProduto"]?>">
        </div>
        <div>
            <label for="refProduto">Referência:</label>
            <input type="text" name="refProduto" id="refProduto" value="<?=$dados["refProduto"]?>">
        </div>
        <div>
            <label for="descricaoProduto">Descrição:</label>
            <input type="text" name="descricaoProduto" id="descricaoProduto" value="<?=$dados["descricaoProduto"]?>">
        </div>
        <div>
            <label for="unidProduto">Unid:</label>
            <input type="text" name="unidProduto" id="unidProduto" value="<?=$dados["unidProduto"]?>">
        </div>
        <div>
            <label for="qtProduto">Quant.:</label>
            <input type="text" name="qtProduto" id="qtProduto" value="<?=$dados["qtProduto"]?>">
        </div>
        <div>
            <label for="custoProduto">Preço custo(R$):</label>
            <input type="text" name="custoProduto" id="custoProduto" value="<?=$dados["custoProduto"]?>">
        </div>
        <div>
            <label for="vendaProduto">Preço venda(R$):</label>
            <input type="text" name="vendaProduto" id="vendaProduto" value="<?=$dados["vendaProduto"]?>">
        </div>
        <div>
            <label for="margemProduto">Margem(%):</label>
            <input type="text" name="margemProduto" id="margemProduto" value="<?=$dados["margemProduto"]?>">
        </div>
        <div>
            <label for="obsProduto">Observ.:</label>
            <input type="text" name="obsProduto" id="obsProduto" value="<?=$dados["obsProduto"]?>">
        </div>
        <div>
            <input type="button" value="Foto">
        </div>
        <hr>
        <div>
            <input type="submit" value="Atualizar" name="btnAtualizar">
        </div>
        <div>
        <a href="index.php?menuop=excluir-produto&idProduto=<?=$dados["idProduto"]?>" 
            onclick="return confirm('Tem certeza que deseja excluir este produto?')">
            Excluir
        </a>
        </div>
    </form>
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