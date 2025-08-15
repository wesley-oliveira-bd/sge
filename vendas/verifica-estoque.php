<?php
include '../config/conexao.php';

$id_produto = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id_produto > 0) {
    $sql = "SELECT estoque FROM produtos WHERE id = '$id_produto'";
    $res = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($res);

    if ($row) {
        echo json_encode([
            "ok" => true,
            "estoque" => (int)$row['estoque']
        ]);
    } else {
        echo json_encode(["ok" => false, "estoque" => 0]);
    }
} else {
    echo json_encode(["ok" => false, "estoque" => 0]);
}
?>
