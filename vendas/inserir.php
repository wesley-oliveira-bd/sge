<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../config/conexao.php';

    $id = $_POST["id_venda"];
    $data_emissao = $_POST["data_emissao"];
    $cliente_id = $_POST["cliente_id"];
    $acrescimo_venda = $_POST['acrescimo_venda'];
    $desconto_venda = $_POST['desconto_venda'];
    $total_venda = $_POST["total_venda"];
    $total_parcelas = $_POST['total_parcelas'];
    $forma_pgto = $_POST['forma_pgto'];
    $status = $_POST['status'];

    // Produtos
    $produto_ids = $_POST['produto_id'];
    $descricoes  = $_POST['descricao'];
    $unidades    = $_POST['unidade'];
    $quantidades = $_POST['qtd'];
    $valores     = $_POST['valor_unit'];

    // Parcelas
    $numeroParcelas = $_POST['numeroParcela'];
    $vencimentos    = $_POST['vencimentoFormatado'];
    $parcelas       = $_POST['valorParcela'];

    // Atualiza a venda principal
    $sql_venda = "UPDATE vendas SET 
                    cliente_id='$cliente_id', 
                    desconto_venda='$desconto_venda', 
                    acrescimo_venda='$acrescimo_venda',  
                    total_venda='$total_venda' 
                  WHERE id='$id'";
    if (mysqli_query($conexao, $sql_venda)) {

        // Salva os produtos vendidos
        if (count($produto_ids) === count($quantidades) && count($quantidades) === count($valores)) {
            for ($i = 0; $i < count($produto_ids); $i++) {
                $produto_id  = $produto_ids[$i];
                $qtd         = $quantidades[$i];
                $valor_unit  = $valores[$i];
                $valor_total = $qtd * $valor_unit;

                // Verifica estoque disponível
                $sql_verifica = "SELECT estoque FROM produtos WHERE id = '$produto_id'";
                $res_verifica = mysqli_query($conexao, $sql_verifica);
                $row_estoque  = mysqli_fetch_assoc($res_verifica);

                if ($row_estoque['estoque'] >= $qtd) {
                    // Insere produto na venda
                    $sql_item = "INSERT INTO vendaprodutos 
                                    (venda_id, cliente_id, produto_id, quant_venda, valor_unit, valor_total)
                                 VALUES 
                                    ('$id', '$cliente_id', '$produto_id', '$qtd', '$valor_unit', '$valor_total')";
                    mysqli_query($conexao, $sql_item);

                    // Atualiza estoque
                    $sql_estoque = "UPDATE produtos 
                                    SET estoque = estoque - $qtd 
                                    WHERE id = '$produto_id'";
                    mysqli_query($conexao, $sql_estoque);
                } else {
                    echo "⚠ Estoque insuficiente para o produto ID $produto_id<br>";
                }
            }

            echo "Venda salva com sucesso!<br>";
        } else {
            echo "Erro: Dados dos produtos estão inconsistentes.<br>";
        }

        // === PROCESSAR PARCELAS ===
        if (in_array(strtolower($forma_pgto), ['pix', 'dinheiro'])) {
            // Pagamento à vista: 1 parcela no valor total
            $numeroParcelas = [1];
            $vencimentos    = [$data_emissao]; // já no formato dd/mm/yyyy
            $parcelas       = [$total_venda];
            $total_parcelas = 1;
        } else {
            // Caso contrário, usa os valores vindos do formulário
            $numeroParcelas = isset($_POST['numeroParcela']) ? $_POST['numeroParcela'] : array();
            $vencimentos    = isset($_POST['vencimentoFormatado']) ? $_POST['vencimentoFormatado'] : array();
            $parcelas       = isset($_POST['valorParcela']) ? $_POST['valorParcela'] : array();

        }

        // Inserir parcelas no banco
        if (count($numeroParcelas) && count($numeroParcelas) === count($vencimentos) && count($vencimentos) === count($parcelas)) {
            for ($i = 0; $i < count($numeroParcelas); $i++) {
                $numero_parcela   = (int)$numeroParcelas[$i];
                $valor_parcela    = (float)$parcelas[$i];
                $venc_mysql       = br_to_mysql($vencimentos[$i]);

                $sql_pgto = "INSERT INTO contasreceber
                                (venda_id, cliente_id, data_emissao, numero_parcela, total_parcelas, valor_parcela, vencimento, forma_pgto, status)
                            VALUES
                                ('$id', '$cliente_id', "
                                . ($data_emissao_mysql ? "'$data_emissao_mysql'" : "NULL") . ",
                                '$numero_parcela', '$total_parcelas', '$valor_parcela', "
                                . ($venc_mysql ? "'$venc_mysql'" : "NULL") . ",
                                '$forma_pgto', '$status')";
                mysqli_query($conexao, $sql_pgto);
            }
        }


    } else {
        echo "Erro ao atualizar venda: " . mysqli_error($conexao);
    }

    echo "<br/><a href='vendas.php'>Voltar</a>";
}
?>
