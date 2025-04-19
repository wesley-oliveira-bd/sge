<header>
    <h3>Cadastro de Fornecedor</h3>
</header>
<div>
    <form class="p-4" action="index.php?menuop=inserir-fornecedor" method="post">
        
        <div class="row">
            <div class="col">
                <label class="form-label" for="tipoFornecedor">Tipo: </label>
                    <select class="form-control input-cinza-claro" name="tipoFornecedor" id="tipoFornecedor" required>
                        <option value="">Selecione...</option>
                        <option value="PF">Pessoa Física (PF)</option>
                        <option value="PJ">Pessoa Jurídica (PJ)</option>
                    </select>
            </div>
            <div class="col">
                <label class="form-label" for="nomeFornecedor">Nome:</label>
                <input class="form-control input-cinza-claro" type="text" name="nomeFornecedor" id="nomeFornecedor">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label class="form-label" for="logradFornecedor">Endereço:</label>
                <input class="form-control input-cinza-claro" type="text" name="logradFornecedor" id="logradFornecedor">
            </div>
            <div class="col">
                <label class="form-label" for="numLogradFornecedor">Número:</label>
                <input class="form-control input-cinza-claro" type="number" name="numLogradFornecedor" id="numLogradFornecedor">
            </div>
            <div class="col">
                <label class="form-label" for="compLogradFornecedor">Complemento:</label>
                <input class="form-control input-cinza-claro" type="text" name="compLogradFornecedor" id="compLogradFornecedor">
            </div>
            <div class="col">
                <label class="form-label" for="bairroFornecedor">Bairro:</label>
                <input class="form-control input-cinza-claro" type="text" name="bairroFornecedor" id="bairroFornecedor">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label class="form-label" for="cidadeFornecedor">Cidade:</label>
                <input class="form-control input-cinza-claro" type="text" name="cidadeFornecedor" id="cidadeFornecedor">
            </div>
            <div class="col">
                <label class="form-label" for="ufFornecedor">UF:</label>
                <input class="form-control input-cinza-claro" type="text" name="ufFornecedor" id="ufFornecedor">
            </div>
            <div class="col">
                <label class="form-label" for="cepFornecedor">CEP:</label>
                <input class="form-control input-cinza-claro" type="text" name="cepFornecedor" id="cepFornecedor">
            </div>
        </div>

        <!-- Campos pessoa física -->
        <div id="pf-fields" style="display: none;">
            <div class="row">
                <div class="col">
                    <label class="form-label" for="cpfFornecedor">CPF:</label>
                    <input class="form-control input-cinza-claro" type="text" name="cpfFornecedor" id="cpfFornecedor">
                </div>
                <div class="col">
                    <label class="form-label" for="rgFornecedor">RG:</label>
                    <input class="form-control input-cinza-claro" type="text" name="rgFornecedor" id="rgFornecedor">
                </div>
            </div>
        </div>
        <!-- Campos pessoa jurídica -->
        <div id="pj-fields" style="display: none;">
            <div class="row">
                <div class="col">
                    <label class="form-label" for="cnpjFornecedor">CNPJ:</label>
                    <input class="form-control input-cinza-claro" type="text" name="cnpjFornecedor" id="cnpjFornecedor">
                </div>
                <div class="col">
                    <label class="form-label" for="ieFornecedor">I.E.:</label>
                    <input class="form-control input-cinza-claro" type="text" name="ieFornecedor" id="ieFornecedor">
                </div>
            </div>
        </div>

        <!-- Campos comuns -->
        <div class="row">
            <div class="col">
                <label class="form-label" for="foneFornecedor">Telefone:</label>
                <input class="form-control input-cinza-claro" type="text" name="foneFornecedor" id="foneFornecedor">
            </div>
            <div class="col">
                <label class="form-label" for="celularFornecedor">Celular:</label>
                <input class="form-control input-cinza-claro" type="text" name="celularFornecedor" id="celularFornecedor">
            </div>
            <div class="col">
                <label class="form-label" for="emailFornecedor">Email:</label>
                <input class="form-control input-cinza-claro" type="text" name="emailFornecedor" id="emailFornecedor">
            </div>
        </div>
            <hr>
            <div>
                <input class="btn btn-primary" type="submit" value="Adicionar" name="btnAdcionar">
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