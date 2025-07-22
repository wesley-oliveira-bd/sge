<?php 
    $conexao = mysqli_connect("localhost", "root", "", "sistemavendas");
    if (!$conexao){
        die("Erro na conexão" . mysqli_connect_error());
    }
?>