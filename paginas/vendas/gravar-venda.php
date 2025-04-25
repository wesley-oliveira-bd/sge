<?php
include('./db/conexao.php'); // Conexão com o banco de dados

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receber os dados do formulário
    $dataVenda = $_POST['dataVenda'];
    $idCliente = $_POST['idCliente'];
    $nomeCliente = $_POST['nomeCliente'];
    $valorTotalVenda = $_POST['valorTotalVenda'];
    $valorDesconto = $_POST['valorDesconto'];
    $valorAcrescimo = $_POST['valorAcrescimo'];
    $valorFinal = $_POST['valorFinal'];
    $formaPgto = $_POST['formaPgto'];
    $statusPagamento = 'aberto';
    
    // Iniciar uma transação para garantir que os dados sejam salvos em todas as tabelas
    $conexao->begin_transaction();

    try {
        // 1. Inserir na tabela 'vendas'
        $sqlVenda = "INSERT INTO tbvendas (dataVenda, idCliente, nomeCliente, valorTotalVenda, valorDesconto, valorAcrescimo, valorFinal, formaPgto) 
                     VALUES ('$dataVenda', '$idCliente', '$nomeCliente', '$valorTotalVenda', '$valorDesconto', '$valorAcrescimo', '$valorFinal', '$formaPgto')";
        if ($conexao->query($sqlVenda) === TRUE) {
            $idVenda = $conexao->insert_id; // Captura o ID da venda gerado automaticamente
        } else {
            throw new Exception("Erro ao inserir venda: " . $conexao->error);
        }

        foreach ($_POST['produtos'] as $produto) {
            $idProduto = $produto['idProduto'];
            $descricaoProduto = $produto['descricaoProduto'];
            $quantidade = $produto['quantidade'];
            $valorUnitario = $produto['valorUnitario'];
            $valorTotal = $produto['valorTotal'];
            
            // 1. Inserir na tabela tbvendas_produtos
            $sqlProduto = "INSERT INTO tbvendas_produtos (idVenda, idProduto, descricaoProduto, quantidade, valorUnitario, valorTotal)
                           VALUES ('$idVenda', '$idProduto', '$descricaoProduto', '$quantidade', '$valorUnitario', '$valorTotal')";
            if ($conexao->query($sqlProduto) === FALSE) {
                throw new Exception("Erro ao inserir produto: " . $conexao->error);
            }
        
            // 2. Atualizar o estoque na tabela tbprodutos
            $sqlAtualizaEstoque = "UPDATE tbprodutos 
                                   SET qtProduto = qtProduto - $quantidade 
                                   WHERE idProduto = $idProduto";
            if ($conexao->query($sqlAtualizaEstoque) === FALSE) {
                throw new Exception("Erro ao atualizar estoque: " . $conexao->error);
            }
        }
        

        // 3. Inserir as parcelas na tabela 'vendas_parcelas'
        //$parcelas = $_POST['parcelas']; // Aqui assumimos que você está enviando as parcelas como um 
        foreach ($_POST['parcelas'] as $parcela) {
        //foreach ($parcelas as $parcela) {
            $vencimento = $parcela['vencimento'];
            $valorParcela = $parcela['valorParcela'];
            
            
            $sqlParcela = "INSERT INTO tbvendas_parcelas (idVenda, idCliente, nomeCliente, formaPgto, vencimento, valorParcela) 
                           VALUES ('$idVenda', '$idCliente', '$nomeCliente', '$formaPgto', '$vencimento', '$valorParcela')";
            if ($conexao->query($sqlParcela) === FALSE) {
                throw new Exception("Erro ao inserir parcela: " . $conexao->error);
            }
        }

        // Se tudo deu certo, comita a transação
        $conexao->commit();
        echo "Venda registrada com sucesso!";
    } catch (Exception $e) {
        // Se houver erro, faz o rollback da transação
        $conexao->rollback();
        echo "Erro ao registrar a venda: " . $e->getMessage();
    }
}

// 3. Inserir as parcelas na tabela 'vendas_parcelas'
if (isset($_POST['vencimento']) && is_array($_POST['vencimento']) && isset($_POST['valorParcela']) && is_array($_POST['valorParcela'])) {
    $vencimentos = $_POST['vencimento'];
    $valoresParcela = $_POST['valorParcela'];

    if (count($vencimentos) === count($valoresParcela)) {
        foreach ($vencimentos as $index => $vencimento) {
            $valorParcela = str_replace(',', '.', $valoresParcela[$index]); // Converte vírgula para ponto para o banco de dados

            $sqlParcela = "INSERT INTO tbvendas_parcelas (idVenda, idCliente, nomeCliente, formaPgto, vencimento, valorParcela)
                           VALUES ('$idVenda', '$idCliente', '$nomeCliente', '$formaPgto', '$vencimento', '$valorParcela')";
            if ($conexao->query($sqlParcela) === FALSE) {
                throw new Exception("Erro ao inserir parcela: " . $conexao->error);
            }
        }
    } else {
        throw new Exception("Erro: A quantidade de vencimentos não corresponde à quantidade de valores das parcelas.");
    }
} else {
    throw new Exception("Erro: Nenhuma informação de parcela foi enviada.");
}

?>
