<header>
    <h3>Cadastro de Clientes</h3>
</header>
<div>

 <!-- Campos comuns -->
    <form class="p-4" action="index.php?menuop=inserir-cliente" method="post">
        
        <div class="row">
            <div class="col">
                <label class="form-label" for="tipoCliente">Tipo: </label>
                    <select class="form-control input-cinza-claro" name="tipoCliente" id="tipoCliente" required>
                        <option value="">Selecione...</option>
                        <option value="PF">Pessoa Física (PF)</option>
                        <option value="PJ">Pessoa Jurídica (PJ)</option>
                    </select>
            </div>
            <div class="col">
                <label class="form-label" for="nomeCliente">Nome:</label>
                <input class="form-control input-cinza-claro" type="text" name="nomeCliente" id="nomeCliente">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label class="form-label" for="logradCliente">Endereço:</label>
                <input class="form-control input-cinza-claro" type="text" name="logradCliente" id="logradCliente">
            </div>
            <div class="col">
                <label class="form-label" for="numLogradCliente">Número:</label>
                <input class="form-control input-cinza-claro" type="number " name="numLogradCliente" id="numLogradCliente">
            </div>
            <div class="col">
                <label class="form-label" for="compLogradCliente">Complemento:</label>
                <input class="form-control input-cinza-claro" type="text" name="compLogradCliente" id="compLogradCliente">
            </div>
            <div class="col">
                <label class="form-label" for="bairroCliente">Bairro:</label>
                <input class="form-control input-cinza-claro" type="text" name="bairroCliente" id="bairroCliente">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label class="form-label" for="cidadeCliente">Cidade:</label>
                <input class="form-control input-cinza-claro" type="text" name="cidadeCliente" id="cidadeCliente">
            </div>
            <div class="col">
                <label class="form-label" for="ufCliente">UF:</label>
                <input class="form-control input-cinza-claro" type="text" name="ufCliente" id="ufCliente">
            </div>
            <div class="col">
                <label class="form-label" for="cepCliente">CEP:</label>
                <input class="form-control input-cinza-claro" type="text" name="cepCliente" id="cepCliente">
            </div>
        </div>

         <!-- Campos pessoa física -->
        <div id="pf-fields" style="display: none;">
            <div class="row">
                <div class="col">
                    <label class="form-label" for="cpfCliente">CPF:</label>
                    <input class="form-control input-cinza-claro" type="text" name="cpfCliente" id="cpfCliente">
                </div>
                <div class="col">
                    <label class="form-label" for="rgCliente">RG:</label>
                    <input class="form-control input-cinza-claro" type="text" name="rgCliente" id="rgCliente">
                </div>
            </div>
        </div>
         <!-- Campos pessoa jurisica -->
        <div id="pj-fields" style="display: none;">
            <div class="row">
                <div class="col">
                    <label class="form-label" for="cnpjCliente">CNPJ:</label>
                    <input class="form-control input-cinza-claro" type="text" name="cnpjCliente" id="cnpjCliente">
                </div>
                <div class="col">
                    <label class="form-label" for="ieCliente">I.E.:</label>
                    <input class="form-control input-cinza-claro" type="text" name="ieCliente" id="ieCliente">
                </div>
            </div>
        </div>

         <!-- Campos comuns -->
        <div class="row">
            <div class="col">
                <label class="form-label" for="foneCliente">Telefone:</label>
                <input class="form-control input-cinza-claro" type="text" name="foneCliente" id="foneCliente">
            </div>
            <div class="col">
                <label class="form-label" for="celularCliente">Celular:</label>
                <input class="form-control input-cinza-claro" type="text" name="celularCliente" id="celularCliente">
            </div>
            <div class="col">
                <label class="form-label" for="emailCliente">Email:</label>
                <input class="form-control input-cinza-claro" type="text" name="emailCliente" id="emailCliente">
            </div>
            <div class="col">
                <label class="form-label" for="nascCliente">Data nascimento:</label>
                <input class="form-control input-cinza-claro" type="date" name="nascCliente" id="nascCliente">
            </div>
        </div>

        <hr>
        <div>
            <input class="btn btn-primary" type="submit" value="Adicionar" name="btnAdcicionar">
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