<?php 

$idProduto = $_GET["idProduto"];
$sql = "SELECT * FROM tbprodutos WHERE idproduto={$idProduto}";
$rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar dados." . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);
?>


<header><h3>Editar Produtos</h3></header>

<div class="row">
    <div class="col-6">
        <form class="p-4" action="index.php?menuop=atualizar-produto" method="post">
            <div class="row">
                <div class="col-2">
                    <label class="form-label" for="idProduto">ID:</label>
                    <input class="form-control input-cinza-claro"  type="text" name="idProduto" id="idProduto" value="<?=$dados["idProduto"]?>">
                </div>
                <div class="col">
                    <label class="form-label" for="refProduto">Referência:</label>
                    <input class="form-control input-cinza-claro" type="text" name="refProduto" id="refProduto" value="<?=$dados["refProduto"]?>">
                </div>
            </div>
            <div>
                <label class="form-label" for="descricaoProduto">Descrição:</label>
                <input class="form-control input-cinza-claro" type="text" name="descricaoProduto" id="descricaoProduto" value="<?=$dados["descricaoProduto"]?>">
            </div>
            <div class="row">
                <div  class="col-2">
                    <label class="form-label" for="unidProduto">Unid:</label>
                    <input class="form-control input-cinza-claro" type="text" name="unidProduto" id="unidProduto" value="<?=$dados["unidProduto"]?>">
                </div>
                <div class="col-2">
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
                <div class="col-2">
                    <label class="form-label" for="margemProduto">Margem(%):</label>
                    <input class="form-control input-cinza-claro" type="text" name="margemProduto" id="margemProduto" value="<?=$dados["margemProduto"]?>">
                </div>
            </div>
            <div>
                <label class="form-label" for="obsProduto">Observ.:</label>
                <input class="form-control input-cinza-claro" type="text" name="obsProduto" id="obsProduto" value="<?=$dados["obsProduto"]?>">
            </div>
            <div class="row mt-2">
                <div class="col">
                    <input class="btn btn-primary mb-2" type="submit" value="Atualizar" name="btnAtualizar">
                </div>
                <div class="col">
                    <a class="btn btn-danger mb-2" href="index.php?menuop=excluir-produto&idProduto=<?=$dados["idProduto"]?>"
                        onclick="return confirm('Tem certeza que deseja excluir este produto?')"><i class="bi bi-trash3"></i>
                        Excluir
                    </a>
                </div>
                <div class="col">
                    <a class="btn btn-secondary" href="index.php?menuop=duplicar-produto&idProduto=<?=$dados["idProduto"]?>"
                        onclick="return confirm('Tem certeza que deseja duplicar este produto?')"><i class="bi bi-copy"></i>
                        Duplicar
                    </a>
                </div>
            </div>
        </form>
    </div>
    

    <div class="col-6">
        <div>
            <?php 
                if($dados["fotoProduto"]=="" || !file_exists('./paginas/produto/fotos-produtos/'. $dados["fotoProduto"])){
                    $idFoto = 'sem_imagem.jpg';
                } else {
                    $idFoto = $dados["idProduto"];
                }
            ?>
           <img class="img-fluid img-thumbnail" id="fotoProduto" width="400" src="./paginas/produto/fotos-produtos/<?=$dados["fotoProduto"]?>" alt="">

        </div>
        <div>
            <button type="button" class="btn brn-secondary" id="btnEditarFoto"><i class="bi bi-camera"></i> Imagem</button>
        </div>

        <div id="editar-foto">
            <form id="formUploadFoto" class="p-4 " action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="idFoto" value="<?=$idProduto?>">
                <label class="form-label" for="arquivo">Selecione uma imagem</label>
                <div class="input-group">
                    <input class="form-control input-cinza-claro" type="file" name="arquivo" id="arquivo">
                    <input id="btnEnviarFoto" class="btn btn-secondary" type="button" value="Enviar">
                </div>
            
            </form>
            <div id="mensagem" class="mt-2 alert alert-success"></div>
            <div id="preloader" class="progress" role="progressbar" aria-label="Danger example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                <div id="barra" class="progress-bar bg-danger" style="width: 100%"></div>
            </div>
        </div>
    </div>
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