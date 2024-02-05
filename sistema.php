<?php
    session_start();
    //print_r($_SESSION);
    if((!isset($_SESSION['nome']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['nome']);
        unset($_SESSION['senha']);
        header('Location: home.php');
    }
    $logado = $_SESSION['nome'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HD FLEX | MENU</title>
    <style>
        body{
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            margin: 0px;
            font-family: Arial, Helvetica, sans-serif;
            width: 100vw;;
            height: 100vh;
            text-align: center;
        }
        .tooop{
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

        .menu{
            margin-top: 50px;
            margin-bottom: 50px;
            height: 20vh;
            display: flex;
            justify-content: space-around;
            align-items: center;

        }
        .novo_pedido{
            box-shadow: 10px 10px 15px 0px black ;
            text-decoration: none;
            color: white;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
            background-color: cornflowerblue;
            width: 10%;
            height: 70%;
            border-radius: 10px;

        }
        .novo_pedido img{
            width: 40%;
        }
        .pedido img{
            margin-bottom: -15px;
            width: 40%;
        }
        .novo_pedido p{
            margin: 0px;
            font-weight: bold;
            font-size: 20px;
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

        .btn-pesquisa{
            box-shadow: 10px 10px 15px 0px black ;
            background-color: cornflowerblue;
            
            display: flex;
            flex-direction: row;
            width: 25%;
            height: 60%;
            text-align: center;
            align-items: center;
            border-radius: 5px;
        }
        .psq{
            justify-content: center;
            width: 90%;
            height: 100%;
            display: flex;
            align-items: center;
        }

        .psq1{
            width: 100%;
            height: 100%;
        }
        .btn-segundary{
            margin-left: 10px;
            width: 100px;
            height: 50%;
            background-color: brown;
            border: none;
            color: white;
            border-radius: 5px;
        }
        .barrapsq{
            margin-left: 40px;
            border-radius: 5px;
            border: none;
            text-align: center;
            font-size: 30px;
            width: 80%;
            height: 50%;
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
        .logo{
            margin-top: 20px;
            width: 250px;
        }



    </style>
</head>
<body>


    <video autoplay loop muted>
        <source src="imgs/AdobeStock_214619220.mov" type="video/mp4">
    </video>

    <div class="tooop">
        
        <div class="usuario">
            <?php 
            echo "<h2>Usuário: $logado</h2>";
            ?>
        </div>

        <a href="sair.php" class="btn" >SAIR</a>
    </div>

    <img src="imgs/logo.png" alt="" class="logo">

    <div class="menu">

        <a href="n_pedidos.php" class="novo_pedido">
            <img src="imgs/ordem.png" alt="">
            <p>Novo Pedido</p>
        </a>

        <a href="pesquisa2.php" class="novo_pedido pedido">
            <img src="imgs/pedido.png" alt="">
            <p>Pedidos</p>
        </a>

        <a href="formulario.php" class="novo_pedido pedido">
            <img src="imgs/funcoes.png" alt="">
            <p>Outros</p>
        </a>

        <div class="btn-pesquisa">
            <form action="pesquisa.php" method="POST" class="psq1">
                <div class="psq">
                    <input type="number" class="barrapsq" name="pesquisar" placeholder="N° Pedido">

                    <button class="btn-segundary mt-3 btn-block">BUSCAR</button>
                </div>
            </form>
        </div>

    </div>


    <p class="assinatura">STFW WSB - V:0001 - BETA</p>

    <!--Desenvolvido por: WBS INC.-->
    
</body>
</html>