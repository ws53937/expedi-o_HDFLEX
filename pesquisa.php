<?php
session_start();
if ((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['nome']);
    unset($_SESSION['senha']);
    header('Location: home.php');
}
$logado = $_SESSION['nome'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HD FLEX | PESQUISA</title>
    <link rel="stylesheet" href="styles.css">

    <style>
        body{
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            margin: 0px;
            font-family: Arial, Helvetica, sans-serif;
            width: 100vw;;
            text-align: center;
            height: 90vh;
        }
        table{
            margin-top: 50px;
            width: 100vw;
            background-color: white;
            
        }
        table, th, td {
            
            border: 1px solid black;
        }

        td {
            padding: 10px 0px;
        }
        /*ASSINATURA PADRÃO PAGINA*/
        .assinatura{
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size: 10px;
            display: flex;
            position: fixed;
            color: white;
            bottom: 5px;
            left: 45%
        }
        .tooop{
            width: 100%;
            position: fixed;
            top: 0px;
            background-color: white;
            height: 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn{
            margin-right: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80%;
            width: 5%;
            font-size: 10px;
            background-color: brown;
            border-radius: 5px;
            text-decoration: none;
            color: white;
        }
        .usuario{
            margin-left: 10px;

        }
        /* ... (existing styles) ... */

        .edit-form-container {
            display: none;
            width: 400px;
            margin: 20px auto;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .edit-form-container h2 {
            text-align: center;
        }

        .edit-form-container label {
            display: block;
            margin-bottom: 5px;
        }

        .edit-form-container input {
            width: 90%;
            padding: 8px;
            margin-bottom: 10px;
        }

        .edit-form-container button {
            width: 100%;
            padding: 10px;
            background-color: brown;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        video {
            opacity: 0.5;
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
        }
    </style>
</head>
<body>
    <video autoplay loop muted>
        <source src="imgs/videog.mov" type="video/mp4">
    </video>

    <div class="tooop">
        <div class="usuario">
            <?php echo "<h2>Usuário: $logado</h2>"; ?>
        </div>
        <a href="sistema.php" class="btn" >SAIR</a>
    </div>

    <div class="edit-form-container">

        <h2>Editar Pedido</h2>
        <form action="edit.php" method="post">
            <input type="hidden" name="edit_id" id="edit_id" value="">
            <label for="edit_status">Status:</label>
            <input type="text" name="edit_status" id="edit_status" required>
            <button type="submit">Salvar</button>
        </form>

    </div>

    <div class="container">
        <?php
        include("config.php");

        $pesquisar = isset($_POST['pesquisar']) ? $_POST['pesquisar'] : '';

        $stmt = $conexao->prepare("SELECT * FROM pedidos WHERE numero LIKE ? LIMIT 5");
        $stmt->bind_param("s", $pesquisar);
        $stmt->execute();
        $resultado_pedidos = $stmt->get_result();

        echo "<table class='table'>
                        <thead>
                            <tr>
                                <th>Pedido</th>
                                <th>Nome</th>
                                <th>Entrega</th>
                                <th>Pedido PDF</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>";

        while ($rows_pedidos = mysqli_fetch_array($resultado_pedidos)) {
            echo "<tr>
                    <td>" . htmlspecialchars($rows_pedidos['numero']) . "</td>
                    <td>" . htmlspecialchars($rows_pedidos['nome']) . "</td>
                    <td>" . htmlspecialchars($rows_pedidos['entrega']) . "</td>
                    <td><a href='" . $rows_pedidos['pdf'] . "' target='_blank'>Pedido PDF</a></td>
                    <td>" . htmlspecialchars($rows_pedidos['status']) . "</td>
                    <td>
                        <button onclick='editPedido(" . htmlspecialchars($rows_pedidos['id']) . ")'>Pronto</button>
                        <button onclick='deletePedido(" . htmlspecialchars($rows_pedidos['id']) . ")'>Excluir</button>
                    </td>
                </tr>";
        }

        echo "</tbody>
                    </table>";
        ?>
    </div>

    <p class="assinatura">STFW WSB - V:0001 - BETA</p>

    <script>
        function editPedido(id) {
            var orderDetails = {
                status: "PRONTO"
                
            }

            document.getElementById('edit_id').value = id;
            document.getElementById('edit_status').value = orderDetails.status;

            
            document.querySelector('.edit-form-container').style.display = 'block';
        }

        function deletePedido(id) {
            if (confirm("Tem certeza de que deseja excluir este pedido?")) {

                window.location.href = "delete.php?id=" + id;
                window.location.href = "sistema.php?id=" + id;
            }
        }
    </script>

</body>
</html>
