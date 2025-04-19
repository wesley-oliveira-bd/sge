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
    <form class="p-4" action="index.php?menuop=atualizar-fornecedor" method="post">
        <div class="row">
            <div class="col">
                <label class="form-label" for="idFornecedor">ID:</label>
                <input class="form-control input-cinza-claro" type="text" name="idFornecedor" id="idFornecedor" value="<?=$dados["idFornecedor"]?>">
            </div>
            <div class="col">
                <label  class="form-label" for="tipoFornecedor">Tipo: </label>
                    <select class="form-control input-cinza-claro" name="tipoFornecedor" id="tipoFornecedor" required>
                        <option value="">Selecione...</option>
                        <option value="PF" <?= ($dados["tipoFornecedor"] == 'PF') ? 'selected' : '' ?>>Pessoa Física (PF)</option>
                        <option value="PJ" <?= ($dados["tipoFornecedor"] == 'PJ') ? 'selected' : '' ?>>Pessoa Jurídica (PJ)</option>
                </select>
                    </select>
            </div>
            <div class="col">
                <label class="form-label" for="nomeFornecedor">Nome:</label>
                <input class="form-control input-cinza-claro" type="text" name="nomeFornecedor" id="nomeFornecedor" value="<?=$dados["nomeFornecedor"]?>">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label class="form-label" for="logradFornecedor">Endereço:</label>
                <input class="form-control input-cinza-claro" type="text" name="logradFornecedor" id="logradFornecedor" value="<?=$dados["logradFornecedor"]?>">
            </div>
            <div class="col">
                <label class="form-label" for="numLogradFornecedor">Número:</label>
                <input class="form-control input-cinza-claro" type="number " name="numLogradFornecedor" id="numLogradFornecedor" value="<?=$dados["numLogradFornecedor"]?>">
            </div>
            <div class="col">
                <label class="form-label" for="compLogradFornecedor">Complemento:</label>
                <input class="form-control input-cinza-claro" type="text" name="compLogradFornecedor" id="compLogradFornecedor" value="<?=$dados["compLogradFornecedor"]?>">
            </div>
            <div class="col">
                <label class="form-label" for="bairroFornecedor">Bairro:</label>
                <input class="form-control input-cinza-claro" type="text" name="bairroFornecedor" id="bairroFornecedor" value="<?=$dados["bairroFornecedor"]?>">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label class="form-label" for="cidadeFornecedor">Cidade:</label>
                <input class="form-control input-cinza-claro" type="text" name="cidadeFornecedor" id="cidadeFornecedor" value="<?=$dados["cidadeFornecedor"]?>">
            </div>
            <div class="col">
                <label class="form-label" for="ufFornecedor">UF:</label>
                <input class="form-control input-cinza-claro" type="text" name="ufFornecedor" id="ufFornecedor" value="<?=$dados["ufFornecedor"]?>">
            </div>
            <div class="col">
                <label class="form-label" for="cepFornecedor">CEP:</label>
                <input class="form-control input-cinza-claro" type="text" name="cepFornecedor" id="cepFornecedor" value="<?=$dados["cepFornecedor"]?>">
            </div>
        </div>

         
             <!-- Campos pessoa física -->
            
                <div id="pf-fields" style="display: none;">
                    <div class="row">
                        <div class="col">
                            <label class="form-label" for="cpfFornecedor">CPF:</label>
                            <input class="form-control input-cinza-claro" type="text" name="cpfFornecedor" id="cpfFornecedor" value="<?=$dados["cpfFornecedor"]?>">
                        </div>
                                            
                        <div class="col">
                            <label class="form-label" for="rgFornecedor">RG:</label>
                            <input class="form-control input-cinza-claro" type="text" name="rgFornecedor" id="rgFornecedor" value="<?=$dados["rgFornecedor"]?>">
                        </div>
                    </div>
                </div>
                 <!-- Campos pessoa jurisica -->        
                <div id="pj-fields" style="display: none;">
                    <div class="row">
                        <div class="col">
                            <label class="form-label" for="cnpjFornecedor">CNPJ:</label>
                            <input class="form-control input-cinza-claro" type="text" name="cnpjFornecedor" id="cnpjFornecedor" value="<?=$dados["cnpjFornecedor"]?>">
                        </div>
                        <div class="col">
                            <label class="form-label" for="ieFornecedor">I.E.:</label>
                            <input class="form-control input-cinza-claro" type="text" name="ieFornecedor" id="ieFornecedor" value="<?=$dados["ieFornecedor"]?>">
                        </div>
                    </div>
                </div>
         

         <!-- Campos comuns -->
        <div class="row">
            <div class="col">
                <label class="form-label" for="foneFornecedor">Telefone:</label>
                <input class="form-control input-cinza-claro" type="text" name="foneFornecedor" id="foneFornecedor" value="<?=$dados["foneFornecedor"]?>">
            </div>
            <div class="col">
                <labe class="form-label" for="celularFornecedor">Celular:</label>
                <input class="form-control input-cinza-claro" type="text" name="celularFornecedor" id="celularFornecedor" value="<?=$dados["celularFornecedor"]?>">
            </div>
            <div class="col">
                <label class="form-label" for="emailFornecedor">Email:</label>
                <input class="form-control input-cinza-claro" type="text" name="emailFornecedor" id="emailFornecedor" value="<?=$dados["emailFornecedor"]?>">
            </div>
            <div class="col">
                <label class="form-label" for="nascFornecedor">Data nascimento:</label>
                <input class="form-control input-cinza-claro" type="date" name="nascFornecedor" id="nascFornecedor" value="<?=$dados["nascFornecedor"]?>">
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col">
                <input class="btn btn-primary" type="submit" value="Atualizar" name="btnAtualizar">
            </div>
            <div class="col">
            <a class="btn btn-danger" href="index.php?menuop=excluir-fornecedor&idFornecedor=<?=$dados["idFornecedor"]?>"
                onclick="return confirm('Tem certeza que deseja excluir este fornecedor?')">
                Excluir
            </a>
            </div>
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