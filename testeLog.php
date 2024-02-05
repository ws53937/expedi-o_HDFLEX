<?php 
    session_start();
    //print_r($_REQUEST);
    
    if(isset($_POST['submit']) && !empty($_POST['nome']) && !empty($_POST['pass']))
    {
        //Acessa
        include_once('config.php');
        $nome = $_POST['nome'];
        $senha = $_POST['pass'];

        //print_r('Usuario: ' .$user);
        //print_r('<br>');
        //print_r('senha: ' .$senha);
        $sql = "SELECT * FROM usuarios WHERE nome = '$nome' and senha = '$senha'";

        $result = $conexao->query($sql);

        //print_r($sql);
        //print_r($result);

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['nome']);
            unset($_SESSION['senha']);
            header('Location: home.php');
        }
        else {
            $_SESSION['nome'] = $nome;
            $_SESSION['senha'] = $senha;
            header('Location: sistema.php');
        }
    }
    else
    {
        //Não acessa
        header('Location: home.php');
    }
?>