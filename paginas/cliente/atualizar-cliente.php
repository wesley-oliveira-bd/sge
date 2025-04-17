<?php 

$idCliente = mysqli_real_escape_string($conexao, $_POST["idCliente"]);
$tipoCliente = mysqli_real_escape_string($conexao, $_POST["tipoCliente"]);
$nomeCliente = mysqli_real_escape_string($conexao, $_POST["nomeCliente"]);
$logradCliente = mysqli_real_escape_string($conexao, $_POST["logradCliente"]);
$numLogradCliente = mysqli_real_escape_string($conexao, $_POST["numLogradCliente"]);
$compLogradCliente = mysqli_real_escape_string($conexao, $_POST["compLogradCliente"]);
$bairroCliente = mysqli_real_escape_string($conexao, $_POST["bairroCliente"]);
$cidadeCliente = mysqli_real_escape_string($conexao, $_POST["cidadeCliente"]);
$ufCliente = mysqli_real_escape_string($conexao, $_POST["ufCliente"]);
$cepCliente = mysqli_real_escape_string($conexao, $_POST["cepCliente"]);
$cpfCliente = mysqli_real_escape_string($conexao, $_POST["cpfCliente"]);
$rgCliente = mysqli_real_escape_string($conexao, $_POST["rgCliente"]);
$cnpjCliente = mysqli_real_escape_string($conexao, $_POST["cnpjCliente"]);
$ieCliente = mysqli_real_escape_string($conexao, $_POST["ieCliente"]);
$foneCliente = mysqli_real_escape_string($conexao, $_POST["foneCliente"]);
$celularCliente = mysqli_real_escape_string($conexao, $_POST["celularCliente"]);
$emailCliente = mysqli_real_escape_string($conexao, $_POST["emailCliente"]);
$nascCliente = mysqli_real_escape_string($conexao, $_POST["nascCliente"]);

$sql = "UPDATE tbclientes SET 
    
    tipoCliente = '{$tipoCliente}',
    nomeCliente = '{$nomeCliente}',
    logradCliente = '{$logradCliente}',
    numLogradCliente = '{$numLogradCliente}',
    compLogradCliente = '{$compLogradCliente}',
    bairroCliente = '{$bairroCliente}',
    cidadeCliente = '{$cidadeCliente}',
    ufCliente = '{$ufCliente}',
    cepCliente = '{$cepCliente}',
    cpfCliente = '{$cpfCliente}',
    rgCliente = '{$rgCliente}',
    cnpjCliente = '{$cnpjCliente}',
    ieCliente = '{$ieCliente}',
    foneCliente = '{$foneCliente}',
    celularCliente = '{$celularCliente}',
    emailCliente = '{$emailCliente}',
    nascCliente = '{$nascCliente}' WHERE idCliente = '{$idCliente}'
";

mysqli_query($conexao, $sql) or die("Erro ao execultar a consulta. " . mysqli_error($conexao));

echo "O registro foi atualizado com sucesso.";
?>