<?php
include_once 'model/Conexao.php';
include_once 'model/Manager.php';
include_once 'public/helper.php';

    $manager = new Manager();

    session_start();
    // print_r($_SESSION);
    if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['usuario'];


?>


<!DOCTYPE html>
<html>
<head>
    <?php include_once 'public/dependencias.php' ?>
    <link rel="icon" href="Assets/img/favicon.ico">
    <!-- <link rel="stylesheet" href="../Assets/css/painel.css"> -->
</head>
<body>
    <nav class="navbar fixed-top navbar-light bg-light">
        <a class="navbar-brand" href="painel.php"><img src="Assets/img/logoAduana.png" width="200" height="70" alt="Logo da Aduana"></a>
        <ul class="nav">
            <li>
                <a href="painel.php" title="Voltar">
                  <span class="icon-stack">
                  <i class="fas fa-reply"></i>
                  </span>
                  <span class="text">Voltar</span>
                </a>
            </li>
            <li>
              <a href="sair.php" title="Sair">
                <span class="icon-stack">
                    <i class="fa fa-user-edit"></i>
                </span>
                <span class="text">Sair</span>
              </a>
            </li>
        </ul>
    </nav>
    <br><br>

<div class="container">   

    <h2 class="text-center">
        Lista de E-mails Cadastrados <i class="fas fa-envelope"></i>
    </h2>

    <h5 class="text-right">
        <a href="views/page_email.php" class="btn btn-primary btn-xs">
            <i class="fa fa-user-plus"></i>
        </a>
        <!-- <a href="views/page_email.php" class="btn btn-warning btn-xs">
            <i class="fa fa-user-edit"></i>
        </a> -->
    </h5>

    <div class="table-responsive ">
        <table class="table-xl table-hover">
            <thead class="thead ">
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <!-- <th>Cnpj</th> -->
                    <th>E-mail</th>
                    <!-- <th>Estado</th> -->
                    <!-- <th>Dt Nasc</th> -->
                    <!-- <th>Endere??o</th> -->
                    <!-- <th>Telefone</th> -->
                    <th colspan="3">A????es</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php foreach ($manager->listEmails('tbemails') as $c):?>
                    <td><?= $c['id']; ?></td>
                    <td><?= $c['nome']; ?></td>
                    <!-- <td><?= $c['cnpj']; ?></td> -->
                    <td><?= $c['email']; ?></td>
                    <!-- <td><?= $c['estado']; ?></td> -->
                    <!-- <td><?= formatDate($c['dtnascimento']); ?></td> -->
                    <!-- <td><?= $c['endereco']; ?></td> -->
                    <!-- <td><?= $c['telefone']; ?></td> -->
                    <td>
                        <form method="POST" action="views/page_update_email.php">
                            <input type="hidden" name="id" value="<?= $c['id']?>">
                            <button class="btn btn-warning btn-xs">
                                <i class="fa fa-user-edit"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="controller/delete_costumer.php" onclick="return confirm('Voc?? deseja excluir esta informa????o?')">
                            <input type="hidden" name="id" value="<?= $c['id']?>">
                            <button class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>