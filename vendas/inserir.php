<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../config/conexao.php';

    // Função para converter data BR (dd/mm/yyyy) para MySQL (yyyy-mm-dd)
    function br_to_mysql($data) {
        if (!$data) return null;
        $partes = explode('/', $data);
        if (count($partes) !== 3) return null;
        return $partes[2] . '-' . $partes[1] . '-' . $partes[0];
    }

    // Recebe dados principais
    $id              = $_POST["id_venda"];
    $data_emissao    = $_POST["data_emissao"];
    $cliente_id      = $_POST["cliente_id"];
    $acrescimo_venda = $_POST['acrescimo_venda'];
    $desconto_venda  = $_POST['desconto_venda'];
    $total_venda     = $_POST["total_venda"];
    $total_parcelas  = $_POST['total_parcelas'];
    $forma_pgto      = $_POST['forma_pgto'];
    $status          = $_POST['status'];

    // Valores iniciais das parcelas
    $valor_pago  = 0.00;
    $resto_pgto  = 0.00;
    $data_pgto   = null;

    $data_emissao_mysql = br_to_mysql($data_emissao);

    // Produtos
    $produto_ids = isset($_POST['produto_id']) ? $_POST['produto_id'] : array();
    $quantidades = isset($_POST['qtd']) ? $_POST['qtd'] : array();
    $valores     = isset($_POST['valor_unit']) ? $_POST['valor_unit'] : array();

    // Parcelas
    $numeroParcelas = isset($_POST['numeroParcela']) ? $_POST['numeroParcela'] : array();
    $vencimentos    = isset($_POST['vencimentoFormatado']) ? $_POST['vencimentoFormatado'] : array();
    $parcelas       = isset($_POST['valorParcela']) ? $_POST['valorParcela'] : array();

    // === PASSO 1: Verifica estoque de todos os produtos ===
    $estoque_ok = true;
    $erros = array();

    if (count($produto_ids) === count($quantidades) && count($quantidades) === count($valores)) {
        for ($i = 0; $i < count($produto_ids); $i++) {
            $produto_id = $produto_ids[$i];
            $qtd        = $quantidades[$i];

            $sql_verifica = "SELECT estoque FROM produtos WHERE id = '$produto_id'";
            $res_verifica = mysqli_query($conexao, $sql_verifica);
            $row_estoque  = mysqli_fetch_assoc($res_verifica);

            if (!$row_estoque || $row_estoque['estoque'] < $qtd) {
                $estoque_ok = false;
                $disponivel = isset($row_estoque['estoque']) ? $row_estoque['estoque'] : 0;
                $erros[] = "⚠ Estoque insuficiente para o produto ID $produto_id (Disponível: $disponivel)";
            }
        }
    } else {
        $estoque_ok = false;
        $erros[] = "Erro: Dados dos produtos estão inconsistentes.";
    }

    // === PASSO 2: Se faltar estoque, mostra erro e para ===
    if (!$estoque_ok) {
        foreach ($erros as $msg) {
            echo $msg . "<br>";
        }
        echo "<br/><a href='vendas.php'>Voltar</a>";
        exit;
    }

    // === PASSO 3: Atualiza a venda ===
    $sql_venda = "UPDATE vendas SET 
                    cliente_id      = '$cliente_id', 
                    desconto_venda  = '$desconto_venda', 
                    acrescimo_venda = '$acrescimo_venda',  
                    total_venda     = '$total_venda' 
                  WHERE id = '$id'";

    if (!mysqli_query($conexao, $sql_venda)) {
        echo "Erro ao atualizar venda: " . mysqli_error($conexao);
        exit;
    }

    // === Remove produtos antigos ===
    mysqli_query($conexao, "DELETE FROM vendaprodutos WHERE venda_id = '$id'");

    // === Insere produtos na venda e atualiza estoque ===
    for ($i = 0; $i < count($produto_ids); $i++) {
        $produto_id  = $produto_ids[$i];
        $qtd         = $quantidades[$i];
        $valor_unit  = $valores[$i];
        $valor_total = $qtd * $valor_unit;

        $sql_item = "INSERT INTO vendaprodutos 
                        (venda_id, cliente_id, produto_id, quant_venda, valor_unit, valor_total)
                     VALUES 
                        ('$id', '$cliente_id', '$produto_id', '$qtd', '$valor_unit', '$valor_total')";
        if (!mysqli_query($conexao, $sql_item)) {
            echo "Erro ao inserir produto $produto_id: " . mysqli_error($conexao) . "<br>";
        }

        $sql_estoque = "UPDATE produtos 
                        SET estoque = estoque - $qtd 
                        WHERE id = '$produto_id'";
        mysqli_query($conexao, $sql_estoque);
    }

    // === Define parcelas para pagamento à vista ===
    if (in_array(strtolower($forma_pgto), array('pix', 'dinheiro'))) {
        $numeroParcelas = array(1);
        $vencimentos    = array($data_emissao);
        $parcelas       = array($total_venda);
        $total_parcelas = 1;
    }

    // === Remove parcelas antigas ===
    mysqli_query($conexao, "DELETE FROM contasreceber WHERE venda_id = '$id'");

    // === Insere novas parcelas ===
    if (count($numeroParcelas) && count($numeroParcelas) === count($vencimentos) && count($vencimentos) === count($parcelas)) {
        for ($i = 0; $i < count($numeroParcelas); $i++) {
            $numero_parcela = (int)$numeroParcelas[$i];
            $valor_parcela  = (float)$parcelas[$i];
            $venc_mysql     = !empty($vencimentos[$i]) ? br_to_mysql($vencimentos[$i]) : null;

            $sql_pgto = "INSERT INTO contasreceber
                (venda_id, cliente_id, data_emissao, numero_parcela, total_parcelas, valor_parcela, vencimento, valor_pago, data_pgto, resto_pgto, forma_pgto, status)
                VALUES
                ('$id', '$cliente_id', " . ($data_emissao_mysql ? "'$data_emissao_mysql'" : "NULL") . ",
                 '$numero_parcela', '$total_parcelas', '$valor_parcela',
                 " . ($venc_mysql ? "'$venc_mysql'" : "NULL") . ",
                 '$valor_pago', " . ($data_pgto ? "'$data_pgto'" : "NULL") . ",
                 '$resto_pgto', '$forma_pgto', '$status')";

            if (!mysqli_query($conexao, $sql_pgto)) {
                echo "Erro na parcela $i: " . mysqli_error($conexao) . "<br>";
            }
        }
    } else {
        echo "Erro: Parcelas inconsistentes.<br>";
    }

    echo "Venda salva com sucesso!<br>";
    echo "<br/><a href='vendas.php'>Voltar</a>";
}
?>
