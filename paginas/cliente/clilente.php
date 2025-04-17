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
        cepCliente,
        cpfCliente,
        rgCliente,
        cnpjCliente,
        ieCliente,
        foneCliente,
        celularCliente,
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
            <td> <?=$dados["cpfCliente"]?> </td>
            <td> <?=$dados["rgCliente"]?> </td>
            <td> <?=$dados["foneCliente"]?> </td>
            <td> <?=$dados["celularCliente"]?> </td>
            <td> <?=$dados["emailCliente"]?> </td>
            <td> <?=$dados["nascCliente"]?> </td>
        </tr>
    <?php } ?>
    </tbody>
</table>