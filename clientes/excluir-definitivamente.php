<?php 
    include '../config/conexao.php';

    $id = $_GET['id'];

    $excluir = " DELETE FROM clientes WHERE clientes.id = '$id' ";
    $sql = mysqli_query($conexao, $excluir) or die (mysqli_error($conexao));
    echo "Registro excluido com sucesso!";
    echo " <br/><a href='controle.php'>Voltar</a> ";

?>