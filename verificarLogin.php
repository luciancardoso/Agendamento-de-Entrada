<?php
    session_start();
    // print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['usuario']) && !empty($_POST['senha']))
    {
        // Acessar
        include_once('config.php');
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' and senha = MD5('$senha')";

        $result = $conexao->query($sql);

        if(mysqli_num_rows($result) < 1)
        {
            unset($_SESSION['usuario']);
            unset($_SESSION['senha']);
            header('Location: login.php');
        }
        else
        {
            $_SESSION['usuario'] = $usuario;
            $_SESSION['senha'] = $senha;
            header('Location: painel.php');
        }
    }
    else
    {
        // Não acessa
        header('Location: login.php');
    }
?>