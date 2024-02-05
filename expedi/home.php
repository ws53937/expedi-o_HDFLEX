<?php

    //if(isset($_POST['submit']))
    //{
    //    print_r('Nome: ' . $_POST['nome']);
    //    print_r('<br>');
    //    print_r('senha: ' . $_POST['pass']);
    //    print_r('<br>');
    //}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <link rel="imgs/prancheta-1-8.ico" href="" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HDFLEX | LOGIN</title>

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
        }

        form{
            width: 100%;
        }
        .box{
            text-align: center;
            color: white;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 25%;

        }

        .inputLabel{
            display: block;
        }

        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 80%;
            letter-spacing: 2px;
        }

        #submit{
            width: 175px;
            height: 30px;
            border: none;
            cursor: pointer;
            color: white;
            font-weight: bold;
            border-radius: 5px;
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
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
            width: 40%;
            margin-bottom: 20px;
        }

    </style>

</head>
<body>

    <video autoplay loop muted>
        <source src="imgs/AdobeStock_599767324 (1).mov" type="video/mp4">
        Seu navegador não suporta a tag de vídeo.
    </video>





    <div class="box">

        <img src="imgs/logo.png" alt="" class="logo">

        <form action="testeLog.php" method="POST">
            <fieldset>
                <legend>HD FLEX - EXPEDIÇÃO</legend>
                <br>
                <br>

                <div class="inputbox">
                    <label for="nome" class="inputLabel">Usuario</label>
                    <input type="text" name="nome" id="nome" class="inputUser" required autocomplete="off">
                </div>

                <br>
                <br>

                <div class="inputbox">
                    <label for="pass" class="inputLabel">Senha</label>
                    <input type="password" name="pass" id="pass" class="inputUser" required autocomplete="off">
                </div>
                
                <br>
                <br>

                <input type="submit" name="submit" id="submit" value="ENTRAR">

            </fieldset>
        </form>

    </div>

    <p class="assinatura">STFW WSB - V:0001 - BETA</p>

    <!--Desenvolvido por: WBS INC.-->
</body>
</html>