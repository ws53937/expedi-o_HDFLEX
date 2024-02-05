<?php

    $dbHost = 'Localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'server_01_ws';

    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

    
    // TESTE DE CONECXÃO

    //if($conexao->connect_errno)
    //{
    //    echo "Erro";
    //}
    //else
    //{
    //    echo "Conexão efetuada com sucesso";
    //}
?>