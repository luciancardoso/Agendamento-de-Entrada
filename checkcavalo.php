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

    </style>
    

   <section>
        <div class="content">
            
            <form method="POST" action="checklistcavalo_concluido.php">
                <fieldset>
                <div class="" id="cavalomecanico" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">CHECKLIST - CAVALO MECÂNICO</h5>
                                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                <label for="select" class="col-md-3">UNIDADE PARA AGENDAMENTO:</label>
                                <div class="form-check ">
                                    <input class="form-check-input" type="radio" name="id_chekUnidadeCav" value="PG - Solimões" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        P&G - SOLIMÕES
                                    </label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="id_chekUnidadeCav" value="PG - RIO NEGRO" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        P&G - RIO NEGRO
                                    </label>
                                </div>

                            </div>
                            <!-- <div class="form-floating row-md-4">
                                <input type="text" class="form-control" id="floatingInput" style="text-transform: uppercase;" placeholder="PLACA DO CAVALO" size="8" maxlength="8">
                                <label for="floatingInput">Placa do Cavalo</label>
                            </div>
                            <div class="form-floating row-md-2">
                                <input type="text" class="form-control" id="floatingPassword" style="text-transform: uppercase;" placeholder="PLACA PRANCHA/BAÚ" size="8" maxlength="8">
                                    <label for="floatingPassword">Placa da Prancha/Baú</label>
                            </div> -->
                            <div class="form-group m-3">
                                <!-- <label for="" class="">MOTORISTA: </label>
                                <select class="input-padrao form-control" name="" id="" required>
                                    <option selected disabled value="">-- SELECIONE --</option>
                                    //<?php
                                      //  $result_cat_post = "SELECT * FROM motoristas";
                                      //  $resultado_cat_post = mysqli_query($conexao, $result_cat_post);
                                      //  while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
                                      //      echo '<option value="'.$row_cat_post['id'].'">'.$row_cat_post['nome_motorista'].'</option>';
                                      //  }
                                    //?>
                                </select> -->
                                <div class="row g-2">
                                    <div class="col-md">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="cod_placaCavalo" style="text-transform: uppercase;" placeholder="PLACA DO CAVALO" size="8" maxlength="8" required>
                                            <label for="floatingInputGrid">Placa do Cavalo</label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="cod_placaPranchaBau" style="text-transform: uppercase;" placeholder="PLACA PRANCHA/BAÚ" size="8" maxlength="8">
                                            <label for="floatingInputGrid">Placa da Prancha/Baú</label>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="form-floating date data_formato" data-date-format="dd/mm/yyyy H:ii">
                                            <input type="datetime-local" class="form-control" name="cod_datahora" style="text-transform: uppercase;">
                                            <label for="floatingInputGrid">Data / Hora</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-body align-items-center">
                                <label for="formGroupExampleInput" class="form-label"><strong>Acendedor Elétrico:</strong> </label>
                                <div class="form-check form-check-inline col-auto">
                                    <input class="form-check-input" checked type="radio" name="id_acdeletrico" value="1">
                                    <label class="form-check-label">OK</label>
                                </div>
                                <div class="form-check form-check-inline col-auto">
                                    <input class="form-check-input" type="radio" name="id_acdeletrico" value="0">
                                    <label class="form-check-label">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_eletrico" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Água do Radiador:</strong>  </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_agua_radiador" value="1">
                                    <label class="form-check-label">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_agua_radiador" value="0">
                                    <label class="form-check-label">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_agradiador" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Ar Condicionado:</strong>  </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_arcondicionado" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_arcondicionado" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_arcondicionado" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Arame da Placa:</strong>  </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_arameplaca" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_arameplaca" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_arameplaca" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Aro / Cubo Roda:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_arocuboroda" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_arocuboroda" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_arocuboroda" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Bateria:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_bateria" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_bateria" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_bateria" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Bicos:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_bicos" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_bicos" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_bicos" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Buzina:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_buzina" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_buzina" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_buzina" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Certificado Tacografo:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_certitocografo" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_certitocografo" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_certitocografo" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Chave de Ignição:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_ch_ignicao" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_ch_ignicao" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_ch_ignicao" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Chicote:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_chicote" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_chicote" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_chicote" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Cinto de Segurança:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_ci_seguranca" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_ci_seguranca" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_ci_seguranca" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>CRLV Veículo:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_crlv_veiculo" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_crlv_veiculo" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_crlvveiculo" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Espelho Retrovisor Dir./Esq.:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_retrovisorDirEsq" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_retrovisorDirEsq" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_retrovisorDirEsq" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Extintor-Val:</strong> <input type="date" name="validadeExtintor" id="data_validadeExtintor" required> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_extintorVal" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_extintorVal" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_obsextintor" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Farol Alto:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_farol_alto" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_farol_alto" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_farolAlto" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Farol Baixo:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_farol_baixo" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_farol_baixo" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_farolbaixo" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Freio Motor:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_freiomotor" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_freiomotor" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_freiomotor" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Lacre da Placa:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_lacre_placa" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_lacre_placa" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_lacreplaca" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Lanterna Lado Dir./Esq.:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_lanterna_DirEsq" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_lanterna_DirEsq" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_laternaDirEsq" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Lateral Lado Dir./Esq.:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_lateralDirEsq" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_lateralDirEsq" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_lateralDirEsq" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Luz da Placa:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_luz_placa" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_luz_placa" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_luzplaca" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Luz de Freio:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_luz_freio" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_luz_freio" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_luzfreio" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Luz de Ré:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_luz_re" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_luz_re" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_luzre" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Luz de Teto:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_luz_teto" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_luz_teto" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_luzteto" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Luzes de Painel:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_luzes_painel" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_luzes_painel" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_luzesPainel" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Maçaneta Externa Dir./Esq.:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_mac_ExternaDirEsq" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_mac_ExternaDirEsq" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_macExternaDirEsq" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Marçaneta Int. Dir./Esq.:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_mar_intDirEsq" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_mar_intDirEsq" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_marintDirEsq" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Mangueira de Ar:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_mangueira_ar" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_mangueira_ar" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_mangueiraAr" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Marcador de Comb. Elet.:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_combEletrico" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_combEletrico" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_CombEletrico" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Marcador de Comb. Ponteiro:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_marc_combPonteiro" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_marc_combPonteiro" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_CombPonteiro" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Óleo do Motor:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_oleoMotor" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_oleoMotor" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_oleoMotor" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Palhetas do Para-brisas:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_palheParaBrisas" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_palheParaBrisas" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_palheParaBrisas" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Para Barro:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_paraBarro" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_paraBarro" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_paraBarro" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Para-brisas:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_paraBrisas" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_paraBrisas" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_paraBrisas" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Para-choque Dianteiro:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_paraChoqueDianteiro" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_paraChoqueDianteiro" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_paraChoqueDianteiro" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Para-choque Traseiro:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_paraChoqueTraseiro" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_paraChoqueTraseiro" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_paraChoqueTraseiro" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Para-lama:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_paraLama" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_paraLama" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_paraLama" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Pisca Alerta:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_piscaAlerta" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_piscaAlerta" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_piscaAlerta" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Placa:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_placa" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_placa" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_placa" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Pneus:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_pneus" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_pneus" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_pneus" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Pneus Lacrado:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_pneusLacrado" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_pneusLacrado" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_pneusLacrado" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Porcas / Paraf. Das Rodas:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_porcasParafRodas" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_porcasParafRodas" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_pocasParafRodas" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Rádio Amador:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_radioAmador" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_radioAmador" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_radioAmador" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Rádio do Veículo:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_radioVeiculo" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_radioVeiculo" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_radioVeiculo" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Ret. Élet. Lado Dir./Esq.:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_eletLadoDirEsq" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_eletLadoDirEsq" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_eletLadoDirEsq" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Seta Direita / Esquerda:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_setaDirEsq" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_setaDirEsq" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_setaDirEsq" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Tacográfo:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_tacografo" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_tacografo" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_tacografo" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Tampa do Tanque:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_tampaTanque" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_tampaTanque" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_tampaTanque" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Tapeçaria - Bancos:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_tapecariaBancos" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_tapecariaBancos" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_tapecariaBancos" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Tapeçaria - Cama:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_tapecariaCama" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_tapecariaCama" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_tapecariaCama" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Trava da Porta Dir./Esq.:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_travaPortaDirEsq" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_travaPortaDirEsq" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_travaPortaDirEsq" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Ventilador:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_ventilador" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_ventilador" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_ventilador" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                                <br>
    
                                <label for="formGroupExampleInput" class="form-label"><strong>Vidro Elét. - Dir./Esq.:</strong> </label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" checked type="radio" name="id_vidroEletDirEsq" id="inlineRadio1" value="1">
                                    <label class="form-check-label" for="inlineRadio1">OK</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="id_vidroEletDirEsq" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2">NÃO</label>
                                </div>
                                <div class="mb-3 form-check-inline col-md-9">
                                    <input type="text" class="form-control text-uppercase" name="txt_vidroEletDirEsq" id="formGroupExampleInput" placeholder="OBSERVAÇÕES" maxlength="20">
                                </div>
    
                            </div>
    
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button> -->
                                <button type="submit" class="btn btn-primary">Checked</button>
                            </div>
                            </div>
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.2/angular.min.js'></script>

</body>
</html>
