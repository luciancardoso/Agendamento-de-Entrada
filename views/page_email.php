<?php include_once '../public/dependencias.php';


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
    Cadastrar E-mails <i class="fa fa-users"></i>
</h2>

<form method="post" action="../controller/insert_emails.php">
    <div class="container">
        <div class="form-row">
            <!-- <div class="col-md-6">
                Motorista: <i class="fa fa-user"></i>
                <input class="form-control" type="text" name="motorista" required autofocus>
            </div> -->
            <div class="col-md-6">
                Nome: <i class="fa fa-user"></i>
                <input class="form-control" type="text" name="nome" required autofocus>
            </div>
            <!-- <div class="col-md-4">
                CNPJ: <i class="fa fa-address-card"></i>
                <input class="form-control" type="text" name="cnpj" required id="cnpj">
            </div> -->
            <div class="col-md-4">
                E-Mail: <i class="fa fa-envelope"></i>
                <input class="form-control" type="email" name="email" required>
            </div>
            <!-- <div class="col-md-2">
                Selecione seu Estado: <i class="fas fa-map-marker"></i>
                    <select id="estado" name="estado" class="form-control">
                        <option selected disabled value="">Selecione</option>
                        <option value="AC">AC - Acre</option>
                        <option value="AL">AL - Alagoas</option>
                        <option value="AP">AP - Amapá</option>
                        <option value="AM">AM - Amazonas</option>
                        <option value="BA">BA - Bahia</option>
                        <option value="CE">CE - Ceará</option>
                        <option value="DF">DF - Distrito Federal</option>
                        <option value="ES">ES - Espírito Santo</option>
                        <option value="GO">GO - Goiás</option>
                        <option value="MA">MA - Maranhão</option>
                        <option value="MT">MT - Mato Grosso</option>
                        <option value="MS">MS - Mato Grosso do Sul</option>
                        <option value="MG">MG - Minas Gerais</option>
                        <option value="PA">PA - Pará</option>
                        <option value="PB">PB - Paraíba</option>
                        <option value="PR">PR - Paraná</option>
                        <option value="PE">PE - Pernambuco</option>
                        <option value="PI">PI - Piauí</option>
                        <option value="RJ">RJ - Rio de Janeiro</option>
                        <option value="RN">RN - Rio Grande do Norte</option>
                        <option value="RS">RS - Rio Grande do Sul</option>
                        <option value="RO">RO - Rondônia</option>
                        <option value="RR">RR - Roraima</option>
                        <option value="SC">SC - Santa Catarina</option>
                        <option value="SP">SP - São Paulo</option>
                        <option value="SE">SE - Sergipe</option>
                        <option value="TO">TO - Tocantins</option>
                    </select>
            </div> -->
            <!-- <div class="col-md-4">
                Dt. de Nascimento: <i class="fa fa-calendar"></i>
                <input class="form-control" type="date" name="dtnascimento" required>
            </div> -->
            <!-- <div class="col-md-4">
                Telefone: <i class="fab fa-whatsapp"></i>
                <input class="form-control" type="text" name="Telefone" required id="phone">
            </div> -->
            <!-- <div class="col-md-12">
                Endereço: <i class="fa fa-map"></i>
                <input class="form-control" type="text" name="Endereco" required><br>
            </div> -->
            <div class="col-md-4 p-2">
                <a class="btn btn-success btn-lg" href="../emails.php">
                    Voltar <i class="fa fa-arrow-circle-left"></i>
                </a>
            </div>
            <div class="col-md-8 text-left p-2">
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
        // $("#cpf").mask("000.000.000-00");
        $("#cnpj").mask("00.000.000.0000/00");
        $("#phone").mask("(00) 00000-0000");
    });
</script>

<script>
        $(document).ready(function() {
            $('#estado').select2();
        });
</script>

