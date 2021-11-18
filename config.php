<?php
    error_reporting(0);

    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'testeweb';

    $conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

    // checando conexão
    if(!$conexao){
        die("Falha na conexão: " . mysqli_connect_error());
    }

?>