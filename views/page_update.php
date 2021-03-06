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
    Alterar Transportadora <i class="fa fa-List"></i>
</h2>

<form method="post" action="../controller/update_costumer.php">
    <div class="container">
        <div class="form-row">

            <?php foreach ($m->getInfo('transportadora', $id) as $c):?>
            <!-- <div class="col-md-6">
                Motorista: <i class="fa fa-user"></i>
                <input class="form-control" type="text" name="motorista" required autofocus value="<?= $c['motorista']?>">
            </div> -->
            <div class="col-md-6">
                Nome da Transportadora: <i class="fa fa-user"></i>
                <input class="form-control" type="text" name="transportadora" required autofocus value="<?= $c['transportadora']?>">
            </div>
            <div class="col-md-4">
                CNPJ: <i class="fa fa-address-card"></i>
                <input class="form-control" type="text" name="cnpj" required id="cnpj" value="<?= $c['cnpj']?>">
            </div>
            <div class="col-md-6">
                E-Mail: <i class="fa fa-envelope"></i>
                <input class="form-control" type="email" name="email" required value="<?= $c['email']?>">
            </div>
            <!-- <div class="col-md-4">
                Dt. de Nascimento: <i class="fa fa-calendar"></i>
                <input class="form-control" type="date" name="dtnascimento" required value="<?= $c['dtnascimento']?>">
            </div> -->
            <div class="col-md-2">
                <!-- <label for="">Selecione seu Estado:</label> -->
                Selecione seu Estado: <i class="fas fa-map-marker"></i>
                    <select id="estado" name="estado" class="form-control">
                        <option selected disabled value="">Selecione</option>
                        <option value="AC">AC - Acre</option>
                        <option value="AL">AL - Alagoas</option>
                        <option value="AP">AP - Amap??</option>
                        <option value="AM">AM - Amazonas</option>
                        <option value="BA">BA - Bahia</option>
                        <option value="CE">CE - Cear??</option>
                        <option value="DF">DF - Distrito Federal</option>
                        <option value="ES">ES - Esp??rito Santo</option>
                        <option value="GO">GO - Goi??s</option>
                        <option value="MA">MA - Maranh??o</option>
                        <option value="MT">MT - Mato Grosso</option>
                        <option value="MS">MS - Mato Grosso do Sul</option>
                        <option value="MG">MG - Minas Gerais</option>
                        <option value="PA">PA - Par??</option>
                        <option value="PB">PB - Para??ba</option>
                        <option value="PR">PR - Paran??</option>
                        <option value="PE">PE - Pernambuco</option>
                        <option value="PI">PI - Piau??</option>
                        <option value="RJ">RJ - Rio de Janeiro</option>
                        <option value="RN">RN - Rio Grande do Norte</option>
                        <option value="RS">RS - Rio Grande do Sul</option>
                        <option value="RO">RO - Rond??nia</option>
                        <option value="RR">RR - Roraima</option>
                        <option value="SC">SC - Santa Catarina</option>
                        <option value="SP">SP - S??o Paulo</option>
                        <option value="SE">SE - Sergipe</option>
                        <option value="TO">TO - Tocantins</option>
                    </select>
            </div>
            <div class="col-md-4">
                Telefone: <i class="fab fa-whatsapp"></i>
                <input class="form-control" type="text" name="telefone" required id="phone" value="<?= $c['telefone']?>">
            </div>
            <div class="col-md-12">
                Endere??o: <i class="fa fa-map"></i>
                <input class="form-control" type="text" name="endereco" required value="<?= $c['endereco']?>"><br>
            </div>
            <input type="hidden" name="id" value="<?= $c['id']?>">
            <?php endforeach;?>
            <div class="col-md-4">
                <a class="btn btn-primary btn-lg" href="../cadastro.php">
                    Voltar <i class="fa fa-arrow-circle-left"></i>
                </a>
            </div>
            <div class="col-md-8 text-right">
                <button class="btn btn-warning btn-lg">
                    Alterar Cliente <i class="fa fa-user-edit"></i>
                </button>
            </div>
        </div>
    </div>
</form>

