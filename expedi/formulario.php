<?php

    if(isset($_POST['submit']))
    {
        //    print_r('Nome: ' . $_POST['nome']);
        //    print_r('<br>');
        //    print_r('Email: ' . $_POST['email']);
        //    print_r('<br>');
        //    print_r('Telefone: ' . $_POST['telefone']);
        //    print_r('<br>');
        //    print_r('Sexo: ' . $_POST['genero']);
        //    print_r('<br>');
        //    print_r('Data de Naciemnto: ' . $_POST['data_nacimento']);
        //    print_r('<br>');
        //    print_r('Cidade: ' . $_POST['cidade']);
        //    print_r('<br>');
        //    print_r('Estado: ' . $_POST['estado']);
        //    print_r('<br>');
        //    print_r('Endereço: ' . $_POST['endereco']);

        include_once('config.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $senha = $_POST['senha'];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,telefone,senha)
        VALUES ('$nome','$email','$telefone','$senha')");

        header("Location: home.php");
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario | Cadastro</title>

    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 54, 71));
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
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .LabeLInput{
            position: relative;
            top: -20px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }

        .inputUser:focus ~ .LabeLInput, .inputUser:valid ~ .LabeLInput{
            opacity: 0;
        }
        #data_nacimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right, rgb(20, 147, 220), rgb(20, 83, 112));
            width: 100%;
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


    </style>

</head>
<body>
    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend><b>Cadastro de Usuario</b></legend>
                
                <br>

                <div class="inputbox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="LabeLInput">Nome</label>
                </div>


                <br><br>


                <div class="inputbox">
                    <input type="email" name="email" id="email" class="inputUser" required>
                    <label for="email" class="LabeLInput">Email</label>
                </div>
                <br><br>
                <div class="inputbox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="LabeLInput">Telefone</label>
                </div>
                <br>
                <br>
                <div class="inputbox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="LabeLInput">Senha</label>
                </div>
                <br><br>
                
                <input type="submit" name="submit" id="submit">

            </fieldset>
        </form>

    </div>
    
</body>
</html>