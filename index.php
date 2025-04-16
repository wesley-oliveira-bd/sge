<?php 
    include("db/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGE 1.0</title>
</head>
<body>

    <header>
        <h1>SGE - Sistema de Gerenciamento de Estoque 1.0</h1>
        <nav>
            <a href="index.php?menuop=home">Home</a>
            <a href="index.php?menuop=cliente">Clientes</a>
            <a href="index.php?menuop=fornecedores">Fornecedores</a>
            <a href="index.php?menuop=produtos">Produtos</a>
        </nav>
    </header>

    <main>
        <hr>
        <?php 
            $menuop = (isset($_GET["menuop"]))?$_GET["menuop"]:"home";
            switch ($menuop) {
                case 'home':
                    include("paginas/home/home.php");
                    break;
                case 'cliente':
                    include("paginas/cliente/clilente.php");
                    break;
                case 'fornecedores':
                    include("paginas/fornecedor/fornecedor.php");
                    break;
                case 'produtos':
                    include("paginas/produto/produtos.php");
                    break;
                case 'cad-cliente':
                    include("paginas/cliente/cad-cliente.php");
                    break;
                case 'cad-fornecedor':
                    include("paginas/fornecedor/cad-fornecedor.php");
                    break;
                case 'cad-produtos':
                    include("paginas/produto/cad-produtos.php");
                    break;
                case 'inserir-produto':
                    include("paginas/produto/inserir-produto.php");
                    break;
                default:
                    # code...
                    break;
            }
        ?>

    </main>

</body>
</html>