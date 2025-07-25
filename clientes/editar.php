<!DOCTYPE html>
<html lang="pt-br">
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
    <?php
        include_once '../includes/header.php';
        include_once '../config/conexao.php';
        $id = $_GET['id'];
        $consulta = "SELECT * FROM clientes WHERE id='$id' ";
        $sql = mysqli_query($conexao, $consulta) or die(mysqli_error($conexao));
        $row = mysqli_fetch_assoc($sql);
    ?>
<h2>Edicção de Clientes</h2>

<form action="salvar_alteracoes.php" method="POST">
  <label for="id">ID:</label><br>
  <input type="number" id="id" name="id" value="<?=$row['id']; ?>" readonly><br><br>

  <label for="tipo">Tipo:</label><br>
  <input type="radio" id="fisica" name="tipo" value="fisica" <?php if ($row['tipo'] == 'fisica') echo 'checked'; ?>>
  <label for="fisica">Física</label><br>
  <input type="radio"  id="juridica" name="tipo" value="juridica" <?php if ($row['tipo'] == 'juridica') echo 'checked'; ?>>
  <label for="juridica">Jurídica</label><br><br>

  <label for="nome">Nome:</label><br>
  <input type="text" id="nome" name="nome" value="<?=$row['nome']; ?>"><br><br>

  <label for="logradouro">End.:</label><br>
  <input type="text" id="logradouro" name="logradouro" value="<?=$row['logradouro']; ?>"><br><br>

  <label for="numero">Número:</label><br>
  <input type="text" id="numero" name="numero" value="<?=$row['numero']; ?>"><br><br>

  <label for="complemento">Compl.:</label><br>
  <input type="complemento" id="complemento" name="complemento" value="<?=$row['complemento']; ?>"><br><br>

  <label for="bairro">Bairro:</label><br>
  <input type="text" id="bairro" name="bairro" value="<?=$row['bairro']; ?>"><br><br>

  <label for="cidade">Cidade:</label><br>
  <input type="text" id="cidade" name="cidade" value="<?=$row['cidade']; ?>"><br><br>

  <label for="uf">UF:</label><br>
  <input type="text" id="uf" name="uf" value="<?=$row['uf']; ?>"><br><br>

  <label for="cep">CEP:</label><br>
  <input type="text" id="cep" name="cep" value="<?=$row['cep']; ?>"><br><br>

  <div id="campos-fisica">
    <label for="rg">RG:</label><br>
    <input type="text" id="rg" name="rg" value="<?=$row['rg']; ?>"><br><br>
    <label for="cpf">CPF:</label><br>
    <input type="text" id="cpf" name="cpf" value="<?=$row['rg']; ?>"><br><br>
  </div>

  <div id="campos-juridica">
    <label for="cnpj">CNPJ:</label><br>
    <input type="text" id="cnpj" name="cnpj" value="<?=$row['cnpj']; ?>"><br><br>
    <label for="insc">Insc. Estad.:</label><br>
    <input type="text" id="insc" name="insc" value="<?=$row['insc']; ?>"><br><br>
  </div>

  <label for="celular">Celular:</label><br>
  <input type="text" id="celular" name="celular" value="<?=$row['celular']; ?>"><br><br>

  <label for="instagram">Instagram:</label><br>
  <input type="text" id="instagram" name="instagram" value="<?=$row['instagram']; ?>"><br><br>

  <label for="obs">Obs.:</label><br>
  <input type="text" id="obs" name="obs" value="<?=$row['obs']; ?>"><br><br>

  <label for="limite">Limite:</label><br>
  <input type="number" id="limite" name="limite" value="<?=$row['limite']; ?>"><br><br>

  <label for="bloqueado">Bloqueado:</label><br>
  <input type="radio" id="nao" name="bloqueado" value="nao" <?php if ($row['bloqueado'] == 'nao') echo 'checked'; ?>>
  <label for="nao">Não</label><br>
  <input type="radio" name="bloqueado" id="sim" value="sim" <?php if ($row['bloqueado'] == 'sim') echo 'checked'; ?>>
  <label for="sim">Sim</label><br>


  <button type="submit" name="acao" value="cadastrar">Cadastrar cliente</button>
</form>


    
</body>
</html>