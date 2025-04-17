<?php 

$idFornecedor = mysqli_real_escape_string($conexao, $_POST["idFornecedor"]);
$tipoFornecedor = mysqli_real_escape_string($conexao, $_POST["tipoFornecedor"]);
$nomeFornecedor = mysqli_real_escape_string($conexao, $_POST["nomeFornecedor"]);
$logradFornecedor = mysqli_real_escape_string($conexao, $_POST["logradFornecedor"]);
$numLogradFornecedor = mysqli_real_escape_string($conexao, $_POST["numLogradFornecedor"]);
$compLogradFornecedor = mysqli_real_escape_string($conexao, $_POST["compLogradFornecedor"]);
$bairroFornecedor = mysqli_real_escape_string($conexao, $_POST["bairroFornecedor"]);
$cidadeFornecedor = mysqli_real_escape_string($conexao, $_POST["cidadeFornecedor"]);
$ufFornecedor = mysqli_real_escape_string($conexao, $_POST["ufFornecedor"]);
$cepFornecedor = mysqli_real_escape_string($conexao, $_POST["cepFornecedor"]);
$cpfFornecedor = mysqli_real_escape_string($conexao, $_POST["cpfFornecedor"]);
$rgFornecedor = mysqli_real_escape_string($conexao, $_POST["rgFornecedor"]);
$cnpjFornecedor = mysqli_real_escape_string($conexao, $_POST["cnpjFornecedor"]);
$ieFornecedor = mysqli_real_escape_string($conexao, $_POST["ieFornecedor"]);
$foneFornecedor = mysqli_real_escape_string($conexao, $_POST["foneFornecedor"]);
$celularFornecedor = mysqli_real_escape_string($conexao, $_POST["celularFornecedor"]);
$emailFornecedor = mysqli_real_escape_string($conexao, $_POST["emailFornecedor"]);
$nascFornecedor = mysqli_real_escape_string($conexao, $_POST["nascFornecedor"]);

$sql = "UPDATE tbfornecedores SET 
    
    tipoFornecedor = '{$tipoFornecedor}',
    nomeFornecedor = '{$nomeFornecedor}',
    logradFornecedor = '{$logradFornecedor}',
    numLogradFornecedor = '{$numLogradFornecedor}',
    compLogradFornecedor = '{$compLogradFornecedor}',
    bairroFornecedor = '{$bairroFornecedor}',
    cidadeFornecedor = '{$cidadeFornecedor}',
    ufFornecedor = '{$ufFornecedor}',
    cepFornecedor = '{$cepFornecedor}',
    cpfFornecedor = '{$cpfFornecedor}',
    rgFornecedor = '{$rgFornecedor}',
    cnpjFornecedor = '{$cnpjFornecedor}',
    ieFornecedor = '{$ieFornecedor}',
    foneFornecedor = '{$foneFornecedor}',
    celularFornecedor = '{$celularFornecedor}',
    emailFornecedor = '{$emailFornecedor}',
    nascFornecedor = '{$nascFornecedor}' WHERE idFornecedor = '{$idFornecedor}'
";

mysqli_query($conexao, $sql) or die("Erro ao execultar a consulta. " . mysqli_error($conexao));

echo "O registro foi atualizado com sucesso.";
?>