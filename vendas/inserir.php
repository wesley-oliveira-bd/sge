<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include '../config/conexao.php';

    $id = $_POST["id_venda"];
    $data_emissao = $_POST["data_emissao"] ;
    $cliente_id = $_POST["cliente_id"] ;
    $acrescimo_venda = $_POST['acrescimo_venda'];
    $desconto_venda = $_POST['desconto_venda'];
    $total_venda = $_POST["total_venda"] ;
    $total_parcelas = $_POST['total_parcelas'] ;
    $forma_pgto = $_POST['forma_pgto'];
    $status = $_POST['status'];

    // Produtos (evita erro se não vierem do POST)
    $produto_ids = $_POST['produto_id'];
    $descricoes  = $_POST['descricao'];
    $unidades    = $_POST['unidade'];
    $quantidades = $_POST['qtd'];
    $valores     = $_POST['valor_unit'];

    //arrays do parcelamento
    $numeroParcelas = $_POST['numeroParcela'];
    $vencimentos    = $_POST['vencimentoFormatado'];
    $parcelas = $_POST['valorParcela'];



    // Atualiza a venda principal
    $sql_venda = "UPDATE vendas SET cliente_id='$cliente_id', desconto_venda='$desconto_venda', acrescimo_venda='$acrescimo_venda',  total_venda='$total_venda' WHERE id='$id'";
    if (mysqli_query($conexao, $sql_venda)) {

        // (Opcional) Remove os itens antigos da venda, se estiver editando
        // mysqli_query($conexao, "DELETE FROM vendaProdutos WHERE venda_id = '$id'");

        // Valida se os arrays têm o mesmo número de itens
        if (count($produto_ids) === count($quantidades) && count($quantidades) === count($valores)) {
            for ($i = 0; $i < count($produto_ids); $i++) {
                $produto_id  = $produto_ids[$i];
                $qtd         = $quantidades[$i];
                $valor_unit  = $valores[$i];
                $valor_total = $qtd * $valor_unit;

                $sql_item = "INSERT INTO vendaprodutos (venda_id, cliente_id, produto_id, quant_venda, valor_unit, valor_total)
                             VALUES ('$id', '$cliente_id', '$produto_id', '$qtd', '$valor_unit', '$valor_total')";

                mysqli_query($conexao, $sql_item);
                
            }

            echo "Venda salva com sucesso!";
        } else {
            echo "Erro: Dados dos produtos estão inconsistentes.";
        }

        if (count($numeroParcelas) === count($vencimentos) && count($parcelas)){
            for($i = 0; $i < count($numeroParcelas); $i++) {
                $numero_parcela = $numeroParcelas[$i];
                $valor_parcela = $parcelas[$i];
                $data_parts = explode('/', $vencimentos[$i]); // dd/mm/yyyy
                if (count($data_parts) === 3) {
                    $vencimento = $data_parts[2] . '-' . $data_parts[1] . '-' . $data_parts[0];
                } else {
                    $vencimento = null;
                }
                if (!empty($_POST["data_emissao"])) {
                    $emissao_parts = explode('/', $_POST["data_emissao"]);
                if (count($emissao_parts) === 3) {
                    $data_emissao = $emissao_parts[2] . '-' . $emissao_parts[1] . '-' . $emissao_parts[0];
                } else {
                    $data_emissao = null;
                }
        }
                
                
                $sql_pgto = " INSERT INTO contasreceber (venda_id, cliente_id, data_emissao, numero_parcela, total_parcelas,valor_parcela, vencimento, forma_pgto, status) VALUES ( '$id', '$cliente_id', '$data_emissao', '$numero_parcela', '$total_parcelas', '$valor_parcela', '$vencimento', '$forma_pgto', '$status' ) ";

                mysqli_query($conexao, $sql_pgto);
            }
        }

    } else {
        echo "Erro ao atualizar venda: " . mysqli_error($conexao);
    }




    echo "<br/><a href='vendas.php'>Voltar</a>";
}
?>
