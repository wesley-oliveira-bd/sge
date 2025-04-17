<header>
    <h3>Fornecedores</h3>
</header>

<div>
    <a href="index.php?menuop=cad-fornecedor">Cadastrar</a>
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
        idFornecedor,
        tipoFornecedor,
        upper(nomeFornecedor) AS nomeFornecedor,
        upper(logradFornecedor) AS logradFornecedor,
        numLogradFornecedor,
        upper(compLogradFornecedor) AS compLogradFornecedor,
        upper(bairroFornecedor) AS bairroFornecedor,
        upper(cidadeFornecedor) AS cidadeFornecedor,
        upper(ufFornecedor) AS ufFornecedor,
        cepFornecedor,
        cpfFornecedor,
        rgFornecedor,
        cnpjFornecedor,
        ieFornecedor,
        foneFornecedor,
        celularFornecedor,
        lower(emailFornecedor) AS emailFornecedor,
        DATE_FORMAT(nascFornecedor, '%d/%m/%Y') AS nascFornecedor
         FROM tbfornecedores";
        $rs = mysqli_query($conexao, $sql) or dir("Erro ao executar a consulta " . mysqli_error($conexao));
        while ($dados = mysqli_fetch_assoc($rs)) {
            
        
    ?>
        <tr>
            <td> <?=$dados["idFornecedor"]?> </td>
            <td> <?=$dados["tipoFornecedor"]?> </td>
            <td> <?=$dados["nomeFornecedor"]?> </td>
            <td> <?=$dados["logradFornecedor"]?> </td>
            <td> <?=$dados["numLogradFornecedor"]?> </td>
            <td> <?=$dados["compLogradFornecedor"]?> </td>
            <td> <?=$dados["bairroFornecedor"]?> </td>
            <td> <?=$dados["cidadeFornecedor"]?> </td>
            <td> <?=$dados["ufFornecedor"]?> </td>
            <td> <?=$dados["cepFornecedor"]?> </td>
            <td> <?=$dados["cpfFornecedor"]?> </td>
            <td> <?=$dados["rgFornecedor"]?> </td>
            <td> <?=$dados["foneFornecedor"]?> </td>
            <td> <?=$dados["celularFornecedor"]?> </td>
            <td> <?=$dados["emailFornecedor"]?> </td>
            <td> <?=$dados["nascFornecedor"]?> </td>
        </tr>
    <?php } ?>
    </tbody>
</table>