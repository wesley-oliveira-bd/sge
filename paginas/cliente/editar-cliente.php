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
    <form class="p-4" action="index.php?menuop=atualizar-cliente" method="post">
        
        <div class="row">
            <div class="col">
                <label class="form-label" for="idCliente">ID:</label>
                <input class="form-control input-cinza-claro" type="text" name="idCliente" id="idCliente" value="<?=$dados["idCliente"]?>">
            </div>
            <div class="col">
                <label class="form-label" for="tipoCliente">Tipo: </label>
                    <select class="form-control input-cinza-claro" name="tipoCliente" id="tipoCliente" required>
                        <option value="">Selecione...</option>
                        <option value="PF" <?= ($dados["tipoCliente"] == 'PF') ? 'selected' : '' ?>>Pessoa Física (PF)</option>
                        <option value="PJ" <?= ($dados["tipoCliente"] == 'PJ') ? 'selected' : '' ?>>Pessoa Jurídica (PJ)</option>
                    </select>
            </div>
            <div class="col">
                <label class="form-label" for="nomeCliente">Nome:</label>
                <input class="form-control input-cinza-claro" type="text" name="nomeCliente" id="nomeCliente" value="<?=$dados["nomeCliente"]?>">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label class="form-label" for="logradCliente">Endereço:</label>
                <input class="form-control input-cinza-claro" type="text" name="logradCliente" id="logradCliente" value="<?=$dados["logradCliente"]?>">
            </div>
            <div class="col">
                <label class="form-label" for="numLogradCliente">Número:</label>
                <input class="form-control input-cinza-claro" type="number " name="numLogradCliente" id="numLogradCliente" value="<?=$dados["numLogradCliente"]?>">
            </div>
            <div class="col">
                <label class="form-label" for="compLogradCliente">Complemento:</label>
                <input class="form-control input-cinza-claro" type="text" name="compLogradCliente" id="compLogradCliente" value="<?=$dados["compLogradCliente"]?>">
            </div>
            <div class="col">
                <label class="form-label" for="bairroCliente">Bairro:</label>
                <input class="form-control input-cinza-claro" type="text" name="bairroCliente" id="bairroCliente" value="<?=$dados["bairroCliente"]?>">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label class="form-label" for="cidadeCliente">Cidade:</label>
                <input class="form-control input-cinza-claro" type="text" name="cidadeCliente" id="cidadeCliente" value="<?=$dados["cidadeCliente"]?>">
            </div>
            <div class="col">
                <label class="form-label" for="ufCliente">UF:</label>
                <input class="form-control input-cinza-claro" type="text" name="ufCliente" id="ufCliente" value="<?=$dados["ufCliente"]?>">
            </div>
            <div class="col">
                <label class="form-label" for="cepCliente">CEP:</label>
                <input class="form-control input-cinza-claro" type="text" name="cepCliente" id="cepCliente" value="<?=$dados["cepCliente"]?>">
            </div>
        </div>

         <!-- Campos pessoa física -->
        <div id="pf-fields" style="display: none;">
            <div class="row">
                <div class="col">
                    <label class="form-label" for="cpfCliente">CPF:</label>
                    <input class="form-control input-cinza-claro" type="text" name="cpfCliente" id="cpfCliente" value="<?=$dados["cpfCliente"]?>">
                </div>
                <div class="col">
                    <label class="form-label" for="rgCliente">RG:</label>
                    <input class="form-control input-cinza-claro" type="text" name="rgCliente" id="rgCliente" value="<?=$dados["rgCliente"]?>">
                </div>
            </div>
        </div>
         <!-- Campos pessoa jurisica -->
        <div id="pj-fields" style="display: none;">
            <div class="row">
                <div class="col">
                    <label class="form-label" for="cnpjCliente">CNPJ:</label>
                    <input class="form-control input-cinza-claro" type="text" name="cnpjCliente" id="cnpjCliente" value="<?=$dados["cnpjCliente"]?>">
                </div>
                <div class="col">
                    <label class="form-label" for="ieCliente">I.E.:</label>
                    <input class="form-control input-cinza-claro" type="text" name="ieCliente" id="ieCliente" value="<?=$dados["ieCliente"]?>">
                </div>
            </div>
        </div>
         <!-- Campos comuns -->
        <div class="row">
            <div class="col">
                <label class="form-label" for="foneCliente">Telefone:</label>
                <input class="form-control input-cinza-claro" type="text" name="foneCliente" id="foneCliente" value="<?=$dados["foneCliente"]?>">
            </div>
            <div class="col">
                <label class="form-label" for="celularCliente">Celular:</label>
                <input class="form-control input-cinza-claro" type="text" name="celularCliente" id="celularCliente" value="<?=$dados["celularCliente"]?>">
            </div>
            <div class="col">
                <label class="form-label" for="emailCliente">Email:</label>
                <input class="form-control input-cinza-claro" type="text" name="emailCliente" id="emailCliente" value="<?=$dados["emailCliente"]?>">
            </div>
            <div class="col">
                <label class="form-label" for="nascCliente">Data nascimento:</label>
                <input class="form-control input-cinza-claro" type="date" name="nascCliente" id="nascCliente" value="<?=$dados["nascCliente"]?>">
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <input class="btn btn-primary" type="submit" value="Atualizar" name="btnAtualizar">
            </div>
            <div class="col">
            <a class="btn btn-danger" href="index.php?menuop=excluir-cliente&idCliente=<?=$dados["idCliente"]?>"
                onclick="return confirm('Tem certeza que deseja excluir este cliente?')">
                Excluir
            </a>
            </div>
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
