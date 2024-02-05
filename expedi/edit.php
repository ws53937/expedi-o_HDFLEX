<?php
    include("config.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $edit_id = $_POST['edit_id'];
        $edit_status = $_POST['edit_status'];

        $stmt = $conexao->prepare("UPDATE pedidos SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $edit_status, $edit_id);
        $stmt->execute();
        $stmt->close();


        header("Location: pesquisa.php");
        exit();
    }
?>
