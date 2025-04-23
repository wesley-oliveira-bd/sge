<?php 
    include("db/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    

    <title>SGE 1.0</title>
</head>
<body>

    <header class="bg-light">
        <div class="banner container">
            <div class="logo">S</div>
            <div class="textos">
                <div class="titulo">Sistema de Gerenciamento de Estoque</div>
                <div class="versao">versão 1.0 - Desenvolvido por Wesley de Oliveira</div>
            </div>
        </div>

        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="collapse navbar-collapse" id="conteudoNavBar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"><a class="nav-link" href="index.php?menuop=home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?menuop=cliente">Clientes</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?menuop=fornecedores">Fornecedores</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?menuop=produtos">Produtos</a></li>
                        <li class="nav-item"><a class="nav-link" href="index.php?menuop=nova-venda">Vendas</a></li>
                    </ul>
                </div>
            </nav>
        </div>  
        
    </header>

    <main>
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
                case 'editar-fornecedor':
                    include("paginas/fornecedor/editar-fornecedor.php");
                    break;
                case 'atualizar-fornecedor':
                    include("paginas/fornecedor/atualizar-fornecedor.php");
                    break;
                case 'excluir-fornecedor':
                    include("paginas/fornecedor/excluir-fornecedor.php");
                    break;
                case 'produtos':
                    include("paginas/produto/produtos.php");
                    break;
                case 'cad-cliente':
                    include("paginas/cliente/cad-cliente.php");
                    break;
                case 'editar-cliente':
                    include("paginas/cliente/editar-cliente.php");
                    break;
                case 'atualizar-cliente':
                    include("paginas/cliente/atualizar-cliente.php");
                    break;
                case 'excluir-cliente':
                    include("paginas/cliente/excluir-cliente.php");
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
                case 'excluir-produto':
                    include("paginas/produto/excluir-produto.php");
                    break;
                case 'inserir-fornecedor':
                    include("paginas/fornecedor/inserir-fornecedor.php");
                    break;
                case 'duplicar-produto':
                    include("paginas/produto/duplicar-produto.php");
                    break;
                case 'inserir-cliente':
                    include("paginas/cliente/inserir-cliente.php");
                    break;
                case 'editar-produto':
                    include("paginas/produto/editar-produto.php");
                    break;
                case 'atualizar-produto':
                    include("paginas/produto/atualizar-produto.php");
                    break;
                case 'nova-venda':
                    include("paginas/vendas/nova-venda.php");
                    break;
                default:
                case 'gravar-venda':
                    include("paginas/vendas/gravar-venda.php");
                    break;
                    # code...
                    break;
            }
        ?>

    </main>
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
            

    <script src="js/jquery.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/upload.js"></script>
    <script src="js/vendas.js"></script>
    


</body>
</html>