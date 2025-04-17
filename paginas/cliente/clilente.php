<header>
    <h3>Clientes</h3>
</header>

<div>
    <a href="index.php?menuop=cad-cliente">Cadastrar</a>
</div>

<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tipo</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>N.</th>
            <th>Compl.</th>
            <th>Bairro</th>
            <th>Cidade</th>
            <th>UF</th>
            <th>CEP</th>
            <th>CPF/CNPJ</th>
            <th>RG/IE</th>
            <th>Telefone</th>
            <th>Celular</th>
            <th>Email</th>
            <th>Nascimento</th>
            <th>Editar</th>
        </tr>
    </thead>
    <tbody>
    <?php 
        $sql = "SELECT 
        idCliente,
        tipoCliente,
        upper(nomeCliente) AS nomeCliente,
        upper(logradCliente) AS logradCliente,
        numLogradCliente,
        upper(compLogradCliente) AS compLogradCliente,
        upper(bairroCliente) AS bairroCliente,
        upper(cidadeCliente) AS cidadeCliente,
        upper(ufCliente) AS ufCliente,
        CONCAT(SUBSTRING(cepCliente, 1, 5), '-', SUBSTRING(cepCliente, 6, 3)) AS cepCliente,
        cpfCliente,
        rgCliente,
        cnpjCliente,
        ieCliente,
        CONCAT('(', SUBSTRING(foneCliente, 1, 2), ')', SUBSTRING(foneCliente, 3, 4), '-', SUBSTRING(foneCliente, 7, 4)) AS foneCliente,
        CONCAT('(', SUBSTRING(celularCliente, 1, 2), ')', SUBSTRING(celularCliente, 3, 5), '-', SUBSTRING(celularCliente, 7, 4)) AS celularCliente,
        lower(emailCliente) AS emailCliente,
        DATE_FORMAT(nascCliente, '%d/%m/%Y') as nascCliente
        
        FROM tbclientes";
        $rs = mysqli_query($conexao, $sql) or dir("Erro ao executar a consulta " . mysqli_error($conexao));
        while ($dados = mysqli_fetch_assoc($rs)) {
            
        
    ?>
        <tr>
            <td> <?=$dados["idCliente"]?> </td>
            <td> <?=$dados["tipoCliente"]?> </td>
            <td> <?=$dados["nomeCliente"]?> </td>
            <td> <?=$dados["logradCliente"]?> </td>
            <td> <?=$dados["numLogradCliente"]?> </td>
            <td> <?=$dados["compLogradCliente"]?> </td>
            <td> <?=$dados["bairroCliente"]?> </td>
            <td> <?=$dados["cidadeCliente"]?> </td>
            <td> <?=$dados["ufCliente"]?> </td>
            <td> <?=$dados["cepCliente"]?> </td>

            <td>
            <?php
                if (!empty($dados["cpfCliente"])) {
                    echo $dados["cpfCliente"];
                } elseif (!empty($dados["cnpjCliente"])) {
                    echo $dados["cnpjCliente"];
                } else {
                    echo "-";
                }
            ?>
            </td>
            <td>
            <?php
                if (!empty($dados["rgCliente"])) {
                    echo $dados["rgCliente"];
                } elseif (!empty($dados["ieCliente"])) {
                    echo $dados["ieCliente"];
                } else {
                    echo "-";
                }
            ?>
            </td>
            
            <td> <?=$dados["foneCliente"]?> </td>
            <td> <?=$dados["celularCliente"]?> </td>
            <td> <?=$dados["emailCliente"]?> </td>
            <td> <?=$dados["nascCliente"]?> </td>
            <td> <a href="index.php?menuop=editar-cliente&idCliente=<?=$dados["idCliente"]?>">Editar</a> </td>
        </tr>
    <?php } ?>
    </tbody>
</table>