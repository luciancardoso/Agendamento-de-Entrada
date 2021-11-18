<?php
    session_start();
    include_once 'config.php';

    //O tipo de caracteres a ser usado
    header('Content-Type: text/html; charset=utf-8');


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
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="Assets/img/favicon.ico">
    <title>CheckList - Sistema P&G</title>

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
            
            <form method="POST" action="checklistcarreta_concluido.php">
                <fieldset>
                <div class="" id="caminhaoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">CHECKLIST - CARRETA BAÚ</h5>
                                    <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" disabled aria-label="Close"></button> -->
                                    <label for="select" class="col-md-2">UNIDADE PARA AGENDAMENTO:</label>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="radio" name="id_chekUnidadeBau" value="PG - Solimões" id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            P&G - SOLIMÕES
                                        </label>
                                        </div>
                                        <div class="form-check">
                                        <input class="form-check-input" type="radio" name="id_chekUnidadeBau" value="PG - RIO NEGRO" id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            P&G - RIO NEGRO
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group m-3">
                                    <!-- <label for="" class="">MOTORISTA: </label>
                                    <select class="input-padrao form-control" name="tx_motorista" required>
                                        <option selected disabled value="">-- SELECIONE --</option>
                                        //<?php
                                            //$result_cat_post = "SELECT * FROM motoristas ORDER BY nome_motorista";
                                            //$resultado_cat_post = mysqli_query($conexao, $result_cat_post);
                                            //while($row_cat_post = mysqli_fetch_assoc($resultado_cat_post) ) {
                                            //    echo '<option value="'.$row_cat_post['id'].'">'.$row_cat_post['nome_motorista'].'</option>';
                                            //}
                                        //?>
                                    </select> -->
                                    <div class="row g-2">
                                        <div class="col-md">
                                            <div class="form-floating text-uppercase">
                                                <input type="text" class="form-control text-uppercase" name="cod_placacarreta" placeholder="PLACA PRANCHA/BAÚ" size="8" maxlength="8">
                                                <label for="floatingInputGrid">Placa da Carreta</label>
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
                                    <label for="formGroupExampleInput" class="form-label">Frente - Carreta Baú </label>
                                    <div class="form-check form-check-inline col-auto">
                                        <input class="form-check-input caixa" checked type="radio" name="frenteCarretaBau" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline col-auto">
                                        <input class="form-check-input caixa" type="radio" name="frenteCarretaBau" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline col-auto">
                                        <input class="form-check-input caixa" type="radio" name="frenteCarretaBau" value="0">
                                        <label class="form-check-label">Riscos</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase caixa" name="obs_frenteCarretaBau" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    
    
                                    <label for="formGroupExampleInput" class="form-label"><strong>Lacre de Placa:</strong> </label>
                                    <div class="form-check form-check-inline col-auto">
                                        <input class="form-check-input" checked type="radio" name="lacrePlaca" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline col-auto">
                                        <input class="form-check-input" type="radio" name="lacrePlaca" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline col-auto">
                                        <input class="form-check-input" type="radio" name="lacrePlaca" id="inlineRadio2" value="Quebrado">
                                        <label class="form-check-label" for="inlineRadio2">Quebrado</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_lacrePlaca" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Lanterna - Direita </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="lanternaDireita" id="inlineRadio1" value="1">
                                        <label class="form-check-label" for="inlineRadio1">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="lanternaDireita" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="lanternaDireita" id="inlineRadio2" value="Quebrado">
                                        <label class="form-check-label" for="inlineRadio2">Quebrado</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_lanternaDireita" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Lanterna - Esquerda </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="lanternaEsquerda" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="lanternaEsquerda" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="lanternaEsquerda" id="inlineRadio2" value="Quebrado">
                                        <label class="form-check-label" for="inlineRadio2">Quebrado</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_lanternaEsquerda" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Lateral Dir. - Fita Luminosa </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="lateralDirFitLuminosa" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="lateralDirFitLuminosa" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="lateralDirFitLuminosa" id="inlineRadio2" value="Quantas Faltam?">
                                        <label class="form-check-label" for="inlineRadio2">Quantas Faltam?</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_lateralDirFitLuminosa" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Lateral Dir. - Carreta Baú </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="lateralDirCarretaBau" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="lateralDirCarretaBau" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="lateralDirCarretaBau" id="inlineRadio2" value="Riscos">
                                        <label class="form-check-label" for="inlineRadio2">Riscos</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_lateralDirCarretaBau" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Lateral Esq. - Fita Luminosa</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="lateralEsqFitLumino" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="lateralEsqFitLumino" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="lateralEsqFitLumino" id="inlineRadio2" value="Quantas faltam?">
                                        <label class="form-check-label" for="inlineRadio2">Quantas faltam?</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_lateralEsqFitLumino" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Lateral Esq. - Carreta Baú </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="lateralEsqCarretaBau" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="lateralEsqCarretaBau" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="lateralEsqCarretaBau" id="inlineRadio2" value="Riscos">
                                        <label class="form-check-label" for="inlineRadio2">Riscos</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_lateralEsqCarretaBau" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Lock </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="travado" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="travado" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="travado" id="inlineRadio2" value="Quantas faltam?">
                                        <label class="form-check-label" for="inlineRadio2">Quantas faltam?</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_travado" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Luz da Placa </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="luzDaPlaca" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="luzDaPlaca" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="luzDaPlaca" id="inlineRadio2" value="Queimado">
                                        <label class="form-check-label" for="inlineRadio2">Queimado</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_luzDaPlaca" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Luz de Freio </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="luzDeFreio" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="luzDeFreio" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="luzDeFreio" id="inlineRadio2" value="Queimado">
                                        <label class="form-check-label" for="inlineRadio2">Queimado</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_luzDeFreio" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Luz de Ré </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="luzDeRe" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="luzDeRe" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="luzDeRe" id="inlineRadio2" value="Queimado">
                                        <label class="form-check-label" for="inlineRadio2">Queimado</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_luzDeRe" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Para-barro </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="paraBarro" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="paraBarro" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="paraBarro" id="inlineRadio2" value="Quebrado">
                                        <label class="form-check-label" for="inlineRadio2">Quebrado</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_paraBarro" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Para-choque </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="paraChoque" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="paraChoque" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="paraChoque" id="inlineRadio2" value="Quebrado">
                                        <label class="form-check-label" for="inlineRadio2">Quebrado</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_paraChoque" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Para-choque Fita Luminosa </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="paraChoqueFitLuminosa" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="paraChoqueFitLuminosa" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="paraChoqueFitLuminosa" id="inlineRadio2" value="Quantas faltam?">
                                        <label class="form-check-label" for="inlineRadio2">Quantas faltam?</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_paraChoqueFitLuminosa" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Para-lama </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="paraLama" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="paraLama" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="paraLama" id="inlineRadio2" value="Quebrado">
                                        <label class="form-check-label" for="inlineRadio2">Quebrado</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_paraLama" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Pé Hidraúlico 01 </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="peHidraulico1" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="peHidraulico1" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="peHidraulico1" id="inlineRadio2" value="Quebrado">
                                        <label class="form-check-label" for="inlineRadio2">Quebrado</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_peHidraulico1" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Pé Hidraúlico 02 </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="peHidraulico2" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="peHidraulico2" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="peHidraulico2" id="inlineRadio2" value="Quebrado">
                                        <label class="form-check-label" for="inlineRadio2">Quebrado</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_peHidraulico2" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Pinos </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="pinos" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pinos" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pinos" id="inlineRadio2" value="Quantas faltam?">
                                        <label class="form-check-label" for="inlineRadio2">Quantas faltam?</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_pinos" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Pisca Alerta </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="piscaAlerta" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="piscaAlerta" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="piscaAlerta" id="inlineRadio2" value="Queimados">
                                        <label class="form-check-label" for="inlineRadio2">Queimados</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_piscaAlerta" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Pneu </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="pneu" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pneu" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pneu" id="inlineRadio2" value="Furado/Seco">
                                        <label class="form-check-label" for="inlineRadio2">Furado/Seco</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_pneu" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Pneu Lacrado </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="pneuLacrado" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pneuLacrado" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="pneuLacrado" id="inlineRadio2" value="Quantos não lacrados">
                                        <label class="form-check-label" for="inlineRadio2">Quantos não lacrados</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_pneuLacrado" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Porcas / Parafusos das Rodas </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="porcasParafusoRodas" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="porcasParafusoRodas" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="porcasParafusoRodas" id="inlineRadio2" value="Não tem">
                                        <label class="form-check-label" for="inlineRadio2">Não tem</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_porcasParafusoRodas" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Seta Direita </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="setaDireita" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="setaDireita" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="setaDireita" id="inlineRadio2" value="Queimado">
                                        <label class="form-check-label" for="inlineRadio2">Queimado</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_setaDireita" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Seta Esquerda </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="setaEsquerda" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="setaEsquerda" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="setaEsquerda" id="inlineRadio2" value="Queimado">
                                        <label class="form-check-label" for="inlineRadio2">Queimado</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_setaEsquerda" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Tomada de Força </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="tomadaDeForca" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tomadaDeForca" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="tomadaDeForca" id="inlineRadio2" value="Queimado">
                                        <label class="form-check-label" for="inlineRadio2">Queimado</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_tomadaDeForca" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                    <br>
    
                                    <label for="formGroupExampleInput" class="form-label">Traseira - Carreta Baú </label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" checked type="radio" name="traseiraCarretaBau" value="1">
                                        <label class="form-check-label">OK</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="traseiraCarretaBau" value="0">
                                        <label class="form-check-label">Não</label>
                                    </div>
                                    <!-- <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="traseiraCarretaBau" id="inlineRadio2" value="Quebrado">
                                        <label class="form-check-label" for="inlineRadio2">Quebrado</label>
                                    </div> -->
                                    <div class="mb-3 form-check-inline col-md-9">
                                        <input type="text" class="form-control text-uppercase" name="obs_traseiraCarretaBau" id="obs_traseiraCarretaBau" placeholder="OBSERVAÇÕES" maxlength="20">
                                    </div>
    
                                </div>
                                <div class="modal-footer">
                                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button> -->
                                    <button type="submit" id="checar" class="btn btn-primary">Checked</button>
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

        <!-- <script src="Assets/js/bootstrap-datetimepicker.min.js"></script> -->
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
