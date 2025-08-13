<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova conta a receber</title>
</head>
<body>
    <?php include_once '../includes/header.php'; ?>
    <br>
    <form action="inserir.php" method="post">
        <label for="venda_id">ID venda:</label>
        <input type="number" name="venda_id" id="venda_id">
        <label for="cliente_id">ID cliente</label>
        <input type="number" name="cliente_id" id="cliente_id">
        <label for="data_emissao">Data emissão</label>
        <input type="date" name="data_emissao" id="data_emissao"><br><br>
        <label for="numero_parcela">N. parcela</label>
        <input type="number" name="numero_parcela" id="numero_parcela">
        <label for="total_parcelas">Total de parcelas</label>
        <input type="number" name="total_parcelas" id="total_parcelas">
        <label for="valor_parcela">Valor</label>
        <input type="number" name="valor_parcela" id="valor_parcela" value="0.00" step="0.01">
        <label for="vencimento">vencimento</label>
        <input type="date" name="vencimento" id="vencimento"><br><br>
        <label for="valor_pago">Valor pago</label>
        <input type="number" name="valor_pago" id="valor_pago" value="0.00" step="0.01">
        <label for="data_pgto">Data pgto.</label>
        <input type="date" name="data_pgto" id="data_pgto">
        <label for="resto_pgto">Rest. pgto</label>
        <input type="number" name="resto_pgto" id="resto_pgto" step="0.01" readonly>
        <label>Forma de Pagamento:</label>
        <select id="forma_pagamento" name="forma_pgto" onchange="verificaPagamento()">
            <option value="">Selecione</option>
            <option value="dinheiro">Dinheiro</option>
            <option value="pix">Pix</option>
            <option value="cartao">Cartão</option>
            <option value="prazo">Prazo</option>
        </select>
        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="">Selecione</option>
            <option value="aberto">Aberto</option>
            <option value="pago">Pago</option>
            <option value="atrasado">Atrasado</option>
        </select><br><br>
        <button type="submit" name="salvar" value="salvar">Salvar</button>
    </form>

    <script>
        //selecionar inputs
        const valor_pago = document.getElementById('valor_pago');
        const valor_parcela = document.getElementById('valor_parcela');
        const resto_pgto = document.getElementById('resto_pgto');

        // Evita que os eventos entrem em loop
        let atualizando = false;

        //Calcula o restante do valor a pagar
        function calcularResto(){
            if (atualizando) return;
            const valor = parseFloat(valor_parcela.value) || 0;
            const pago = parseFloat(valor_pago.value) || 0;
            const diferenca = valor - pago;
            atualizando = true;
            resto_pgto.value = diferenca.toFixed(2);
            atualizando = false;
        }
        // Define os eventos de escuta
        valor_pago.addEventListener('input', () => {
        calcularResto();
        });
        valor_parcela.addEventListener('input', () => {
        calcularResto();
        });

        
    </script>
</body>
</html>