<header>
    <h3>Cadastro de Fornecedor</h3>
</header>
<div>
    <form action="index.php?menuop=inserir-fornecedor" method="post">
        <div>
            <label for="tipoFornecedor">Tipo: </label>
                <select name="tipoFornecedor" id="tipoFornecedor" required>
                    <option value="">Selecione...</option>
                    <option value="PF">Pessoa Física (PF)</option>
                    <option value="PJ">Pessoa Jurídica (PJ)</option>
                </select>
        </div>
        <div>
            <label for="nomeFornecedor">Nome:</label>
            <input type="text" name="nomeFornecedor" id="nomeFornecedor">
        </div>
        <div>
            <label for="logradFornecedor">Endereço:</label>
            <input type="text" name="logradFornecedor" id="logradFornecedor">
        </div>
        <div>
            <label for="numLogradFornecedor">Número:</label>
            <input type="number" name="numLogradFornecedor" id="numLogradFornecedor">
        </div>
        <div>
            <label for="compLogradFornecedor">Complemento:</label>
            <input type="text" name="compLogradFornecedor" id="compLogradFornecedor">
        </div>
        <div>
            <label for="bairroFornecedor">Bairro:</label>
            <input type="text" name="bairroFornecedor" id="bairroFornecedor">
        </div>
        <div>
            <label for="cidadeFornecedor">Cidade:</label>
            <input type="text" name="cidadeFornecedor" id="cidadeFornecedor">
        </div>
        <div>
            <label for="ufFornecedor">UF:</label>
            <input type="text" name="ufFornecedor" id="ufFornecedor">
        </div>
        <div>
            <label for="cepFornecedor">CEP:</label>
            <input type="text" name="cepFornecedor" id="cepFornecedor">
        </div>
        <!-- Campos pessoa física -->
        <div id="pf-fields" style="display: none;">
            <div>
                <label for="cpfFornecedor">CPF:</label>
                <input type="text" name="cpfFornecedor" id="cpfFornecedor">
            </div>
            <div>
                <label for="rgFornecedor">RG:</label>
                <input type="text" name="rgFornecedor" id="rgFornecedor">
            </div>
        </div>
        <!-- Campos pessoa jurídica -->
        <div id="pj-fields" style="display: none;">
            <div>
                <label for="cnpjFornecedor">CNPJ:</label>
                <input type="text" name="cnpjFornecedor" id="cnpjFornecedor">
            </div>
            <div>
                <label for="ieFornecedor">I.E.:</label>
                <input type="text" name="ieFornecedor" id="ieFornecedor">
            </div>
        </div>
        <!-- Campos comuns -->
        <div>
            <label for="foneFornecedor">Telefone:</label>
            <input type="text" name="foneFornecedor" id="foneFornecedor">
        </div>
        <div>
            <label for="celularFornecedor">Celular:</label>
            <input type="text" name="celularFornecedor" id="celularFornecedor">
        </div>
        <div>
            <label for="emailFornecedor">Email:</label>
            <input type="text" name="emailFornecedor" id="emailFornecedor">
        </div>
        <hr>
        <div>
            <input type="submit" value="Adicionar" name="btnAdcionar">
        </div>
    </form>
</div>

<script>
    document.getElementById('tipoFornecedor').addEventListener('change', function () {
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