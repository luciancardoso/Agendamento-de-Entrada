<?php 
    include_once '../public/dependencias.php';
    include_once '../config.php';


    session_start();
    if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['usuario'];

?>

<nav class="navbar fixed-top navbar-light bg-light">
        <a class="navbar-brand" href="../painel.php"><img src="../Assets/img/logoAduana.png" width="200" height="70" alt="Logo da Aduana"></a>
        <ul class="nav">
            <li>
              <a href="../sair.php" title="Sair">
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
    Cadastrar Motorista <i class="fa fa-users"></i>
</h2>

<form method="post" action="../controller/insert_motorista.php">
    <div class="container">
        <div class="form-row">
            <!-- <div class="col-md-6">
                Motorista: <i class="fa fa-user"></i>
                <input class="form-control" type="text" name="motorista" required autofocus>
            </div> -->
            <div class="col-md-6">
                Nome do Motorista: <i class="fa fa-user"></i>
                <input class="form-control" type="text" name="nome_motorista" required autofocus>
            </div>
            <div class="col-md-4">
                CPF: <i class="fa fa-address-card"></i>
                <!-- <input class="form-control" type="text" name="cpf" required id="cpf"> -->
                <input class="form-control" type="text" name="cpf" required id="cpf">
            </div>
            <div class="col-md-4">
                Telefone: <i class="fab fa-whatsapp"></i>
                <input class="form-control" type="tel" name="telefone" required id="phone" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" />
            </div>
            <div class="col-md-2">
                <!-- <label for="">Selecione seu Estado:</label> -->
                Sexo: <i class="fas fa-map-marker"></i>
                    <select id="sexo" name="sexo" class="form-control">
                        <option selected disabled value="">Selecione</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Masculino">Masculino</option>
                    </select>
            </div>
            <div class="col-md-4">
                Dt. de Nascimento: <i class="fa fa-calendar"></i>
                <input class="form-control" type="date" name="dt_nascimento" required>
            </div>
            <div class="col-md-4">
                TRANSPORTADORA: <i class="fa fa-calendar"></i>
                <select class="input-padrao form-control" name="id_transportadora" id="id_transportadora" required>
                    <option selected disabled value="">SELECIONE</option>
                    <?php
                        $result_cat_post = "SELECT * FROM transportadora";
                        $resultado_cat_post = mysqli_query($conexao, $result_cat_post);
                        while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
                            echo '<option value="'.$row_cat_post['id'].'">'.$row_cat_post['transportadora'].'</option>';
                        }
                    ?>
                </select>
            </div>
            
            <div class="col-md-12">
                Endereço: <i class="fa fa-map"></i>
                <input class="form-control" type="text" name="endereco" required><br>
            </div>
            <div class="col-md-4">
                <a class="btn btn-success btn-lg" href="../cadastro.php">
                    Voltar <i class="fa fa-arrow-circle-left"></i>
                </a>
            </div>
            <div class="col-md-8 text-right">
                <button class="btn btn-primary btn-lg">
                    Cadastrar <i class="fa fa-user-plus"></i>
                </button>
            </div>
        </div>
    </div>
</form>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

<script type="text/javascript">
    $(document).ready(function (){
        $("#cpf").mask("000.000.000-00");
        $("#phone").mask("(00) 0000-0000");
    });
    
</script>

<script>
        $(document).ready(function() {
            $('#sexo').select2();
        });
</script>
