<header>
    <h3>Cadastro de Clientes</h3>
</header>
<div>

 <!-- Campos comuns -->
    <form action="index.php?menuop=inserir-cliente" method="post">
        <div>
            <label for="tipoCliente">Tipo: </label>
                <select name="tipoCliente" id="tipoCliente" required>
                    <option value="">Selecione...</option>
                    <option value="PF">Pessoa Física (PF)</option>
                    <option value="PJ">Pessoa Jurídica (PJ)</option>
                </select>
        </div>
        <div>
            <label for="nomeCliente">Nome:</label>
            <input type="text" name="nomeCliente" id="nomeCliente">
        </div>
        <div>
            <label for="logradCliente">Endereço:</label>
            <input type="text" name="logradCliente" id="logradCliente">
        </div>
        <div>
            <label for="numLogradCliente">Número:</label>
            <input type="number " name="numLogradCliente" id="numLogradCliente">
        </div>
        <div>
            <label for="compLogradCliente">Complemento:</label>
            <input type="text" name="compLogradCliente" id="compLogradCliente">
        </div>
        <div>
            <label for="bairroCliente">Bairro:</label>
            <input type="text" name="bairroCliente" id="bairroCliente">
        </div>
        <div>
            <label for="cidadeCliente">Cidade:</label>
            <input type="text" name="cidadeCliente" id="cidadeCliente">
        </div>
        <div>
            <label for="ufCliente">UF:</label>
            <input type="text" name="ufCliente" id="ufCliente">
        </div>
        <div>
            <label for="cepCliente">CEP:</label>
            <input type="text" name="cepCliente" id="cepCliente">
        </div>
         <!-- Campos pessoa física -->
        <div id="pf-fields" style="display: none;">
            <div>
                <label for="cpfCliente">CPF:</label>
                <input type="text" name="cpfCliente" id="cpfCliente">
            </div>
            <div>
                <label for="rgCliente">RG:</label>
                <input type="text" name="rgCliente" id="rgCliente">
            </div>
        </div>
         <!-- Campos pessoa jurisica -->
        <div id="pj-fields" style="display: none;">
            <div>
                <label for="cnpjCliente">CNPJ:</label>
                <input type="text" name="cnpjCliente" id="cnpjCliente">
            </div>
            <div>
                <label for="ieCliente">I.E.:</label>
                <input type="text" name="ieCliente" id="ieCliente">
            </div>
        </div>
         <!-- Campos comuns -->
        <div>
            <label for="foneCliente">Telefone:</label>
            <input type="text" name="foneCliente" id="foneCliente">
        </div>
        <div>
            <label for="celularCliente">Celular:</label>
            <input type="text" name="celularCliente" id="celularCliente">
        </div>
        <div>
            <label for="emailCliente">Email:</label>
            <input type="text" name="emailCliente" id="emailCliente">
        </div>
        <div>
            <label for="nascCliente">Data nascimento:</label>
            <input type="date" name="nascCliente" id="nascCliente">
        </div>
        <hr>
        <div>
            <input type="submit" value="Adicionar" name="btnAdcicionar">
        </div>

    </form>
</div>

<script>
    document.getElementById('tipoCliente').addEventListener('change', function () {
        const pfFields = document.getElementById('pf-fields');
        const pjFields = document.getElementById('pj-fields');

        if (this.value === 'PF') {
            pfFields.style.display = 'block';
            pjFields.style.display = 'none';
        } else if (this.value === 'PJ') {
            pfFields.style.display = 'none';
            pjFields.style.display = 'block';
        } else {
            pfFields.style.display = 'none';
            pjFields.style.display = 'none';
        }
    });
</script>