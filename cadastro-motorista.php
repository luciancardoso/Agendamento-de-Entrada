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
                    <i class="fas fa-sign-out-alt"></i>
                </span>
                <span class="text">Sair</span>
              </a>
            </li>
        </ul>
    </nav>
    <br><br>

<div class="container">   

    <h2 class="text-center">
        Lista de Motoristas Cadastrados <i class="fa fa-users"></i>
    </h2>

    <h5 class="text-left">
        <a href="views/page_motorista.php" class="btn btn-primary btn-xs">
        Cadastrar Motorista  <i class="fa fa-user-plus"></i>
        </a>
    </h5>

    <div class="table-responsive ">
        <table class="table-xl table-hover">
            <thead class="thead">
                <tr>
                    <!-- <th>Motorista</th> -->
                    <th>Id</th>
                    <th>Nome do Motorista</th>
                    <th>Cpf</th>
                    <th>Telefone</th>
                    <th>Sexo</th>
                    <th>Dt Nasc</th>
                    <th>Endereço</th>
                    <th colspan="3">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php foreach ($manager->listMotorista('motoristas') as $c):?>
                    <!-- <td><?= $c['motorista']; ?></td> -->
                    <td><?= $c['id']; ?></td>
                    <td><?= $c['nome_motorista']; ?></td>
                    <td><?= $c['cpf']; ?></td>
                    <td><?= $c['telefone']; ?></td>
                    <td><?= $c['sexo']; ?></td>
                    <td><?= date('d/m/Y', strtotime($c['dt_nascimento'])); ?></td>
                    <td><?= $c['endereco']; ?></td>
                    <td>
                        <form method="POST" action="views/page_update_motorista.php">
                            <input type="hidden" name="id" value="<?= $c['id']?>">
                            <button class="btn btn-warning btn-xs">
                                <i class="fa fa-user-edit"></i>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="controller/delete_costumer.php" onclick="return confirm('Você deseja excluir esta informação?')">
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