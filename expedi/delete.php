<?php
include("config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conexao->prepare("DELETE FROM pedidos WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Registro excluído com sucesso.";
    } else {
        echo "Erro ao excluir o registro: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID do registro não fornecido.";
}

$conexao->close();
?>
