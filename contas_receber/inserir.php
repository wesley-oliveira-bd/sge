<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    include '../config/conexao.php';

    
    $cliente_id = $_POST['cliente_id'];
    $data_emissao = $_POST['data_emissao'];
    $numero_parcela = $_POST['numero_parcela'];
    $total_parcelas = $_POST['total_parcelas'];
    $valor_parcela = $_POST['valor_parcela'];
    $vencimento = $_POST['vencimento'];
    $valor_pago = $_POST['valor_pago'];
    $data_pgto = $_POST['data_pgto'];
    $resto_pgto = $_POST['resto_pgto'];
    $forma_pgto = $_POST['forma_pgto'];
    $status = $_POST['status'];

    $sql = "INSERT INTO contasreceber (cliente_id, data_emissao, numero_parcela, total_parcelas, valor_parcela, vencimento, valor_pago, data_pgto, resto_pgto, forma_pgto, status) VALUES ('$cliente_id', '$data_emissao', '$numero_parcela', '$total_parcelas', '$valor_parcela', '$vencimento', '$valor_pago', '$data_pgto', '$resto_pgto', '$forma_pgto', '$status')";

    if(mysqli_query($conexao, $sql)){
            echo "Conta cadastrada com sucesso!";

    }else {
            echo "Erro ao cadastrar!" . mysqli_error($conexao);
            echo " <br/><a href=''>Voltar</a> ";
    }
}
 ?>