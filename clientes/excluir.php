<?php
    include '../config/conexao.php';

    $id = $_GET['id'];

    $consulta = " SELECT * FROM clientes WHERE id = '$id' ";
    $sql = mysqli_query($conexao, $consulta) or die(mysqli_error($conexao));
    $row = mysqli_fetch_assoc($sql);
?>

<h1>Tem certeza que deseja excluir o cliente ' <?=$row['nome'];?> ' ?</h1>
<a href="excluir-definitivamente.php?id=<?=$row['id'];?>">SIM</a>
<a href="controle.php">NÃO</a>