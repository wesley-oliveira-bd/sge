<header>
    <h3>Produtos</h3>
</header>

<div>
<a href="index.php?menuop=cad-produtos">Cadastrar</a>
</div>

<table border="1">
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
            
        FROM tbprodutos";
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
            <td> <?=$dados["fotoProduto"]?> </td>
            <td> <?=$dados["obsProduto"]?> </td>
            <td> <a href="index.php?menuop=editar-produto&idProduto=<?=$dados["idProduto"]?>">Editar</a> </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<div>
    <img src="./paginas/produto/fotos-produtos/sem_imagem.png" alt="foto sem imagem">
</div>