<?php
    session_start();
    include_once 'config.php';

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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Assets/img/favicon.ico">
    <title>Entrada - Sistema P&G</title>

    <link rel="stylesheet" href="Assets/css/painel.css">
    <!-- <link rel="stylesheet" href="Assets/css/calendario.css"> -->
    <link href="Assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <script src="Assets/js/index.js" defer></script>
    <script src="Assets/js/entrada.js" defer></script>
    <script src="Assets/js/quebra.js"></script>
    <script src="https://kit.fontawesome.com/61d00844fc.js" crossorigin="anonymous"></script>
    
    <script src="Assets/js/jQuery.js"></script>
    <script src="Assets/js/jquery.inputmask.js"></script>
    <script src="Assets/js/inputmask.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <header>
        <div class="logo">
            <a href="painel.php"><img src="Assets/img/logoAduana.png" width="200" height="70" alt=""></a>
        </div>
        <ul class="nav">
            <!-- <li>
                <a href="javascript://" title="Cadastrar">
                  <span class="icon-stack">
                    <i class="fas fa-user-edit"></i>
                  </span>
                  <span class="text">Cadastrar</span>
                </a>
            </li> -->
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

        .input-padrao {
            display: inline-block;
            margin: 0 0 20px;
            width: 50%;
            padding: 10px 15px;
        }

        /* .input-padrao-id {
            display: inline-block;
            margin: 0 0 20px;
            width: 8%;
            padding: 10px 15px;
        } */

        .input-padrao-veiculo {
            display: block;
            margin: 0 0 20px;
            width: 23%;
            padding: 10px 15px;
        }

        .cancel-button,
        .save-button {
        float: left;
        height: 40px;
        line-height: 40px;
        padding: 0 15px;
        border-radius: 6px;
        border: 1px solid;
        margin-right: 15px;
        cursor: pointer;
        -webkit-transition: all 0.15s ease;
        transition: all 0.15s ease;
        }

        .button-enviar {
        /* float: left; */
        height: 40px;
        line-height: 40px;
        padding: 0 15px;
        border-radius: 6px;
        border: 1px solid;
        margin-right: 15px;
        cursor: pointer;
        -webkit-transition: all 0.15s ease;
        transition: all 0.15s ease;
        }

        .button-enviar {
        background: #0DAD83;
        color: white;
        }

        .button-enviar:hover {
        transform: scale(1.1);
        }

        .save-button:hover {
        transform: scale(1.1);
        }

        .cancel-button:hover {
        transform: scale(1.1);
        }

        .cancel-button {
        background: white;
        color: #0DAD83;
        }

        .save-button {
        background: #0DAD83;
        color: white;
        }

        .carregando{
			color:#ff0000;
			display:none;
		}

        /* Media Queries */


    </style>
    

   <section>
        <div class="">
            <!-- <p>selecione a data e o horário desejado para o agendamento</p> -->
            <form method="POST" action="salvar_entrada.php">
                <fieldset class="container">
                    <div class="form-group m-3">
                        <label for="" class="">TRANSPORTADORA: </label>
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

                    <div class="form-group m-3">
                        <label for="" class="">MOTORISTA: </label>
                        <span class="carregando">Aguarde, carregando...</span>
                        <select class="input-padrao" name="id_motorista" id="id_motorista" required>
                            <option value="">SELECIONE</option>
                        </select>
                    </div>

                    <div class="form-group m-3">
                        <label for="select" class="">TIPO DE VEÍCULO:</label>
                        <select name="id_tipo_veiculo" id="id_tipo_veiculo" class="input-padrao-veiculo" required>
                        <option selected disabled value="">SELECIONE VEÍCULO</option>
                            <option value="CAVALO">CAVALO</option>
                            <option value="CARRETA BAU">CAMINHÃO</option>
                        </select>
    
                        <div id="CAVALO" class="formulario" style="display:none;">
                            <input type="text" name="placa" id="placa" class="input-padrao-veiculo" style="text-transform: uppercase;" placeholder="PLACA DO VEÍCULO" size="8" maxlength="8">
                            <input type="text" name="placapranchacavalo" id="placaprancha" class="input-padrao-veiculo" style="text-transform: uppercase;" placeholder="PLACA PRANCHA/BAÚ" size="8" maxlength="8">
                            <input type="text" id="numContainer" name="container" class="input-padrao-veiculo" style="text-transform: uppercase;" placeholder="Nº CONTAINER" size="11" maxlength="11">
                            <input type="text" name="lacrecavalo" id="lacre" class="input-padrao-veiculo" style="text-transform: uppercase;" placeholder="Nº LACRE" size="11" maxlength="11">

                        </div>

                        <div id="CARRETA BAU" class="formulario" style="display:none;">
                            <input type="text" name="placapranchabau" id="placaprancha" class="input-padrao-veiculo" style="text-transform: uppercase;" placeholder="PLACA DO VEÍCULO" size="8" maxlength="8">
                            <input type="text" name="lacrebau" id="lacre" class="input-padrao-veiculo" style="text-transform: uppercase;" placeholder="Nº LACRE" size="11" maxlength="11">

                        </div>
                    </div>

                    <label for="select" class="m-3">UNIDADE PARA AGENDAMENTO:</label>
                    <div class="form-check m-3">
                        <input class="form-check-input" type="radio" name="id_unidade" value="PG - 1" id="flexRadioDefault1">
                        <label class="form-check-label" for="flexRadioDefault1">
                            P&G - 1
                        </label>
                        </div>
                        <div class="form-check m-3">
                        <input class="form-check-input" type="radio" name="id_unidade" value="PG - RIO NEGRO" id="flexRadioDefault2" checked>
                        <label class="form-check-label" for="flexRadioDefault2">
                            P&G - RIO NEGRO
                        </label>
                    </div>

                    <br>

                    <div class="form-group m-3">
                        <label for="inputPassword3" >AGENDAMENTO</label>
                        <div class="col-sm-10">
                            <div class="input-group date data_formato" data-date-format="dd/mm/yyyy H:ii">
                                <input type="text" class="form-control input-padrao" name="data" placeholder="Data e Hora do Agendamento">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </span>
                            </div> 
                        </div>
				    </div>

                    <div class="form-group m-4">
                        <div class="col-sm-offset-2 col-sm-10">
                            <!-- <button type="submit" class="btn btn-success">Cadastrar</button> -->
                            <button type="submit" class="save-button">SALVAR</button>
                            <button type="reset" class="cancel-button">CANCELAR</button>
                            <br><br>
                        </div>
                    </div>

                </fieldset>
                
            </form>

        </div>

    </section>

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

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
		  google.load("jquery", "1.4.2");
	</script>

    <script type="text/javascript">
		$(function(){
			$('#id_transportadora').change(function(){
				if( $(this).val() ) {
					$('#id_motorista').hide();
					$('.carregando').show();
					$.getJSON('motorista_post.php?search=',{id_transportadora: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value="">SELECIONE</option>';	
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].id + '">' + j[i].nome_motorista + '</option>';
						}	
						$('#id_motorista').html(options).show();
						$('.carregando').hide();
					});
				} else {
					$('#id_motorista').html('<option value="">– SELECIONE –</option>');
				}
			});
		});
	</script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.2/angular.min.js'></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- <script src="js/bootstrap.min.js"></script> -->
		<script src="Assets/js/bootstrap-datetimepicker.min.js"></script>
		<script src="Assets/js/locales/bootstrap-datetimepicker.pt-BR.js"></script>
		<script type="text/javascript">
			$('.data_formato').datetimepicker({
				weekStart: 1,
				todayBtn: 1,
                autoclose: 1,
                todayHighlight: 1,
                startView: 2,
                forceParse: 0,
                showMeridian: 1,
                language: "pt-BR",
                startDate: '+0d'
			});
		</script>

</body>
</html>
