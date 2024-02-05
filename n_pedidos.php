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

    
    if(isset($_POST['submit']))
    {
         //   print_r('Nome: ' . $_POST['nome']);
         //   print_r('<br>');
         //   print_r('numero: ' . $_POST['numero']);
         //   print_r('<br>');
         //   print_r('entrega: ' . $_POST['entrega']);
         //   print_r('<br>');
         //   print_r('url: ' . $_POST['pdf']);
           

        include_once('config.php');

        $nome = $_POST['nome'];
        $numero = $_POST['numero'];
        $entrega = $_POST['entrega'];
        $pdf = $_POST['pdf'];
        $status = $_POST['status'];

        $result = mysqli_query($conexao, "INSERT INTO pedidos(nome,numero,entrega,pdf,status)
        VALUES ('$nome','$numero','$entrega','$pdf','$status')");

        header("Location: sistema.php");
    }
?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HD FLEX | NOVO PEDIDO</title>
    <style>
        body{
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
            margin: 0px;
            font-family: Arial, Helvetica, sans-serif;
            width: 100vw;;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputUser{
            text-align: center;
            font-size: 25px;
            width: 80%;
            height: 40px;
        }
        .labelUser{
            display: flex;
            margin-left: 35px;
            font-weight: bold;
            font-size: 15px;
            margin-bottom: 5px;
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
        #submit{
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(20, 83, 112));
            width: 80%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right, rgb(16, 113, 168), rgb(14, 57, 77));
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
            <?php 
            echo "<h2>Usuário: $logado</h2>";
            ?>
        </div>

        <a href="sistema.php" class="btn" >SAIR</a>
    </div>

    <div class="box">
        <form action="n_pedidos.php" method="POST">
            <fieldset>
                <legend>Novo Pedido </legend>
                <br>
                <div class="inputbox">
                    <label for="nome" class="labelUser">Nome Cliente</label>
                    <input type="text" name="nome" id="nome" class="inputUser" required autocomplete="off">
                </div>
                <br>
                <br>
                <div class="inputbox">
                    <label for="numero" class="labelUser">N° Pedido</label>
                    <input type="number" name="numero" id="numero" class="inputUser" required autocomplete="off">
                </div>
                <br>
                <br>
                <div class="inputbox">
                    <label for="entrega" class="labelUser">Data de entrega</label>
                    <input type="date" name="entrega" id="entrega" class="inputUser" required autocomplete="off">
                </div>
                <br>
                <br>
                <div class="inputbox">
                    <label for="pdf" class="labelUser" autocomplete="off">Link pedido</label>
                    <input type="url" name="pdf" id="pdf" class="inputUser" required placeholder="https://" autocomplete="off">
                </div>
                <br>
                <br>
                <div class="inputbox">
                    <label for="pdf" class="labelUser">Pronto</label>
                    <input type="text" name="status" id="status" class="inputUser" value="NÃO">
                </div>
                <br>
                <input type="submit" id="submit" name="submit" value="Enviar Pedido">
            </fieldset>
        </form>
    </div>

    <p class="assinatura">STFW WSB - V:0001 - BETA</p>

    <!--Desenvolvido por: WBS INC.-->

</body>
</html>