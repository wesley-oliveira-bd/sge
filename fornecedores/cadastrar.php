<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <script>
    function toggleCampos() {
      const tipo = document.querySelector('input[name="tipo"]:checked').value;

      const divFisica = document.getElementById('campos-fisica');
      const divJuridica = document.getElementById('campos-juridica');

      if (tipo === 'fisica') {
        divFisica.style.display = 'block';
        divJuridica.style.display = 'none';

        document.getElementById('cnpj').value = '';
        document.getElementById('insc').value = '';
      } else {
        divFisica.style.display = 'none';
        divJuridica.style.display = 'block';

        document.getElementById('cpf').value = '';
        document.getElementById('rg').value = '';
      }
    }

    window.onload = function () {
      toggleCampos(); // aplica ao carregar
      document.getElementById('fisica').addEventListener('change', toggleCampos);
      document.getElementById('juridica').addEventListener('change', toggleCampos);
    };
  </script>


</head>
<body>
  <?php include_once '../includes/header.php'; ?>


<h2>Cadastro de Fornecedores</h2>

<form action="inserir.php" method="POST" enctype="multipart/form-data">

  <label for="tipo">Tipo:</label><br>
  <input type="radio" id="fisica" name="tipo" value="fisica" checked>
  <label for="fisica">Física</label><br>
  <input type="radio" name="tipo" id="juridica" value="juridica">
  <label for="juridica">Jurídica</label><br><br>

  <label for="nome">Nome:</label><br>
  <input type="text" id="nome" name="nome"><br><br>

  <label for="logradouro">End.:</label><br>
  <input type="text" id="logradouro" name="logradouro"><br><br>

  <label for="numero">Número:</label><br>
  <input type="text" id="numero" name="numero"><br><br>

  <label for="complemento">Compl.:</label><br>
  <input type="complemento" id="complemento" name="complemento"><br><br>

  <label for="bairro">Bairro:</label><br>
  <input type="text" id="bairro" name="bairro"><br><br>

  <label for="cidade">Cidade:</label><br>
  <input type="text" id="cidade" name="cidade"><br><br>

  <label for="uf">UF:</label><br>
  <input type="text" id="uf" name="uf"><br><br>

  <label for="cep">CEP:</label><br>
  <input type="text" id="cep" name="cep"><br><br>

  <div id="campos-fisica">
    <label for="rg">RG:</label><br>
    <input type="text" id="rg" name="rg"><br><br>
    <label for="cpf">CPF:</label><br>
    <input type="text" id="cpf" name="cpf"><br><br>
  </div>

  <div id="campos-juridica">
    <label for="cnpj">CNPJ:</label><br>
    <input type="text" id="cnpj" name="cnpj"><br><br>
    <label for="insc">Insc. Estad.:</label><br>
    <input type="text" id="insc" name="insc"><br><br>
  </div>

  <label for="celular">Celular:</label><br>
  <input type="text" id="celular" name="celular"><br><br>

  <label for="instagram">Instagram:</label><br>
  <input type="text" id="instagram" name="instagram"><br><br>

  <label for="obs">Obs.:</label><br>
  <input type="text" id="obs" name="obs"><br><br>

  <label for="limite">Limite:</label><br>
  <input type="number" id="limite" name="limite"><br><br>

  <label for="bloqueado">Bloqueado:</label><br>
  <input type="radio" id="nao" name="bloqueado" value="nao" checked>
  <label for="nao">Não</label><br>
  <input type="radio" name="bloqueado" id="sim" value="sim">
  <label for="sim">Sim</label><br>


  <button type="submit" name="acao" value="cadastrar">Cadastrar fornecedor</button>
</form>






<?php include_once '../includes/footer.php'; ?>

</body>
</html>