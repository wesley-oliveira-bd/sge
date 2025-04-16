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
            <th>Custo</th>
            <th>Venda</th>
            <th>Margem</th>
            <th>Imagem</th>
            <th>Observ.</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        $sql = "SELECT * FROM tbprodutos";
        $rs = mysqli_query($conexao, $sql) or dir("Erro ao executar a consulta " . mysqli_error($conexao));
        while ($dados = mysqli_fetch_assoc($rs)) {
            
        
    ?>
        <tr>
            <td> <?=$dados["idProduto"]?> </td>
            <td> <?=$dados["refProduto"]?> </td>
            <td> <?=$dados["descricaoProduto"]?> </td>
            <td> <?=$dados["unidProduto"]?> </td>
            <td> <?=$dados["custoProduto"]?> </td>
            <td> <?=$dados["vendaProduto"]?> </td>
            <td> <?=$dados["margemProduto"]?> </td>
            <td> <?=$dados["fotoProduto"]?> </td>
            <td> <?=$dados["obsProduto"]?> </td>
        </tr>
    <?php } ?>
    </tbody>
</table>