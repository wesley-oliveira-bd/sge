<header>
    <h3>Fornecedores</h3>
</header>

<div>
    <a class="btn btn-primary mb-2" href="index.php?menuop=cad-fornecedor">Cadastrar</a>
</div>

<table class="table table-sm table-bordered table-hover small">
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
        idFornecedor,
        tipoFornecedor,
        upper(nomeFornecedor) AS nomeFornecedor,
        upper(logradFornecedor) AS logradFornecedor,
        numLogradFornecedor,
        upper(compLogradFornecedor) AS compLogradFornecedor,
        upper(bairroFornecedor) AS bairroFornecedor,
        upper(cidadeFornecedor) AS cidadeFornecedor,
        upper(ufFornecedor) AS ufFornecedor,
        CONCAT(SUBSTRING(cepFornecedor, 1, 5), '-', SUBSTRING(cepFornecedor, 6, 3)) AS cepFornecedor,
        cpfFornecedor,
        rgFornecedor,
        cnpjFornecedor,
        ieFornecedor,
        CONCAT('(', SUBSTRING(foneFornecedor, 1, 2), ')', SUBSTRING(foneFornecedor, 3, 4), '-', SUBSTRING(foneFornecedor, 7, 4)) AS foneFornecedor,
        CONCAT('(', SUBSTRING(celularFornecedor, 1, 2), ')', SUBSTRING(celularFornecedor, 3, 5), '-', SUBSTRING(celularFornecedor, 7, 4)) AS celularFornecedor,
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
            
            <td>
            <?php
                if (!empty($dados["cpfFornecedor"])) {
                    echo $dados["cpfFornecedor"];
                } elseif (!empty($dados["cnpjFornecedor"])) {
                    echo $dados["cnpjFornecedor"];
                } else {
                    echo "-";
                }
            ?>
            </td>
            <td>
            <?php
                if (!empty($dados["rgFornecedor"])) {
                    echo $dados["rgFornecedor"];
                } elseif (!empty($dados["ieFornecedor"])) {
                    echo $dados["ieFornecedor"];
                } else {
                    echo "-";
                }
            ?>
            </td>

            <td> <?=$dados["foneFornecedor"]?> </td>
            <td class="text-nowrap"> <?=$dados["celularFornecedor"]?> </td>
            <td> <?=$dados["emailFornecedor"]?> </td>
            <td> <?=$dados["nascFornecedor"]?> </td>
            <td class="text-center"><a class="btn-outline-warning" href="index.php?menuop=editar-fornecedor&idFornecedor=<?=$dados["idFornecedor"]?>"><i class="bi bi-pencil-square"></a></td>
        </tr>
    <?php } ?>
    </tbody>
</table>