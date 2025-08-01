<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include_once '../includes/header.php';
        include_once '../config/conexao.php';
    ?>

    <h2>Lista de vendas</h2>   
    <form action="" method="post">
        <label for="consulta">Consulta:</label>
        <input type="text" name="consulta" id="consulta">
        <input type="submit" value="OK">
    </form>

    
</body>
</html>