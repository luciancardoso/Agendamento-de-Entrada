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

    $id_checklistcavalobau = $_POST['id_printbau'];

    $result_gerador = "SELECT * FROM tb_checklistcarretabau WHERE id_checklistcarretabau=$id_checklistcavalobau";
	$resultado_gerador = mysqli_query($conexao, $result_gerador);
	$row_gerando = mysqli_fetch_assoc($resultado_gerador);
    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Assets/img/favicon.ico">
    <title>CHECK LIST - CAVALO</title>

    <style>

        .circle {
            width: 16px;
            height: 16px;
            border: 1px solid black;
            border-radius: 50%;
        }

        .circle_marcado {
            width: 16px;
            height: 16px;
            border: 1px solid black;
            background: black;
            border-radius: 50%;
        }

        .retangular {
            width: 550px;
            height: 20px;
            border: 1px solid black;
            text-align: center;
        }

        @media print{
            @page {
                size: landscape
            }
        }

    </style>

</head>
<body>
<div style="width: 1000px; height:650px; border: 1px solid; padding: 20px 20px 20px 20px;">
        
        <img src="./Assets/img/logoAduana.png" style="border:0px; width:230px; height:95px;">
        
        <h2 style="position: absolute; top: 35px; left:470px;">CHECK LIST- CARRETA BAÚ</h2>
        <h3 style="position: absolute; top: 80px; left:750px;">Nº <?= $row_gerando['id_checklistcarretabau'] ?></h3>
        <h5 style="position: absolute; top: 62px; left:370px; text-transform: uppercase;">PLACA DA CARRETA: <?= $row_gerando['cod_placacarreta'] ?></h5>
        <h5 style="position: absolute; top: 80px; left:370px; ">DATA / HORA: <?= date("d/m/Y H:i" ,strtotime($row_gerando['cod_datahora'])); ?></h5>
    
        <label style="position: absolute; top: 156px; left:30px;">Frente - Carreta Baú</label>
        <?php 
            if ($row_gerando['frenteCarretaBau'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 156px; left:168px;"></div>
                <label style="position: absolute; top: 156px; left:188px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 156px; left:235px;"></div>
                <label style="position: absolute; top: 156px; left:255px;">Não</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 156px; left:168px;"></div>
                <label style="position: absolute; top: 156px; left:188px;">OK</label>
                <div class="circle" style="position: absolute; top: 156px; left:235px;"></div>
                <label style="position: absolute; top: 156px; left:255px;">Não</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 150px; left:340px;"><?= $row_gerando['obs_frenteCarretaBau'] ?></div>

        <label style="position: absolute; top: 178px; left:30px;">Lacre da Placa:</label>
        <?php 
            if ($row_gerando['lacrePlaca'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 178px; left:168px;"></div>
                <label style="position: absolute; top: 178px; left:188px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 178px; left:235px;"></div>
                <label style="position: absolute; top: 178px; left:255px;">Não</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 178px; left:168px;"></div>
                <label style="position: absolute; top: 178px; left:188px;">OK</label>
                <div class="circle" style="position: absolute; top: 178px; left:235px;"></div>
                <label style="position: absolute; top: 178px; left:255px;">Não</label>
        <?php
            }
        ?>

        <!-- <div class="circle" style="position: absolute; top: 178px; left:340px;"></div>
        <label style="position: absolute; top: 178px; left:360px;">Quebrado</label> -->
        <div class="retangular" style="position: absolute; top: 172px; left:340px;"><?= $row_gerando['obs_lacrePlaca']; ?></div>

        <label style="position: absolute; top: 197px; left:30px;">Lanterna - Direita:</label>
        <?php 
            if ($row_gerando['lanternaDireita'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 197px; left:168px;"></div>
                <label style="position: absolute; top: 197px; left:188px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 197px; left:235px;"></div>
                <label style="position: absolute; top: 197px; left:255px;">Não</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 197px; left:168px;"></div>
                <label style="position: absolute; top: 197px; left:188px;">OK</label>
                <div class="circle" style="position: absolute; top: 197px; left:235px;"></div>
                <label style="position: absolute; top: 197px; left:255px;">Não</label>
        <?php
            }
        ?>

        <!-- <div class="circle" style="position: absolute; top: 197px; left:340px;"></div>
        <label style="position: absolute; top: 197px; left:360px;">Quebrado</label> -->
        <div class="retangular" style="position: absolute; top: 194px; left:340px;"><?= $row_gerando['obs_lanternaDireita']; ?></div>

        <label style="position: absolute; top: 216px; left:30px;">Lanterna - Esquerda:</label>
        <?php 
            if ($row_gerando['lanternaEsquerda'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 216px; left:168px;"></div>
                <label style="position: absolute; top: 216px; left:188px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 216px; left:235px;"></div>
                <label style="position: absolute; top: 216px; left:255px;">Não</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 216px; left:168px;"></div>
                <label style="position: absolute; top: 216px; left:188px;">OK</label>
                <div class="circle" style="position: absolute; top: 216px; left:235px;"></div>
                <label style="position: absolute; top: 216px; left:255px;">Não</label>
        <?php
            }
        ?>

        <!-- <div class="circle" style="position: absolute; top: 216px; left:340px;"></div>
        <label style="position: absolute; top: 216px; left:360px;">Quebrado</label> -->
        <div class="retangular" style="position: absolute; top: 214px; left:340px;"><?= $row_gerando['obs_lanternaEsquerda']; ?></div>

        <label style="position: absolute; top: 236px; left:30px; font-size:13px;">Lateral Dir. Fit. Luminosa:</label>
        <?php 
            if ($row_gerando['lateralDirFitLuminosa'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 236px; left:168px;"></div>
                <label style="position: absolute; top: 236px; left:188px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 236px; left:235px;"></div>
                <label style="position: absolute; top: 236px; left:255px;">Não</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 236px; left:168px;"></div>
                <label style="position: absolute; top: 236px; left:188px;">OK</label>
                <div class="circle" style="position: absolute; top: 236px; left:235px;"></div>
                <label style="position: absolute; top: 236px; left:255px;">Não</label>
        <?php
            }
        ?>

        <!-- <div class="circle" style="position: absolute; top: 236px; left:340px;"></div>
        <label style="position: absolute; top: 236px; left:360px;">Quantas Faltam?</label> -->
        <div class="retangular" style="position: absolute; top: 234px; left:340px;"><?= $row_gerando['obs_lateralDirFitLuminosa']; ?></div>

        <label style="position: absolute; top: 256px; left:30px; font-size:13px;">Lateral Dir. Carreta Báu:</label>
        <?php 
            if ($row_gerando['lateralDirCarretaBau'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 256px; left:168px;"></div>
                <label style="position: absolute; top: 256px; left:188px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 256px; left:235px;"></div>
                <label style="position: absolute; top: 256px; left:255px;">Não</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 256px; left:168px;"></div>
                <label style="position: absolute; top: 256px; left:188px;">OK</label>
                <div class="circle" style="position: absolute; top: 256px; left:235px;"></div>
                <label style="position: absolute; top: 256px; left:255px;">Amassado</label>
        <?php
            }
        ?>

        <!-- <div class="circle" style="position: absolute; top: 256px; left:340px;"></div>
        <label style="position: absolute; top: 256px; left:360px;">Ricos?</label> -->
        <div class="retangular" style="position: absolute; top: 254px; left:340px;"><?= $row_gerando['obs_lateralDirCarretaBau']; ?></div>

        <label style="position: absolute; top: 276px; left:30px; font-size:13px;">Lateral Esq. Fit Luminosa:</label>
        <?php 
            if ($row_gerando['lateralEsqFitLumino'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 276px; left:168px;"></div>
                <label style="position: absolute; top: 276px; left:188px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 276px; left:235px;"></div>
                <label style="position: absolute; top: 276px; left:255px;">Não</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 276px; left:168px;"></div>
                <label style="position: absolute; top: 276px; left:188px;">OK</label>
                <div class="circle" style="position: absolute; top: 276px; left:235px;"></div>
                <label style="position: absolute; top: 276px; left:255px;">Não</label>
        <?php
            }
        ?>

        <!-- <div class="circle" style="position: absolute; top: 276px; left:340px;"></div>
        <label style="position: absolute; top: 276px; left:360px;">Quantas Faltam?</label> -->
        <div class="retangular" style="position: absolute; top: 274px; left:340px;"><?= $row_gerando['obs_lateralEsqFitLumino']; ?></div>

        <label style="position: absolute; top: 296px; left:30px; font-size:13px;">Lateral Esq. - Carreta Baú:</label>
        <?php 
            if ($row_gerando['lateralEsqCarretaBau'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 295px; left:168px;"></div>
                <label style="position: absolute; top: 295px; left:188px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 295px; left:235px;"></div>
                <label style="position: absolute; top: 295px; left:255px;">Não</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 295px; left:168px;"></div>
                <label style="position: absolute; top: 295px; left:188px;">OK</label>
                <div class="circle" style="position: absolute; top: 295px; left:235px;"></div>
                <label style="position: absolute; top: 295px; left:255px;">Não</label>
        <?php
            }
        ?>

        <!-- <div class="circle" style="position: absolute; top: 296px; left:340px;"></div>
        <label style="position: absolute; top: 296px; left:360px;">Riscos</label> -->
        <div class="retangular" style="position: absolute; top: 294px; left:340px;"><?= $row_gerando['obs_lateralEsqCarretaBau']; ?></div>

        <label style="position: absolute; top: 316px; left:30px;">Lock:</label>
        <?php 
            if ($row_gerando['travado'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 316px; left:168px;"></div>
                <label style="position: absolute; top: 316px; left:188px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 316px; left:235px;"></div>
                <label style="position: absolute; top: 316px; left:255px;">Quebrado</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 316px; left:168px;"></div>
                <label style="position: absolute; top: 316px; left:188px;">OK</label>
                <div class="circle" style="position: absolute; top: 316px; left:235px;"></div>
                <label style="position: absolute; top: 316px; left:255px;">Quebrado</label>
        <?php
            }
        ?>

        <!-- <div class="circle" style="position: absolute; top: 316px; left:340px;"></div>
        <label style="position: absolute; top: 316px; left:360px;">Quantas Faltam?</label> -->
        <div class="retangular" style="position: absolute; top: 314px; left:340px;"><?= $row_gerando['obs_travado']; ?></div>

        <label style="position: absolute; top: 336px; left:30px;">Luz da Placa:</label>
        <?php 
            if ($row_gerando['travado'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 336px; left:168px;"></div>
                <label style="position: absolute; top: 336px; left:188px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 336px; left:235px;"></div>
                <label style="position: absolute; top: 336px; left:255px;">Não</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 336px; left:168px;"></div>
                <label style="position: absolute; top: 336px; left:188px;">OK</label>
                <div class="circle" style="position: absolute; top: 336px; left:235px;"></div>
                <label style="position: absolute; top: 336px; left:255px;">Não</label>
        <?php
            }
        ?>

        <!-- <div class="circle" style="position: absolute; top: 336px; left:340px;"></div>
        <label style="position: absolute; top: 336px; left:360px;">Queimado</label> -->
        <div class="retangular" style="position: absolute; top: 334px; left:340px;"><?= $row_gerando['obs_luzDaPlaca']; ?></div>

        <label style="position: absolute; top: 356px; left:30px;">Luz de Freio:</label>
        <?php 
            if ($row_gerando['luzDeFreio'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 356px; left:168px;"></div>
                <label style="position: absolute; top: 356px; left:188px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 356px; left:235px;"></div>
                <label style="position: absolute; top: 356px; left:255px;">Não</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 356px; left:168px;"></div>
                <label style="position: absolute; top: 356px; left:188px;">OK</label>
                <div class="circle" style="position: absolute; top: 356px; left:235px;"></div>
                <label style="position: absolute; top: 356px; left:255px;">Não</label>
        <?php
            }
        ?>

        <!-- <div class="circle" style="position: absolute; top: 356px; left:340px;"></div>
        <label style="position: absolute; top: 356px; left:360px;">Queimado</label> -->
        <div class="retangular" style="position: absolute; top: 354px; left:340px;"><?= $row_gerando['obs_luzDeFreio']; ?></div>

        <label style="position: absolute; top: 376px; left:30px;">Luz de Ré:</label>
        <?php 
            if ($row_gerando['luzDeRe'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 376px; left:168px;"></div>
                <label style="position: absolute; top: 376px; left:188px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 376px; left:235px;"></div>
                <label style="position: absolute; top: 376px; left:255px;">Não</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 376px; left:168px;"></div>
                <label style="position: absolute; top: 376px; left:188px;">OK</label>
                <div class="circle" style="position: absolute; top: 376px; left:235px;"></div>
                <label style="position: absolute; top: 376px; left:255px;">Não</label>
        <?php
            }
        ?>

        <!-- <div class="circle" style="position: absolute; top: 376px; left:340px;"></div>
        <label style="position: absolute; top: 376px; left:360px;">Queimado</label> -->
        <div class="retangular" style="position: absolute; top: 374px; left:340px;"><?= $row_gerando['obs_luzDeRe']; ?></div>

        <label style="position: absolute; top: 396px; left:30px;">Para-barro:</label>
        <?php 
            if ($row_gerando['paraBarro'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 396px; left:168px;"></div>
                <label style="position: absolute; top: 396px; left:188px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 396px; left:235px;"></div>
                <label style="position: absolute; top: 396px; left:255px;">Não</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 396px; left:168px;"></div>
                <label style="position: absolute; top: 396px; left:188px;">OK</label>
                <div class="circle" style="position: absolute; top: 396px; left:235px;"></div>
                <label style="position: absolute; top: 396px; left:255px;">Não</label>
        <?php
            }
        ?>

        <!-- <div class="circle" style="position: absolute; top: 396px; left:340px;"></div>
        <label style="position: absolute; top: 396px; left:360px;">Quebrado</label> -->
        <div class="retangular" style="position: absolute; top: 394px; left:340px;"><?= $row_gerando['obs_paraBarro']; ?></div>

        <label style="position: absolute; top: 416px; left:30px;">Para-choque:</label>
        <?php 
            if ($row_gerando['paraChoque'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 416px; left:168px;"></div>
                <label style="position: absolute; top: 416px; left:188px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 416px; left:235px;"></div>
                <label style="position: absolute; top: 416px; left:255px;">Não</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 416px; left:168px;"></div>
                <label style="position: absolute; top: 416px; left:188px;">OK</label>
                <div class="circle" style="position: absolute; top: 416px; left:235px;"></div>
                <label style="position: absolute; top: 416px; left:255px;">Não</label>
        <?php
            }
        ?>

        <!-- <div class="circle" style="position: absolute; top: 416px; left:340px;"></div>
        <label style="position: absolute; top: 416px; left:360px;">Quebrado</label> -->
        <div class="retangular" style="position: absolute; top: 414px; left:340px;"><?= $row_gerando['obs_paraChoque']; ?></div>

        <label style="position: absolute; top: 436px; left:30px; font-size:12px;"><br>Para-Choque Fita Luminosa:</label>
        <?php 
            if ($row_gerando['paraChoqueFitLuminosa'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 446px; left:168px;"></div>
                <label style="position: absolute; top: 446px; left:188px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 446px; left:235px;"></div>
                <label style="position: absolute; top: 446px; left:255px;">Falta</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 446px; left:168px;"></div>
                <label style="position: absolute; top: 446px; left:188px;">OK</label>
                <div class="circle" style="position: absolute; top: 446px; left:235px;"></div>
                <label style="position: absolute; top: 446px; left:255px;">Falta</label>
        <?php
            }
        ?>

        <!-- <div class="circle" style="position: absolute; top: 446px; left:340px;"></div>
        <label style="position: absolute; top: 446px; left:360px;">Quantas Faltam?</label> -->
        <div class="retangular" style="position: absolute; top: 444px; left:340px;"><?= $row_gerando['obs_paraChoqueFitLuminosa']; ?></div>

        <label style="position: absolute; top: 470px; left:30px;">Para-lama:</label>
        <?php 
            if ($row_gerando['paraLama'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 470px; left:168px;"></div>
                <label style="position: absolute; top: 470px; left:188px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 470px; left:235px;"></div>
                <label style="position: absolute; top: 470px; left:255px;">Amassado</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 470px; left:168px;"></div>
                <label style="position: absolute; top: 470px; left:188px;">OK</label>
                <div class="circle" style="position: absolute; top: 470px; left:235px;"></div>
                <label style="position: absolute; top: 470px; left:255px;">Amassado</label>
        <?php
            }
        ?>

        <!-- <div class="circle" style="position: absolute; top: 470px; left:340px;"></div>
        <label style="position: absolute; top: 470px; left:360px;">Quebrado</label> -->
        <div class="retangular" style="position: absolute; top: 468px; left:340px;"><?= $row_gerando['obs_paraLama']; ?></div>

        <label style="position: absolute; top: 490px; left:30px;">Pé Hidraúlico 01:</label>
        <?php 
            if ($row_gerando['peHidraulico1'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 490px; left:168px;"></div>
                <label style="position: absolute; top: 490px; left:188px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 490px; left:235px;"></div>
                <label style="position: absolute; top: 490px; left:255px;">Não</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 490px; left:168px;"></div>
                <label style="position: absolute; top: 490px; left:188px;">OK</label>
                <div class="circle" style="position: absolute; top: 490px; left:235px;"></div>
                <label style="position: absolute; top: 490px; left:255px;">Não</label>
        <?php
            }
        ?>

        <!-- <div class="circle" style="position: absolute; top: 490px; left:340px;"></div>
        <label style="position: absolute; top: 490px; left:360px;">Quebrado</label> -->
        <div class="retangular" style="position: absolute; top: 488px; left:340px;"><?= $row_gerando['obs_peHidraulico1']; ?></div>

        <label style="position: absolute; top: 510px; left:30px;">Pé Hidraúlico 02:</label>
        <?php 
            if ($row_gerando['peHidraulico2'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 510px; left:168px;"></div>
                <label style="position: absolute; top: 510px; left:188px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 510px; left:235px;"></div>
                <label style="position: absolute; top: 510px; left:255px;">Não</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 510px; left:168px;"></div>
                <label style="position: absolute; top: 510px; left:188px;">OK</label>
                <div class="circle" style="position: absolute; top: 510px; left:235px;"></div>
                <label style="position: absolute; top: 510px; left:255px;">Não</label>
        <?php
            }
        ?>

        <!-- <div class="circle" style="position: absolute; top: 510px; left:340px;"></div>
        <label style="position: absolute; top: 510px; left:360px;">Quebrado</label> -->
        <div class="retangular" style="position: absolute; top: 510px; left:340px;"><?= $row_gerando['obs_peHidraulico2']; ?></div>

        <label style="position: absolute; top: 530px; left:30px;">Pinos:</label>
        <?php 
            if ($row_gerando['pinos'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 530px; left:168px;"></div>
                <label style="position: absolute; top: 530px; left:188px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 530px; left:235px;"></div>
                <label style="position: absolute; top: 530px; left:255px;">Não</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 530px; left:168px;"></div>
                <label style="position: absolute; top: 530px; left:188px;">OK</label>
                <div class="circle" style="position: absolute; top: 530px; left:235px;"></div>
                <label style="position: absolute; top: 530px; left:255px;">Não</label>
        <?php
            }
        ?>

        <!-- <div class="circle" style="position: absolute; top: 530px; left:340px;"></div>
        <label style="position: absolute; top: 530px; left:360px;">Quantas Faltam?</label> -->
        <div class="retangular" style="position: absolute; top: 530px; left:340px;"><?= $row_gerando['obs_pinos']; ?></div>

        <label style="position: absolute; top: 550px; left:30px;">Pisca Alerta:</label>
        <?php 
            if ($row_gerando['piscaAlerta'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 550px; left:168px;"></div>
                <label style="position: absolute; top: 550px; left:188px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 550px; left:235px;"></div>
                <label style="position: absolute; top: 550px; left:255px;">Não</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 550px; left:168px;"><</div>
                <label style="position: absolute; top: 550px; left:188px;">OK</label>
                <div class="circle" style="position: absolute; top: 550px; left:235px;"></div>
                <label style="position: absolute; top: 550px; left:255px;">Não</label>
        <?php
            }
        ?>

        <!-- <div class="circle" style="position: absolute; top: 550px; left:340px;"></div>
        <label style="position: absolute; top: 550px; left:360px;">Queimados</label> -->
        <div class="retangular" style="position: absolute; top: 550px; left:340px;"><?= $row_gerando['obs_piscaAlerta']; ?></div>

        <label style="position: absolute; top: 570px; left:30px;">Pneu:</label>
        <?php 
            if ($row_gerando['pneu'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 570px; left:168px;"></div>
                <label style="position: absolute; top: 570px; left:188px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 570px; left:235px;"></div>
                <label style="position: absolute; top: 570px; left:255px;">Não</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 570px; left:168px;"></div>
                <label style="position: absolute; top: 570px; left:188px;">OK</label>
                <div class="circle" style="position: absolute; top: 570px; left:235px;"></div>
                <label style="position: absolute; top: 570px; left:255px;">Não</label>
        <?php
            }
        ?>

        <!-- <div class="circle" style="position: absolute; top: 570px; left:340px;"></div>
        <label style="position: absolute; top: 570px; left:360px;">Furado/Seco</label> -->
        <div class="retangular" style="position: absolute; top: 570px; left:340px;"><?= $row_gerando['obs_pneu']; ?></div>

        <label style="position: absolute; top: 590px; left:30px;">Pneu Lacrado:</label>
        <?php 
            if ($row_gerando['pneuLacrado'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 590px; left:168px;"></div>
                <label style="position: absolute; top: 590px; left:188px;">Sim</label>
                <div class="circle_marcado" style="position: absolute; top: 590px; left:235px;"></div>
                <label style="position: absolute; top: 590px; left:255px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 590px; left:168px;"></div>
                <label style="position: absolute; top: 590px; left:188px;">Sim</label>
                <div class="circle" style="position: absolute; top: 590px; left:235px;"></div>
                <label style="position: absolute; top: 590px; left:255px;">NÃO</label>
        <?php
            }
        ?>

        <!-- <div class="circle" style="position: absolute; top: 590px; left:340px;"></div>
        <label style="position: absolute; top: 590px; left:360px; font-size:12px;">Quantos não lacrados?</label> -->
        <div class="retangular" style="position: absolute; top: 590px; left:340px;"><?= $row_gerando['obs_pneuLacrado']; ?></div>

        <label style="position: absolute; top: 610px; left:30px; font-size:12px;">Pocas/Parafusos das Rodas:</label>
        <?php 
            if ($row_gerando['porcasParafusoRodas'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 610px; left:168px;"></div>
                <label style="position: absolute; top: 610px; left:188px; font-size:12px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 610px; left:235px;"></div>
                <label style="position: absolute; top: 610px; left:255px;">Não</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 610px; left:168px;"></div>
                <label style="position: absolute; top: 610px; left:188px; font-size:12px;">OK</label>
                <div class="circle" style="position: absolute; top: 610px; left:235px;"></div>
                <label style="position: absolute; top: 610px; left:255px;">Não</label>
        <?php
            }
        ?>

        <!-- <div class="circle" style="position: absolute; top: 610px; left:340px;"></div>
        <label style="position: absolute; top: 610px; left:360px;">Não tem</label> -->
        <div class="retangular" style="position: absolute; top: 610px; left:340px;"><?= $row_gerando['obs_porcasParafusoRodas']; ?></div>

        <label style="position: absolute; top: 630px; left:30px;">Seta Direita:</label>
        <?php 
            if ($row_gerando['setaDireita'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 630px; left:168px;"></div>
                <label style="position: absolute; top: 630px; left:188px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 630px; left:235px;"></div>
                <label style="position: absolute; top: 630px; left:255px;">Não</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 630px; left:168px;"></div>
                <label style="position: absolute; top: 630px; left:188px;">OK</label>
                <div class="circle" style="position: absolute; top: 630px; left:235px;"></div>
                <label style="position: absolute; top: 630px; left:255px;">Não</label>
        <?php
            }
        ?>

        <!-- <div class="circle" style="position: absolute; top: 630px; left:340px;"></div>
        <label style="position: absolute; top: 630px; left:360px;">Queimado</label> -->
        <div class="retangular" style="position: absolute; top: 630px; left:340px;"><?= $row_gerando['obs_setaDireita']; ?></div>    
        
        <label style="position: absolute; top: 650px; left:30px;">Seta Esquerda:</label>
        <?php 
            if ($row_gerando['setaEsquerda'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 650px; left:168px;"></div>
                <label style="position: absolute; top: 650px; left:188px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 650px; left:235px;"></div>
                <label style="position: absolute; top: 650px; left:255px;">Mau contato</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 650px; left:168px;"></div>
                <label style="position: absolute; top: 650px; left:188px;">OK</label>
                <div class="circle" style="position: absolute; top: 650px; left:235px;"></div>
                <label style="position: absolute; top: 650px; left:255px;">Mau contato</label>
        <?php
            }
        ?>

        <!-- <div class="circle" style="position: absolute; top: 650px; left:340px;"></div>
        <label style="position: absolute; top: 650px; left:360px;">Queimado</label> -->
        <div class="retangular" style="position: absolute; top: 650px; left:340px;"><?= $row_gerando['obs_setaEsquerda']; ?></div>  
    
        <div style="position: absolute; top: 701px; left:530px; text-align:left;">
            <label style="font-size:14px">Usuário: <?=$logado ?></label>
        </div>
        
        <label style="position: absolute; top: 702px; left:60px; font-size:14px">Data e hora da impressão: <?= date('d/m/Y \à\s H:i:s'); ?></label>
        </div>
    </div>
</body>
</html>