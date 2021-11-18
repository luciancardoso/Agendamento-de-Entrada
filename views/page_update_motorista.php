<?php
include_once '../public/dependencias.php';

include_once '../model/Conexao.php';
include_once '../model/Manager.php';

$m = new Manager();

    session_start();
    if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['usuario'];

$id = $_POST['id'];
?>

<nav class="navbar fixed-top navbar-light bg-light">
        <a class="navbar-brand" href="../painel.php"><img src="../Assets/img/logoAduana.png" width="200" height="70" alt="Logo da Aduana"></a>
        <ul class="nav">
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

<h2 class="text-center">
    Alterar Motorista <i class="fa fa-List"></i>
</h2>

<form method="post" action="../controller/update_motorista.php">
    <div class="container">
        <div class="form-row">

            <?php foreach ($m->getInfo('motoristas', $id) as $c):?>
            <div class="col-md-6">
            Nome do Motorista: <i class="fa fa-user"></i>
                <input class="form-control" type="text" name="nome_motorista" required autofocus value="<?= $c['nome_motorista']?>">
            </div>
            <div class="col-md-4">
                CPF: <i class="fa fa-address-card"></i>
                <input class="form-control" type="text" name="cpf" required id="cpf" value="<?= $c['cpf']?>">
            </div>
            <div class="col-md-4">
                Telefone: <i class="fab fa-whatsapp"></i>
                <input class="form-control" type="tel" name="telefone" required id="phone" value="<?= $c['telefone']?>">
            </div>
            <div class="col-md-2">
                <!-- <label for="">Selecione seu Estado:</label> -->
                Selecione Sexo: <i class="fas fa-map-marker"></i>
                <select id="sexo" name="sexo" class="form-control">
                    <option selected disabled value="">Selecione</option>
                    <option value="Feminino">Feminino</option>
                    <option value="Masculino">Masculino</option>
                </select>
            </div>
            <div class="col-md-4">
                Dt. de Nascimento: <i class="fa fa-calendar"></i>
                <input class="form-control" type="date" name="dt_nascimento" required value="<?= $c['dt_nascimento']?>">
            </div>
            <div class="col-md-12">
                Endereço: <i class="fa fa-map"></i>
                <input class="form-control" type="text" name="endereco" required value="<?= $c['endereco']?>"><br>
            </div>
            <input type="hidden" name="id" value="<?= $c['id']?>">
            <?php endforeach;?>
            <div class="col-md-4">
                <a class="btn btn-primary btn-lg" href="../cadastro-motorista.php">
                    Voltar <i class="fa fa-arrow-circle-left"></i>
                </a>
            </div>
            <div class="col-md-8 text-right">
                <button class="btn btn-warning btn-lg">
                    Alterar Motorista <i class="fa fa-user-edit"></i>
                </button>
            </div>
        </div>
    </div>
</form>
