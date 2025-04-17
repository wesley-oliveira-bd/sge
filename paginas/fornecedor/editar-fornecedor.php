<?php 

$idFornecedor = $_GET["idFornecedor"];
$sql = "SELECT * FROM tbfornecedores     WHERE idFornecedor={$idFornecedor}";
$rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar dados." . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);
?>


<header>
    <h3>Editar Fornecedores</h3>
</header>
<div>

 <!-- Campos comuns -->
    <form action="index.php?menuop=atualizar-fornecedor" method="post">
        <div>
            <label for="idFornecedor">ID:</label>
            <input type="text" name="idFornecedor" id="idFornecedor" value="<?=$dados["idFornecedor"]?>">
        </div>
        <div>
            <label for="tipoFornecedor">Tipo: </label>
                <select name="tipoFornecedor" id="tipoFornecedor" required>
                    <option value="">Selecione...</option>
                    <option value="PF" <?= ($dados["tipoFornecedor"] == 'PF') ? 'selected' : '' ?>>Pessoa Física (PF)</option>
                    <option value="PJ" <?= ($dados["tipoFornecedor"] == 'PJ') ? 'selected' : '' ?>>Pessoa Jurídica (PJ)</option>
    </select>
                </select>
        </div>
        <div>
            <label for="nomeFornecedor">Nome:</label>
            <input type="text" name="nomeFornecedor" id="nomeFornecedor" value="<?=$dados["nomeFornecedor"]?>">
        </div>
        <div>
            <label for="logradFornecedor">Endereço:</label>
            <input type="text" name="logradFornecedor" id="logradFornecedor" value="<?=$dados["logradFornecedor"]?>">
        </div>
        <div>
            <label for="numLogradFornecedor">Número:</label>
            <input type="number " name="numLogradFornecedor" id="numLogradFornecedor" value="<?=$dados["numLogradFornecedor"]?>">
        </div>
        <div>
            <label for="compLogradFornecedor">Complemento:</label>
            <input type="text" name="compLogradFornecedor" id="compLogradFornecedor" value="<?=$dados["compLogradFornecedor"]?>">
        </div>
        <div>
            <label for="bairroFornecedor">Bairro:</label>
            <input type="text" name="bairroFornecedor" id="bairroFornecedor" value="<?=$dados["bairroFornecedor"]?>">
        </div>
        <div>
            <label for="cidadeFornecedor">Cidade:</label>
            <input type="text" name="cidadeFornecedor" id="cidadeFornecedor" value="<?=$dados["cidadeFornecedor"]?>">
        </div>
        <div>
            <label for="ufFornecedor">UF:</label>
            <input type="text" name="ufFornecedor" id="ufFornecedor" value="<?=$dados["ufFornecedor"]?>">
        </div>
        <div>
            <label for="cepFornecedor">CEP:</label>
            <input type="text" name="cepFornecedor" id="cepFornecedor" value="<?=$dados["cepFornecedor"]?>">
        </div>
         <!-- Campos pessoa física -->
        <div id="pf-fields" style="display: none;">
            <div>
                <label for="cpfFornecedor">CPF:</label>
                <input type="text" name="cpfFornecedor" id="cpfFornecedor" value="<?=$dados["cpfFornecedor"]?>">
            </div>
            <div>
                <label for="rgFornecedor">RG:</label>
                <input type="text" name="rgFornecedor" id="rgFornecedor" value="<?=$dados["rgFornecedor"]?>">
            </div>
        </div>
         <!-- Campos pessoa jurisica -->
        <div id="pj-fields" style="display: none;">
            <div>
                <label for="cnpjFornecedor">CNPJ:</label>
                <input type="text" name="cnpjFornecedor" id="cnpjFornecedor" value="<?=$dados["cnpjFornecedor"]?>">
            </div>
            <div>
                <label for="ieFornecedor">I.E.:</label>
                <input type="text" name="ieFornecedor" id="ieFornecedor" value="<?=$dados["ieFornecedor"]?>">
            </div>
        </div>
         <!-- Campos comuns -->
        <div>
            <label for="foneFornecedor">Telefone:</label>
            <input type="text" name="foneFornecedor" id="foneFornecedor" value="<?=$dados["foneFornecedor"]?>">
        </div>
        <div>
            <label for="celularFornecedor">Celular:</label>
            <input type="text" name="celularFornecedor" id="celularFornecedor" value="<?=$dados["celularFornecedor"]?>">
        </div>
        <div>
            <label for="emailFornecedor">Email:</label>
            <input type="text" name="emailFornecedor" id="emailFornecedor" value="<?=$dados["emailFornecedor"]?>">
        </div>
        <div>
            <label for="nascFornecedor">Data nascimento:</label>
            <input type="date" name="nascFornecedor" id="nascFornecedor" value="<?=$dados["nascFornecedor"]?>">
        </div>
        <hr>
        <div>
            <input type="submit" value="Atualizar" name="btnAtualizar">
        </div>

    </form>
</div>

<script>
    function atualizaCamposTipoFornecedor() {
        const tipo = document.getElementById('tipoFornecedor').value;
        const pfFields = document.getElementById('pf-fields');
        const pjFields = document.getElementById('pj-fields');

        if (tipo === 'PF') {
            pfFields.style.display = 'block';
            pjFields.style.display = 'none';
        } else if (tipo === 'PJ') {
            pfFields.style.display = 'none';
            pjFields.style.display = 'block';
        } else {
            pfFields.style.display = 'none';
            pjFields.style.display = 'none';
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        atualizaCamposTipoFornecedor(); // chama na hora que a página carrega
    });

    document.getElementById('tipoFornecedor').addEventListener('change', atualizaCamposTipoFornecedor);
</script>