<?php 
  if(isset($_POST['alterar'])){
    include '../config/conexao.php';

    $id = $_POST["id"];
    $referencia = $_POST["referencia"];
    $descricao = $_POST["descricao"];
    $unid = $_POST["unid"];
    $custo = $_POST["custo"];
    $margem = $_POST["margem"];
    $venda = $_POST["venda"];
    $estoque = $_POST["estoque"];
    $obs = $_POST["obs"];

    $sql = "UPDATE produtos SET referencia = '$referencia', descricao = '$descricao', unid = '$unid', custo = '$custo', margem = '$margem', venda = '$venda', estoque = '$estoque', obs = '$obs' WHERE produtos.id = '$id' ";

    if(mysqli_query($conexao, $sql)){
        echo "Produto alterado com sucesso!";
    } else {
        echo "Erro ao atualizar!" . mysqli_error($conexao);
    }

    echo "<br/><a href='controle.php'>Voltar</a>";

  }
?>