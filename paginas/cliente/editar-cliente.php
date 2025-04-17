<?php 

$idCliente = $_GET["idCliente"];
$sql = "SELECT * FROM tbclientes     WHERE idCliente={$idCliente}";
$rs = mysqli_query($conexao, $sql) or die("Erro ao recuperar dados." . mysqli_error($conexao));
$dados = mysqli_fetch_assoc($rs);
?>


<header>
    <h3>Editar Clientes</h3>
</header>
<div>

 <!-- Campos comuns -->
    <form action="index.php?menuop=atualizar-cliente" method="post">
        <div>
            <label for="idCliente">ID:</label>
            <input type="text" name="idCliente" id="idCliente" value="<?=$dados["idCliente"]?>">
        </div>
        <div>
            <label for="tipoCliente">Tipo: </label>
                <select name="tipoCliente" id="tipoCliente" required>
                    <option value="">Selecione...</option>
                    <option value="PF" <?= ($dados["tipoCliente"] == 'PF') ? 'selected' : '' ?>>Pessoa Física (PF)</option>
                    <option value="PJ" <?= ($dados["tipoCliente"] == 'PJ') ? 'selected' : '' ?>>Pessoa Jurídica (PJ)</option>
    </select>
                </select>
        </div>
        <div>
            <label for="nomeCliente">Nome:</label>
            <input type="text" name="nomeCliente" id="nomeCliente" value="<?=$dados["nomeCliente"]?>">
        </div>
        <div>
            <label for="logradCliente">Endereço:</label>
            <input type="text" name="logradCliente" id="logradCliente" value="<?=$dados["logradCliente"]?>">
        </div>
        <div>
            <label for="numLogradCliente">Número:</label>
            <input type="number " name="numLogradCliente" id="numLogradCliente" value="<?=$dados["numLogradCliente"]?>">
        </div>
        <div>
            <label for="compLogradCliente">Complemento:</label>
            <input type="text" name="compLogradCliente" id="compLogradCliente" value="<?=$dados["compLogradCliente"]?>">
        </div>
        <div>
            <label for="bairroCliente">Bairro:</label>
            <input type="text" name="bairroCliente" id="bairroCliente" value="<?=$dados["bairroCliente"]?>">
        </div>
        <div>
            <label for="cidadeCliente">Cidade:</label>
            <input type="text" name="cidadeCliente" id="cidadeCliente" value="<?=$dados["cidadeCliente"]?>">
        </div>
        <div>
            <label for="ufCliente">UF:</label>
            <input type="text" name="ufCliente" id="ufCliente" value="<?=$dados["ufCliente"]?>">
        </div>
        <div>
            <label for="cepCliente">CEP:</label>
            <input type="text" name="cepCliente" id="cepCliente" value="<?=$dados["cepCliente"]?>">
        </div>
         <!-- Campos pessoa física -->
        <div id="pf-fields" style="display: none;">
            <div>
                <label for="cpfCliente">CPF:</label>
                <input type="text" name="cpfCliente" id="cpfCliente" value="<?=$dados["cpfCliente"]?>">
            </div>
            <div>
                <label for="rgCliente">RG:</label>
                <input type="text" name="rgCliente" id="rgCliente" value="<?=$dados["rgCliente"]?>">
            </div>
        </div>
         <!-- Campos pessoa jurisica -->
        <div id="pj-fields" style="display: none;">
            <div>
                <label for="cnpjCliente">CNPJ:</label>
                <input type="text" name="cnpjCliente" id="cnpjCliente" value="<?=$dados["cnpjCliente"]?>">
            </div>
            <div>
                <label for="ieCliente">I.E.:</label>
                <input type="text" name="ieCliente" id="ieCliente" value="<?=$dados["ieCliente"]?>">
            </div>
        </div>
         <!-- Campos comuns -->
        <div>
            <label for="foneCliente">Telefone:</label>
            <input type="text" name="foneCliente" id="foneCliente" value="<?=$dados["foneCliente"]?>">
        </div>
        <div>
            <label for="celularCliente">Celular:</label>
            <input type="text" name="celularCliente" id="celularCliente" value="<?=$dados["celularCliente"]?>">
        </div>
        <div>
            <label for="emailCliente">Email:</label>
            <input type="text" name="emailCliente" id="emailCliente" value="<?=$dados["emailCliente"]?>">
        </div>
        <div>
            <label for="nascCliente">Data nascimento:</label>
            <input type="date" name="nascCliente" id="nascCliente" value="<?=$dados["nascCliente"]?>">
        </div>
        <hr>
        <div>
            <input type="submit" value="Atualizar" name="btnAtualizar">
        </div>

    </form>
</div>

<script>
    function atualizaCamposTipoCliente() {
        const tipo = document.getElementById('tipoCliente').value;
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
        atualizaCamposTipoCliente(); // chama na hora que a página carrega
    });

    document.getElementById('tipoCliente').addEventListener('change', atualizaCamposTipoCliente);
</script>
