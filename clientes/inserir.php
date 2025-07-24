<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        include '../config/conexao.php';

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

        $sql = " INSERT INTO clientes (tipo, nome, logradouro, numero, complemento, bairro, cidade, uf, cep, rg, cpf, cnpj, insc, celular, instagram, obs, limite, bloqueado) VALUES ('$tipo', '$nome', '$logradouro', '$numero', '$complemento', '$bairro', '$cidade', '$uf', '$cep', '$rg', '$cpf', '$cnpj', '$insc', '$celular', '$instagram', '$obs', '$limite', '$bloqueado') ";

        if(mysqli_query($conexao, $sql)){
            echo "Cliente cadastrado com sucesso!";
            
            
        } else {
            echo "Erro ao cadastrar!" . mysqli_error($conexao);
            echo " <br/><a href='controle.php'>Voltar</a> ";
            
        }
        echo "<br/><a href='controle.php'>Voltar</a>";

    } else {
        echo "Acesso inválido!";
        echo " <br/><a href='controle.php'>Voltar</a> ";
    }