<?php 

$idProduto = $_GET["idProduto"];
$sql = "SELECT * FROM tbprodutos WHERE idproduto={$idProduto}";
$rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar dados." . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);
?>


<header><h3>Editar Produtos</h3></header>

<div>
    <form class="p-4" action="index.php?menuop=inserir-produto" method="post">
        <div class="row">
            <div class="col">
                <label class="form-label" for="refProduto">Referência:</label>
                <input class="form-control input-cinza-claro" type="text" name="refProduto" id="refProduto" value="<?=$dados["refProduto"]?>">
            </div>
            <div class="col">
                <label class="form-label" for="descricaoProduto">Descrição:</label>
                <input class="form-control input-cinza-claro" type="text" name="descricaoProduto" id="descricaoProduto" value="<?=$dados["descricaoProduto"]?>">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label class="form-label" for="unidProduto">Unid:</label>
                <input class="form-control input-cinza-claro" type="text" name="unidProduto" id="unidProduto" value="<?=$dados["unidProduto"]?>">
            </div>
            <div class="col">
                <label class="form-label" for="qtProduto">Quant.:</label>
                <input class="form-control input-cinza-claro" type="text" name="qtProduto" id="qtProduto" value="<?=$dados["qtProduto"]?>">
            </div>
            <div class="col">
                <label class="form-label" for="custoProduto">Preço custo(R$):</label>
                <input class="form-control input-cinza-claro" type="text" name="custoProduto" id="custoProduto" value="<?=$dados["custoProduto"]?>">
            </div>
            <div class="col">
                <label class="form-label" for="vendaProduto">Preço venda(R$):</label>
                <input class="form-control input-cinza-claro" type="text" name="vendaProduto" id="vendaProduto" value="<?=$dados["vendaProduto"]?>">
            </div>
            <div class="col">
                <label class="form-label" for="margemProduto">Margem(%):</label>
                <input class="form-control input-cinza-claro" type="text" name="margemProduto" id="margemProduto" value="<?=$dados["margemProduto"]?>">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label class="form-label" for="obsProduto">Observ.:</label>
                <input class="form-control input-cinza-claro" type="text" name="obsProduto" id="obsProduto" value="<?=$dados["obsProduto"]?>">
            </div>
        </div>

        <div>
            <input class="btn btn-secondary mt-2" type="button" value="Foto">
        </div>

        <hr>
        <div>
            <input class="btn btn-primary mb-2" type="submit" value="Adicionar" name="btnAdicionar">
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