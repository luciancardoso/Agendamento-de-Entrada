<?php

    //include_once 'config.php';
    include_once 'model/Conexao.php';
    include_once 'model/Manager.php';
    include_once 'public/helper.php';
    //include_once 'public/helper.php';
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
<html lang="pt-BR">
<head>
    <?php include_once 'public/DependenciaPainel.php' ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Assets/img/favicon.ico">

    <!-- <link rel="stylesheet" href="Assets/css/painel.css"> -->
    <script src="https://kit.fontawesome.com/61d00844fc.js" crossorigin="anonymous"></script>

    <!-- BOOTSTRAP -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <script src="Assets/js/jQuery.js"></script>

</head>
<body>
    <header>
        <div class="logo">
            <a href="painel.php"><img src="Assets/img/logoAduana.png" width="200" height="70" alt="Logo da Aduana"></a>
        </div>

        <ul class="nav">
            <li>
                <a href="cadastro.php" title="Cadastrar">
                  <span class="icon-stack">
                    <i class="fas fa-user-plus"></i>
                  </span>
                  <span class="text">Cadastrar</span>
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
    </header>

    <main>
        <div class="container text-center">
            <h2>Sistema de Agendamento Eletrônico</h2>
            <div>
                <p>sobre entrada e retirada – <strong>CONTATO:</strong> (92) 3212-8500/ <strong>Depat.: </strong>ti.aduana@aduana-dsp.com.br</p>
            </div>
            <div class="botoes">
                <div class="button__entrada">
                    <a href="entrada.php">Entrada</a>
                </div>
                <div class="button__saida">
                    <a href="checklist.php">Fazer ChekList</a>
                </div>
            </div>
        </div>
            
        <div class="container text-center">
			<h2>Agendamentos</h2>
			<span id="conteudo"></span>
		</div>
        <br>
		
		<script>
			var qnt_result_pg = 5; //quantidade de registro por página
			var pagina = 1; //página inicial
			$(document).ready(function () {
				listar_usuario(pagina, qnt_result_pg); //Chamar a função para listar os registros
			});
			
			function listar_usuario(pagina, qnt_result_pg){
				var dados = {
					pagina: pagina,
					qnt_result_pg: qnt_result_pg
				}
				$.post('lista_agendamento.php', dados , function(retorna){
					//Subtitui o valor no seletor id="conteudo"
					$("#conteudo").html(retorna);
				});
			}
		</script>

    </main>
    
    <footer class="footer-distributed">
        <div class="footer-left">

            <div class="footer-right">

				<!-- <a href="#"><i class="fa fa-facebook"></i></a> -->
				<!-- <a href="#"><i class="fa fa-twitter"></i></a> -->
				<a href="https://www.linkedin.com/company/aduana-despachos-e-assessoria-em-com-rcio-exterior-ltda/mycompany/" target="_blank"><i class="fa fa-linkedin"></i></a>
				<!-- <a href="#"><i class="fa fa-github"></i></a> -->

			</div>

            <p class="footer-links">
                <img src="Assets/img/logoAduana.png" width="250" alt=""><br>
                <a class="link-1" href="http://www.aduana-dsp.com.br/" target="_blank">Desenvolvido por Aduana Despachos</a>

                <!--<a href="#">Blog</a>

                <a href="#">Pricing</a>

                <a href="#">About</a>

                <a href="#">Faq</a>

                <a href="#">Contact</a>-->
            </p>

            <p>Av. Autaz Mirim, 1225, Distrito Industrial I</p>
            <p>CEP: 69075-155 – Manaus – AM</p>
            <p>Aduana Despachos e Assessoria de Comércio Exterior Ltda.</p><br>
            <p>&copy; Todos os direitos reservados - 2021</p>
        </div>
    </footer>

    <?php
        function data($data){
            return date("d/m/Y - H:i", strtotime($data));
        }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.2/angular.min.js'></script>

</body>
</html>