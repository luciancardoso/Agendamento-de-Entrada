<?php

    include_once 'config.php';
    include_once 'model/Conexao.php';
    include_once 'model/Manager.php';
    include_once 'public/helper.php';
    //include_once 'public/helper.php';
    $manager = new Manager();

    session_start();
    //print_r($_SESSION);
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
    <title>Entrada - Sistema P&G</title>

    <link rel="stylesheet" href="Assets/css/painel.css">
    <link rel="stylesheet" href="Assets/css/calendario.css">

    <script src="Assets/js/index.js" defer></script>
    <script src="Assets/js/entrada.js" defer></script>
    <script src="https://kit.fontawesome.com/61d00844fc.js" crossorigin="anonymous"></script>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="Assets/js/jQuery.js"></script>

</head>
<body>
    <header>
        <div class="logo">
            <a href="painel.php"><img src="Assets/img/logoAduana.png" width="200" height="70" alt=""></a>
        </div>
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
    </header>

    <style>
        header {
            display: block;
            background: #6495ED;
            padding: 20px;
        }
        
        .botoes {
            display: flex;
            margin: auto;
        }

        .botoes a {
            color: #fff;
            font-size: 20px;
            font-weight: bold;
            text-decoration: none;
        }

        .button__entrada {
            border-radius: 30px;
            width: 150px;
            height: 40px;
            background-color: #0066ff;
            text-align: center;
            float: left;
            padding: 10px 5px 10px 10px;
            transition: .5s ease-in-out;
            cursor: pointer;
        }

        .button__saida {
            border-radius: 30px;
            width: 150px;
            height: 40px;
            margin-left: 12px;
            background-color: #ff3e3e;
            text-align: center;
            float: left;
            padding: 10px 5px 10px 10px;
            transition: .5s ease-in-out;
            cursor: pointer;
        }

        .button__entrada:hover {
            transform: scale(1.1);
            transition: .5s all;
        }

        .button__saida:hover {
            transform: scale(1.1);
        }

    </style>
    
    <div class="content">
        <h2 class="text-center">
            Realizar Check List <i class="fas fa-clipboard-list"></i>
        </h2>
        <br>

        <div class="row text-center">
            <div class="col-sm-6">
                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title">CHECK LIST- CAVALO MECÂNICO</h5>
                        <p class="card-text">Verifique Todas as Condições do Cavalo Mecânico, funciona como uma introdução a um conteúdo adicional.</p>
                        <a href="checkcavalo.php" class="btn btn-primary"><i class="fas fa-check-circle"></i> FAZER CHECKLIST</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title">CHECK LIST- CARRETA BAÚ</h5>
                        <p class="card-text">Verifique Todas as Condições da Carreta Baú, que funciona como uma introdução a um conteúdo adicional.</p>
                        <a href="checkcarretabau.php" class="btn btn-primary"><i class="fas fa-check-circle"></i> FAZER CHECKLIST</a>
                    </div>
                </div>
            </div>    
        </div>
        <br>

        <h2>Imprimir</h2>

        <!-- modal CheckList - Cavalo Mecânico -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Imprimir CheckList - Cavalo Mecânico
        </button>

        <br><br>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Página de Impressão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2>CheckList</h2>
                    <span id="conteudo"></span><br><br>
                    <!-- <select class="form-select" aria-label="Default select example" name="id_checklistcavalo" id="id_checklistcavalo">
                        <option selected>Filtrar por unidade</option>
                        <?php
                            $result_cat_post = "SELECT * FROM tb_checklistcavalo";
                            $resultado_cat_post = mysqli_query($conexao, $result_cat_post);
                            while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
                                echo '<option value="'.$row_cat_post['id_checklistcavalo'].'">'.$row_cat_post['id_checkUnidadeCav'].'</option>';
                            }
                        ?>
                    </select> -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
            </div>
        </div>
        </div>

        <!-- modal CheckList - Carreta Baú -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
        Imprimir CheckList - Carreta Baú
        </button>

        <br><br>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Página de Impressão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2>CheckList</h2>
                    <span id="conteudo1"></span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
            </div>
        </div>
        </div>

    </div>
	
	<script>
		var qnt_result_pg = 4; //quantidade de registro por página
		var pagina = 1; //página inicial
		$(document).ready(function () {
			listar_usuario(pagina, qnt_result_pg); //Chamar a função para listar os registros
		});
		
		function listar_usuario(pagina, qnt_result_pg){
			var dados = {
				pagina: pagina,
				qnt_result_pg: qnt_result_pg
			}
			$.post('lista_checklist.php', dados , function(retorna){
				//Subtitui o valor no seletor id="conteudo"
				$("#conteudo").html(retorna);
			});

            $.post('lista_checklistbau.php', dados , function(retorna){
				//Subtitui o valor no seletor id="conteudo"
				$("#conteudo1").html(retorna);
			});
		}
	</script>

    <?php
        function data($data){
            return date("d/m/Y - H:i", strtotime($data));
        }
    ?>
   

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
       
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.2/angular.min.js'></script>

</body>
</html>
