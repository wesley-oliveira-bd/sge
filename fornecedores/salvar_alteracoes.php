<?php 
  if(isset($_POST['alterar'])){
    include '../config/conexao.php';
        $id = $_POST["id"];
        $tipo = $_POST["tipo"];
        $nome = $_POST["nome"];
        $logradouro = $_POST["logradouro"];
        $numero = $_POST["numero"];
        $complemento = $_POST["complemento"];
        $bairro = $_POST["bairro"];
        $cidade = $_POST["cidade"];
        $uf = $_POST["uf"];
        $cep = $_POST["cep"];
        $rg = $_POST["rg"];
        $cpf = $_POST["cpf"];
        $cnpj = $_POST["cnpj"];
        $insc = $_POST["insc"];
        $celular = $_POST["celular"];
        $instagram = $_POST["instagram"];
        $obs = $_POST["obs"];
        $limite = $_POST["limite"];
        $bloqueado = $_POST["bloqueado"];

        $sql = " UPDATE fornecedores SET 
            tipo = '$tipo',
            nome = '$nome',
            logradouro = '$logradouro',
            numero = '$numero',
            complemento = '$complemento',
            bairro = '$bairro',
            cidade = '$cidade',
            uf = '$uf',
            cep = '$cep',
            rg = '$rg',
            cpf = '$cpf',
            cnpj = '$cnpj',
            insc = '$insc',
            celular = '$celular',
            instagram = '$instagram',
            obs = '$obs',
            limite = '$limite',
            bloqueado = '$bloqueado'
        WHERE fornecedores.id='$id' ";

    if(mysqli_query($conexao, $sql)){
        echo "Fornecedor alterado com sucesso!";
    } else {
        echo "Erro ao atualizar!" . mysqli_error($conexao);
    }

    echo "<br/><a href='controle.php'>Voltar</a>";

  }
?>