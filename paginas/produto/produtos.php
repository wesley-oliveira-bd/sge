<header>
    <h3>Produtos</h3>
</header>


    <div class="row">
        <div class="col">
            <a class="btn btn-primary mb-2" href="index.php?menuop=cad-produtos">Cadastrar</a>
        </div>
        <div class="col">
                <form action="index.php?menuop=produtos" method="post">
                    <div class="row">
                        <div class="col"><input class="form-control input-cinza-claro" type="text" name="produtosPesquisa" id="produtosPesquisa"></div>
                        <div class="col"><input class="btn btn-primary mb-2" type="submit" value="Pesquisar"></div>
                    </div>
                </form>
        </div>
    </div>


<table class="table table-sm table-bordered table-hover small">
    <thead>
        <tr>
            <th>ID</th>
            <th>Referência</th>
            <th>Descrição</th>
            <th>Unid.</th>
            <th>Qt</th>
            <th>Custo</th>
            <th>Venda</th>
            <th>Margem</th>
            <th>Imagem</th>
            <th>Observ.</th>
            <th>Editar</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $produtosPesquisa = (isset($_POST["produtosPesquisa"]))?$_POST["produtosPesquisa"]:"";

        $sql = "SELECT 
        idProduto,
        upper(refProduto) AS refProduto,
        upper(descricaoProduto) AS descricaoProduto,
        upper(unidProduto) AS unidProduto,
        qtProduto,
        CONCAT('R$ ', FORMAT(custoProduto, 2, 'pt_BR')) AS custoProduto ,
        CONCAT('R$ ', FORMAT(vendaProduto, 2, 'pt_BR')) AS vendaProduto ,
        CONCAT(FORMAT(margemProduto, 2), ' %') AS margemProduto,
        fotoProduto,
        upper(obsProduto) AS obsProduto
            
        FROM tbprodutos 
        WHERE 
        idProduto='{$produtosPesquisa}' OR 
        descricaoProduto LIKE '%{$produtosPesquisa}%'
        ";

        $rs = mysqli_query($conexao, $sql) or dir("Erro ao executar a consulta " . mysqli_error($conexao));
        while ($dados = mysqli_fetch_assoc($rs)) {
            
        
    ?>
        <tr>
            <td> <?=$dados["idProduto"]?> </td>
            <td> <?=$dados["refProduto"]?> </td>
            <td> <?=$dados["descricaoProduto"]?> </td>
            <td> <?=$dados["unidProduto"]?> </td>
            <td> <?=$dados["qtProduto"]?> </td>
            <td> <?=$dados["custoProduto"]?> </td>
            <td> <?=$dados["vendaProduto"]?> </td>
            <td> <?=$dados["margemProduto"]?> </td>
            <td class="text-center"> <a class="btn-outline-primary" href=""> <i class="bi bi-camera"></i></td>
            <td> <?=$dados["obsProduto"]?> </td>
            <td class="text-center"> <a class="btn-outline-warning" href="index.php?menuop=editar-produto&idProduto=<?=$dados["idProduto"]?>"><i class="bi bi-pencil-square"></i></a> </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

