<?php 
    set_time_limit(0);
    include_once('../../../db/conexao.php');

    $extensoesValidas = array(".jpg", ".jpeg", ".png", ".bmp");
    $caminhoAbsoluto = "../fotos-produtos/";
    $tamanhoBytes = 5000000;

    if (isset($_FILES['arquivo']['name'])):
        $idProduto = $_POST['idFoto']; // seu formulário envia "idFoto", não "idProduto"!
        $nomeArquivo = $_FILES['arquivo']['name'];
        $extensao = strrchr($nomeArquivo, '.'); // Corrigido aqui: usa $nomeArquivo
        $tamanhoArquivo = $_FILES['arquivo']['size'];
        $arquivoTemporario = $_FILES['arquivo']['tmp_name'];
        $nomeArquivoNovo = $idProduto . $extensao;

        if ($tamanhoArquivo > $tamanhoBytes):
            die("Tamanho da imagem maior do que o permitido (5MB);aviso");
        endif;

        if (!in_array(strtolower($extensao), $extensoesValidas)):
            die("Extensão do arquivo inválida. Extensões permitidas: .jpg, .bmp, .png;aviso");
        endif;

        if (move_uploaded_file($arquivoTemporario, $caminhoAbsoluto . $nomeArquivoNovo)):
            $sql = "UPDATE tbprodutos SET fotoProduto='{$nomeArquivoNovo}' WHERE idProduto='{$idProduto}'";
            mysqli_query($conexao, $sql) or die("Erro ao atualizar banco de dados;erro");
            echo "./paginas/produto/fotos-produtos/{$nomeArquivoNovo};concluido";
        else:
            die("O arquivo não pode ser salvo no servidor.;erro");
        endif;

    else:
        die("Selecione um arquivo válido.;aviso");
    endif;
?>
