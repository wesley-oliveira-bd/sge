<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        include '../config/conexao.php';

        $referencia = $_POST["referencia"];
        $descricao = $_POST["descricao"];
        $unid = $_POST["unid"];
        $custo = $_POST["custo"];
        $margem = $_POST["margem"];
        $venda = $_POST["venda"];
        $estoque = $_POST["estoque"];
        $obs = $_POST["obs"];
        $upload['pasta'] = "imagens/";
        $upload['tamanho'] = 1024*1024*2;
        $upload['extensao'] = array('jpg', 'png', 'jpeg');
        $upload['renomear'] = true;

        if (!empty($_FILES['arquivo']['name'])) {
            //valida a extenão do arquivo
            $explode = explode('.', $_FILES['arquivo']['name']);
            $aponta = end($explode);
            $extensao = strtolower($aponta);
            if(array_search($extensao, $upload['extensao'])===false){
                echo "Extensão do arquivo não aceita";
                exit;
            }
            //valida valida o tamanho do arquivo
            if($upload['renomear']===true){
                $nome_final = md5(time()).".$extensao";
            } else {
                $nome_final = $_FILES['arquivo']['name'];
            }
            if($_FILES['arquivo']['size'] > $upload['tamanho']){
                echo "Arquivo muito grande. Tamanho máximo aceito: 2mb";
                exit;
            }

            //move o arquivo para a pasta
            if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $upload['pasta'].$nome_final)){
                $url = $upload['pasta'].$nome_final;
            } else {
                echo "Erro ao gravar arquivo!";
                exit;
            }
        } else {
            // Se não enviou nenhum arquivo, usa a imagem padrão
            $url = $upload['pasta'] . 'sem_imagem.jpg';
        }

        $sql = "INSERT INTO produtos (referencia, descricao, unid, custo, margem, venda, estoque, obs, imagem) VALUES ( '$referencia', '$descricao', '$unid', '$custo', '$margem', '$venda', '$estoque', '$obs', '$url')";

        if(mysqli_query($conexao, $sql)){
            echo "Produto cadastrado com sucesso!";
            
            
        } else {
            echo "Erro ao cadastrar!" . mysqli_error($conexao);
            echo " <br/><a href='controle.php'>Voltar</a> ";
            
        }

        echo "<br/><a href='controle.php'>Voltar</a>";
    } else {
        echo "Acesso inválido!";
        echo " <br/><a href='controle.php'>Voltar</a> ";
    }
    
    ?>
</body>
</html>