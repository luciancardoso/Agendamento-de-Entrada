<?php

    include_once 'model/Conexao.php';
    include_once 'model/Manager.php';
    include_once 'public/helper.php';

    include_once 'config.php';

    $manager = new Manager();

    date_default_timezone_set('America/Manaus');

    session_start();
    // print_r($_SESSION);
    if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['usuario'];

    // Consulta do Banco de Dados

    $id_agendamento = $_POST['id'];
    // echo $id_agendamento;

    $result_agendamento = "SELECT * FROM agendamentos WHERE id=$id_agendamento";
	$resultado_agendamento = mysqli_query($conexao, $result_agendamento);
	$row_agendamento = mysqli_fetch_assoc($resultado_agendamento);
    

    $motorista = $row_agendamento["id_motorista"];
    $result_motorista = "SELECT nome_motorista FROM motoristas WHERE id=$motorista";
	$resultado_motorista = mysqli_query($conexao, $result_motorista);
	$row_motorista = mysqli_fetch_assoc($resultado_motorista);

   
    $transportadora = $row_agendamento['id_transportadora'];
    $result_transportadora = "SELECT * FROM transportadora WHERE id=$transportadora";
	$resultado_transportadora = mysqli_query($conexao, $result_transportadora);
	$row_transportadora = mysqli_fetch_assoc($resultado_transportadora);
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Assets/img/favicon.ico">
    <title>agendamentoentrada</title>
</head>
<body>
    <div style="width: 800px; height:1100px; border: 1px solid; padding: 20px 20px 20px 20px;">
        
        <img src="./Assets/img/logoAduana.png" style="border:0px; width:230px; height:95px;">
        
        <h1 style="position: absolute; top: 35px; left:240px;">GUIA DE AGENDAMENTO - ENTRADA</h1>
        <h1 style="position: absolute; top: 80px; left:450px;">Nº <?= $row_agendamento['id']; ?></h1>

        <div style="position: absolute; top: 170px; width:838px; height:40px; background-color:#6495ED; margin-left:-19px">
        </div>
        <h2 style="position: absolute; top: 156px; left:30px;">Data Agendamento: <?= date('d/m/Y' ,strtotime($row_agendamento['data'])); ?></h2>
        <h2 style="position: absolute; top: 156px; left:590px;"> <?= date('H:i' ,strtotime($row_agendamento['data'])); ?></h2>
        <label style="position: absolute; top: 147px; left:570px; font-size:20px">Hora Agendada</label>

        <!-- <h3 style="position: absolute; top: 200px; left:30px;">Transportadora: ADUKARGO TRANSPORTES, LOGISTICA E SERVIÇOS DE ARMA</h3> -->
        <h2 style="position: absolute; top: 240px; left:30px; text-transform: uppercase;">Contêiner: <?= $row_agendamento['container']; ?></h2>
        <label style="position: absolute; top: 260px; left:500px; font-size:20px">Unidade: <?= $row_agendamento['id_unidade']; ?></label>
        <!-- <label style="position: absolute; top: 270px; left:650px; font-size:20px">Tamanho: 40</label> -->

        <div style="position: absolute; top: 330px; width:838px; height:2px; border-bottom:1px solid black ; margin-left:-19px">
        </div>
        
        <label style="position: absolute; top: 360px; left:30px; font-size:22px; font-weight:bold">Transportadora: <?= $row_transportadora['transportadora']; ?></label>
        <label style="position: absolute; top: 390px; left:30px; font-size:22px;">Motorista: <?= $row_motorista['nome_motorista']; ?></label>
        <label style="position: absolute; top: 420px; left:30px; font-size:22px">Tipo de Veículo: <?= $row_agendamento['id_tipo_veiculo']; ?></label>
        <label style="position: absolute; top: 450px; left:30px; font-size:22px; text-transform: uppercase;">Placa do Cavalo/Baú: <?= $row_agendamento['placapranchacavalo'] . $row_agendamento['placapranchabau']; ?></label>
        <!-- <label style="position: absolute; top: 450px; left:30px; font-size:22px">Cliente: P&G</label> -->
        
        


        <label style="position: absolute; top: 480px; left:30px; font-size:22px; text-transform: uppercase;">Lacre Cavalo/Baú: <?= $row_agendamento['lacrecavalo'] . $row_agendamento['lacrebau'] ?></label>
        <!-- <label style="position: absolute; top: 480px; left:260px; font-size:22px; font-weight:bold">Lacre2: </label> -->
        <!-- <label style="position: absolute; top: 480px; left:490px; font-size:22px">Placa do Cavalo:</label> -->

        <!-- <label style="position: absolute; top: 510px; left:30px; font-size:22px;">Destino: SUAPE</label>
        <label style="position: absolute; top: 540px; left:30px; font-size:22px;">Destino Final: SUAPE</label> -->

        <!-- <label style="position: absolute; top: 570px; left:30px; font-size:22px">Motorista:  - </label> -->
        
        


        <label style="position: absolute; top: 800px; left:30px; font-size:18px; text-decoration:underline">Informações Importantes:</label>
        
        <label style="position: absolute; top: 850px; left:30px; font-size:15px">- Atentar para o cumprimento do Agendamento na Data e Hora programada;</label>
        <label style="position: absolute; top: 865px; left:30px; font-size:15px">- Não será permitido o recebimento da guia de agendamento eletrônico no terminal após data e horário programado,</label>
        <label style="position: absolute; top: 880px; left:30px; font-size:15px">ficando o transportador ciente que a perda ou atraso do agendamento eletrônico impossibilitará à realização de um novo</label>
        <label style="position: absolute; top: 895px; left:30px; font-size:15px">agendamento, estando disponível a partir da 3ª hora do horário perdido.</label>
        
        <label style="position: absolute; top: 940px; left:100px; font-size:22px">Dúvidas e Informações</label>
        <img src='./Assets/img/phone.svg' style="position: absolute; top: 920px; left:370px; border:0px; height:32px;" />
        <img src='./Assets/img/envelope.svg' style="position: absolute; top: 950px; left:370px; border:0px; height:32px;" />
        <label style="position: absolute; top: 925px; left:420px; font-size:22px">(092) 3212-8507 - Ramal: 8507 / 8508</label>
        <label style="position: absolute; top: 955px; left:420px; font-size:22px">ti.aduana@aduana-dsp.com.br</label>

        <div style="position: absolute; top: 1000px; width:838px; height:2px; border-bottom:1px solid black; margin-left:-19px">
        </div>
        
        <div style="position: absolute; top: 1050px; left:30px; width: 785px; text-align:right;">
            <label style="font-size:22px">Usuário: <?=$logado ?></label>
        </div>

        <!-- <div style="position: absolute; top: 1030px; left:60px; width: 300px; text-align:left;">
    <div class="k-barcode" id="codBar"></div><script>
        jQuery(function(){jQuery("#codBar").kendoBarcode({"type":"code39","checksum":false,"value":"1"});});
    </script> -->
        </div>
        
        <label style="position: absolute; top: 1100px; left:400px; font-size:22px">Data e hora da impressão: <?= date('d/m/Y \à\s H:i:s'); ?></label>
    </div>
</body>
</html>