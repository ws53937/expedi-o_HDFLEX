<?php
session_start();

// Verificar se o usuário está autenticado
if (!isset($_SESSION['nome']) || !isset($_SESSION['senha'])) {
    unset($_SESSION['nome']);
    unset($_SESSION['senha']);
    header('Location: home.php');
}

// Obter nome do usuário logado
$logado = $_SESSION['nome'];

// Função para separar pedidos com status "PRONTO"
function separarPedidosProntos($pedidos) {
    $pedidosProntos = array();
    $outrosPedidos = array();

    foreach ($pedidos as $pedido) {
        if ($pedido['status'] === 'PRONTO') {
            $pedidosProntos[] = $pedido;
        } else {
            $outrosPedidos[] = $pedido;
        }
    }

    return array('prontos' => $pedidosProntos, 'outros' => $outrosPedidos);
}

// Incluir arquivo de configuração do banco de dados
include("config.php");

// Consultar pedidos no banco de dados
$sql = "SELECT * FROM pedidos";
$resultado = mysqli_query($conexao, $sql);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $pedidos = array();

    // Armazenar resultados da consulta em um array
    while ($row = mysqli_fetch_assoc($resultado)) {
        $pedidos[] = $row;
    }

    // Separar pedidos prontos dos demais
    $pedidosSeparados = separarPedidosProntos($pedidos);
    $pedidosProntos = $pedidosSeparados['prontos'];
    $outrosPedidos = $pedidosSeparados['outros'];

    // Exibir pedidos prontos
    if (!empty($pedidosProntos)) {
        echo "<h2>Pedidos Prontos</h2>";
        exibirTabelaPedidos($pedidosProntos);
    }

    // Exibir demais pedidos
    if (!empty($outrosPedidos)) {
        echo "<br>";
        echo "<br>";
        echo "<h2>PEDIDOS</h2>";
        exibirTabelaPedidos($outrosPedidos);
    }
} else {
    echo "Nenhum Pedido Localizado";
}



// Função para exibir a tabela de pedidos
function exibirTabelaPedidos($pedidos) {
    echo "<table class='table'>
          <tr>
          <th>N° Pedido</th>
          <th>Cliente</th>
          <th>Data de Entrega</th>
          <th>PDF</th>
          <th>PRONTO</th>
          </tr>";

    foreach ($pedidos as $pedido) {
        $statusClass = ($pedido['status'] === 'PRONTO') ? 'pronto' : '';
        $urgencyClass = verificarUrgencia($pedido['entrega']);
        
        echo "<tr class='$statusClass $urgencyClass'><td>" . $pedido['numero'] . "</td>";
        echo "<td>" . $pedido['nome'] . "</td>";
        echo "<td>" . $pedido['entrega'] . "</td>";
        $pdf_link = $pedido['pdf'];
        echo "<td><a href='$pdf_link' target='_blank'>👀</a></td>";
        echo "<td>" . $pedido['status'] . "</td></tr>";
    }

    echo "</table>";
}

// Função para verificar a urgência com base na data de entrega
function verificarUrgencia($dataEntrega) {
    $urgencyClass = '';
    $deliveryDate = strtotime($dataEntrega);
    $currentTime = time();
    $timeDiff = $deliveryDate - $currentTime;
    $remainingDays = floor($timeDiff / (60 * 60 * 24));

    if ($remainingDays < 1) {
        $urgencyClass = 'urgente';
    }

    return $urgencyClass;
}

// Fechar conexão com o banco de dados
mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HD FLEX | PEDIDOS</title>
    <style>
        /* ... (existing styles) ... */
        tr.pronto {
            background-color: green;
            color: white;
        }
        tr.urgente {
            background-color: red;
            color: white;
        }
        body {
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            margin: 0px;
            font-family: Arial, Helvetica, sans-serif;
            width: 100vw;
            text-align: center;
            height: 90vh;
        }
        table {
            text-align: center;
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
        .assinatura {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size: 10px;
            display: flex;
            position: fixed;
            color: white;
            bottom: 5px;
            left: 45%
        }
        .tooop {
            width: 100%;
            position: fixed;
            top: 0px;
            background-color: white;
            height: 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn {
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
        .usuario {
            margin-left: 10px;
        }
        a{
            color: white;
            text-decoration: none;
            font-weight: bold;
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
        <a href="sistema.php" class="btn">SAIR</a>
    </div>

    <!-- Corpo do HTML (conteúdo da página) -->
    <!-- ... (código HTML existente) ... -->

    <p class="assinatura">STFW WSB - V:0001 - BETA</p>
</body>
</html>









