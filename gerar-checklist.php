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

    $id_checklistcavalo = $_POST['id_print'];
    //echo $id_checklistcavalo;

     $result_gerador = "SELECT * FROM tb_checklistcavalo WHERE id_checklistcavalo=$id_checklistcavalo";
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
            width: 150px;
            height: 20px;
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>
<body>
<div style="width: 800px; height:1100px; border: 1px solid; padding: 20px 20px 20px 20px;">
        
        <img src="./Assets/img/logoAduana.png" style="border:0px; width:230px; height:95px;">
        
        <h2 style="position: absolute; top: 35px; left:270px;">CHECK LIST - CAVALO MECÂNICO</h2>
        <h3 style="position: absolute; top: 80px; left:630px;">Nº <?= $row_gerando['id_checklistcavalo'] ?></h3>
        <h4 style="position: absolute; top: 85px; left:270px; text-transform: uppercase;">Placa do Cavalo: <?= $row_gerando['cod_placaCavalo'] ?></h4>
        <h4 style="position: absolute; top: 100px; left:270px; text-transform: uppercase;">Placa da Prancha/Baú: <?= $row_gerando['cod_placaPranchaBau'] ?></h4>
        <h5 style="position: absolute; top: 70px; left:270px; ">DATA / HORA: <?= date("d/m/Y H:i" ,strtotime($row_gerando['cod_datahora'])); ?></h5>
    
        <label style="position: absolute; top: 156px; left:30px;">Acendedor Elétrico:</label>
        <?php 
            if ($row_gerando['id_acdeletrico'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 156px; left:164px;"></div>
                <label style="position: absolute; top: 156px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 156px; left:210px;"></div>
                <label style="position: absolute; top: 156px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 156px; left:164px;"></div>
                <label style="position: absolute; top: 156px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 156px; left:210px;"></div>
                <label style="position: absolute; top: 156px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 150px; left:268px;"></div>


        <div class="retangular" style="position: absolute; top: 150px; left:268px;"><?= $row_gerando['txt_eletrico'] ?></div>

        <label style="position: absolute; top: 178px; left:30px;">Água do Radiador:</label>
        <?php 
            if ($row_gerando['id_agua_radiador'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 178px; left:164px;"></div>
                <label style="position: absolute; top: 178px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 178px; left:210px;"></div>
                <label style="position: absolute; top: 178px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 178px; left:164px;"></div>
                <label style="position: absolute; top: 178px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 178px; left:210px;"></div>
                <label style="position: absolute; top: 178px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 172px; left:268px;"><?= $row_gerando['txt_agradiador']; ?></div>

        <label style="position: absolute; top: 197px; left:30px;">Ar Condicionado:</label>
        <?php 
            if ($row_gerando['id_arcondicionado'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 197px; left:164px;"></div>
                <label style="position: absolute; top: 197px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 197px; left:210px;"></div>
                <label style="position: absolute; top: 197px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 197px; left:164px;"></div>
                <label style="position: absolute; top: 197px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 197px; left:210px;"></div>
                <label style="position: absolute; top: 197px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 194px; left:268px;"><?= $row_gerando['txt_arcondicionado']; ?></div>

        <label style="position: absolute; top: 216px; left:30px;">Arame da Placa:</label>
        <?php 
            if ($row_gerando['id_arameplaca'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 216px; left:164px;"></div>
                <label style="position: absolute; top: 216px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 216px; left:210px;"></div>
                <label style="position: absolute; top: 216px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 216px; left:164px;"></div>
                <label style="position: absolute; top: 216px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 216px; left:210px;"></div>
                <label style="position: absolute; top: 216px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 214px; left:268px;"><?= $row_gerando['txt_arameplaca']; ?></div>

        <label style="position: absolute; top: 236px; left:30px;">Aro / Cubo Roda:</label>
        <?php 
            if ($row_gerando['id_arocuboroda'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 236px; left:164px;"></div>
                <label style="position: absolute; top: 236px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 236px; left:210px;"></div>
                <label style="position: absolute; top: 236px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 236px; left:164px;"></div>
                <label style="position: absolute; top: 236px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 236px; left:210px;"></div>
                <label style="position: absolute; top: 236px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 234px; left:268px;"><?= $row_gerando['txt_arocuboroda']; ?></div>

        <label style="position: absolute; top: 256px; left:30px;">Bateria:</label>
        <?php 
            if ($row_gerando['id_bateria'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 256px; left:164px;"></div>
                <label style="position: absolute; top: 256px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 256px; left:210px;"></div>
                <label style="position: absolute; top: 256px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 256px; left:164px;"></div>
                <label style="position: absolute; top: 256px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 256px; left:210px;"></div>
                <label style="position: absolute; top: 256px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 254px; left:268px;"><?= $row_gerando['txt_bateria']; ?></div>

        <label style="position: absolute; top: 276px; left:30px;">Bicos:</label>
        <?php 
            if ($row_gerando['id_bicos'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 276px; left:164px;"></div>
                <label style="position: absolute; top: 276px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 276px; left:210px;"></div>
                <label style="position: absolute; top: 276px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 276px; left:164px;"></div>
                <label style="position: absolute; top: 276px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 276px; left:210px;"></div>
                <label style="position: absolute; top: 276px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 274px; left:268px;"><?= $row_gerando['txt_bicos']; ?></div>

        <label style="position: absolute; top: 296px; left:30px;">Buzina:</label>
        <?php 
            if ($row_gerando['id_buzina'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 296px; left:164px;"></div>
                <label style="position: absolute; top: 296px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 296px; left:210px;"></div>
                <label style="position: absolute; top: 296px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 296px; left:164px;"></div>
                <label style="position: absolute; top: 296px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 296px; left:210px;"></div>
                <label style="position: absolute; top: 296px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 294px; left:268px;"><?= $row_gerando['txt_buzina']; ?></div>

        <label style="position: absolute; top: 316px; left:30px;">Certif. Tacografo:</label>
        <?php 
            if ($row_gerando['id_certitocografo'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 316px; left:164px;"></div>
                <label style="position: absolute; top: 316px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 316px; left:210px;"></div>
                <label style="position: absolute; top: 316px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 316px; left:164px;"></div>
                <label style="position: absolute; top: 316px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 316px; left:210px;"></div>
                <label style="position: absolute; top: 316px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 314px; left:268px;"><?= $row_gerando['txt_certitocografo']; ?></div>

        <label style="position: absolute; top: 336px; left:30px;">Chave de Ignição:</label>
        <?php 
            if ($row_gerando['id_ch_ignicao'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 336px; left:164px;"></div>
                <label style="position: absolute; top: 336px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 336px; left:210px;"></div>
                <label style="position: absolute; top: 336px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 336px; left:164px;"></div>
                <label style="position: absolute; top: 336px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 336px; left:210px;"></div>
                <label style="position: absolute; top: 336px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 334px; left:268px;"><?= $row_gerando['txt_ch_ignicao']; ?></div>

        <label style="position: absolute; top: 356px; left:30px;">Chicote:</label>
        <?php 
            if ($row_gerando['id_chicote'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 356px; left:164px;"></div>
                <label style="position: absolute; top: 356px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 356px; left:210px;"></div>
                <label style="position: absolute; top: 356px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 356px; left:164px;"></div>
                <label style="position: absolute; top: 356px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 356px; left:210px;"></div>
                <label style="position: absolute; top: 356px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 354px; left:268px;"><?= $row_gerando['txt_chicote']; ?></div>

        <label style="position: absolute; top: 376px; left:30px;">Cinto de Segurança:</label>
        <?php 
            if ($row_gerando['id_ci_seguranca'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 376px; left:164px;"></div>
                <label style="position: absolute; top: 376px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 376px; left:210px;"></div>
                <label style="position: absolute; top: 376px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 376px; left:164px;"></div>
                <label style="position: absolute; top: 376px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 376px; left:210px;"></div>
                <label style="position: absolute; top: 376px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 374px; left:268px;"><?= $row_gerando['txt_ci_seguranca']; ?></div>

        <label style="position: absolute; top: 396px; left:30px;">CRLV Veículo:</label>
        <?php 
            if ($row_gerando['id_crlv_veiculo'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 396px; left:164px;"></div>
                <label style="position: absolute; top: 396px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 396px; left:210px;"></div>
                <label style="position: absolute; top: 396px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 396px; left:164px;"></div>
                <label style="position: absolute; top: 396px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 396px; left:210px;"></div>
                <label style="position: absolute; top: 396px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 394px; left:268px;"><?= $row_gerando['txt_crlvveiculo']; ?></div>

        <label style="position: absolute; top: 416px; left:30px;">Retrovisor Dir/Esq:</label>
        <?php 
            if ($row_gerando['id_retrovisorDirEsq'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 416px; left:164px;"></div>
                <label style="position: absolute; top: 416px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 416px; left:210px;"></div>
                <label style="position: absolute; top: 416px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 416px; left:164px;"></div>
                <label style="position: absolute; top: 416px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 416px; left:210px;"></div>
                <label style="position: absolute; top: 416px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 414px; left:268px;"><?= $row_gerando['txt_retrovisorDirEsq']; ?></div>

        <label style="position: absolute; top: 436px; left:30px;">Extintor-Val:</label>
        <?php 
            if ($row_gerando['id_extintorVal'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 446px; left:164px;"></div>
                <label style="position: absolute; top: 446px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 446px; left:210px;"></div>
                <label style="position: absolute; top: 446px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 446px; left:164px;"></div>
                <label style="position: absolute; top: 446px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 446px; left:210px;"></div>
                <label style="position: absolute; top: 446px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <label style="position: absolute; top: 452px; left:30px; font-size:12px;"><b><?= date('d/m/Y' ,strtotime($row_gerando['validadeExtintor'])); ?></b></label>
        <div class="retangular" style="position: absolute; top: 444px; left:268px;"><?= $row_gerando['txt_obsextintor']; ?></div>

        <label style="position: absolute; top: 470px; left:30px;">Farol Alto:</label>
        <?php 
            if ($row_gerando['id_farol_alto'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 470px; left:164px;"></div>
                <label style="position: absolute; top: 470px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 470px; left:210px;"></div>
                <label style="position: absolute; top: 470px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 470px; left:164px;"></div>
                <label style="position: absolute; top: 470px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 470px; left:210px;"></div>
                <label style="position: absolute; top: 470px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 468px; left:268px;"><?= $row_gerando['txt_farolAlto']; ?></div>

        <label style="position: absolute; top: 490px; left:30px;">Farol Baixo:</label>
        <?php 
            if ($row_gerando['id_farol_baixo'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 490px; left:164px;"></div>
                <label style="position: absolute; top: 490px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 490px; left:210px;"></div>
                <label style="position: absolute; top: 490px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 490px; left:164px;"></div>
                <label style="position: absolute; top: 490px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 490px; left:210px;"></div>
                <label style="position: absolute; top: 490px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 488px; left:268px;"><?= $row_gerando['txt_farolbaixo']; ?></div>

        <label style="position: absolute; top: 510px; left:30px;">Freio Motor:</label>
        <?php 
            if ($row_gerando['id_freiomotor'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 510px; left:164px;"></div>
                <label style="position: absolute; top: 510px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 510px; left:210px;"></div>
                <label style="position: absolute; top: 510px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 510px; left:164px;"></div>
                <label style="position: absolute; top: 510px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 510px; left:210px;"></div>
                <label style="position: absolute; top: 510px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 510px; left:268px;"><?= $row_gerando['txt_freiomotor']; ?></div>

        <label style="position: absolute; top: 530px; left:30px;">Lacre da Placa:</label>
        <?php 
            if ($row_gerando['id_lacre_placa'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 530px; left:164px;"></div>
                <label style="position: absolute; top: 530px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 530px; left:210px;"></div>
                <label style="position: absolute; top: 530px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 530px; left:164px;"></div>
                <label style="position: absolute; top: 530px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 530px; left:210px;"></div>
                <label style="position: absolute; top: 530px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 530px; left:268px;"><?= $row_gerando['txt_lacreplaca']; ?></div>

        <label style="position: absolute; top: 550px; left:30px;">Lant. Lado Dir/Esq:</label>
        <?php 
            if ($row_gerando['id_lanterna_DirEsq'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 550px; left:164px;"></div>
                <label style="position: absolute; top: 550px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 550px; left:210px;"></div>
                <label style="position: absolute; top: 550px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 550px; left:164px;"></div>
                <label style="position: absolute; top: 550px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 550px; left:210px;"></div>
                <label style="position: absolute; top: 550px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 550px; left:268px;"><?= $row_gerando['txt_laternaDirEsq']; ?></div>

        <label style="position: absolute; top: 570px; left:30px;">Luz da Placa:</label>
        <?php 
            if ($row_gerando['id_luz_placa'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 570px; left:164px;"></div>
                <label style="position: absolute; top: 570px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 570px; left:210px;"></div>
                <label style="position: absolute; top: 570px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 570px; left:164px;"></div>
                <label style="position: absolute; top: 570px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 570px; left:210px;"></div>
                <label style="position: absolute; top: 570px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 570px; left:268px;"><?= $row_gerando['txt_luzplaca']; ?></div>

        <label style="position: absolute; top: 590px; left:30px;">Luz de Freio:</label>
        <?php 
            if ($row_gerando['id_luz_freio'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 590px; left:164px;"></div>
                <label style="position: absolute; top: 590px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 590px; left:210px;"></div>
                <label style="position: absolute; top: 590px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 590px; left:164px;"></div>
                <label style="position: absolute; top: 590px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 590px; left:210px;"></div>
                <label style="position: absolute; top: 590px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 590px; left:268px;"><?= $row_gerando['txt_luzfreio']; ?></div>

        <label style="position: absolute; top: 610px; left:30px;">Luz de Ré:</label>
        <?php 
            if ($row_gerando['id_luz_re'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 610px; left:164px;"></div>
                <label style="position: absolute; top: 610px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 610px; left:210px;"></div>
                <label style="position: absolute; top: 610px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 610px; left:164px;"></div>
                <label style="position: absolute; top: 610px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 610px; left:210px;"></div>
                <label style="position: absolute; top: 610px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 610px; left:268px;"><?= $row_gerando['txt_luzre']; ?></div>

        <label style="position: absolute; top: 630px; left:30px;">Luz de Teto:</label>
        <?php 
            if ($row_gerando['id_luz_teto'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 630px; left:164px;"></div>
                <label style="position: absolute; top: 630px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 630px; left:210px;"></div>
                <label style="position: absolute; top: 630px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 630px; left:164px;"></div>
                <label style="position: absolute; top: 630px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 630px; left:210px;"></div>
                <label style="position: absolute; top: 630px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 630px; left:268px;"><?= $row_gerando['txt_luzteto']; ?></div>

        <label style="position: absolute; top: 650px; left:30px;">Luzes de Painel:</label>
        <?php 
            if ($row_gerando['id_luzes_painel'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 650px; left:164px;"></div>
                <label style="position: absolute; top: 650px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 650px; left:210px;"></div>
                <label style="position: absolute; top: 650px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 650px; left:164px;"></div>
                <label style="position: absolute; top: 650px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 650px; left:210px;"></div>
                <label style="position: absolute; top: 650px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 650px; left:268px;"><?= $row_gerando['txt_luzesPainel']; ?></div>

        <label style="position: absolute; top: 670px; left:30px;">Maçanet Ext.Dir/Esq:</label>
        <?php 
            if ($row_gerando['id_mac_ExternaDirEsq'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 670px; left:164px;"></div>
                <label style="position: absolute; top: 670px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 670px; left:210px;"></div>
                <label style="position: absolute; top: 670px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 670px; left:164px;"></div>
                <label style="position: absolute; top: 670px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 670px; left:210px;"></div>
                <label style="position: absolute; top: 670px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 670px; left:268px;"><?= $row_gerando['txt_macExternaDirEsq']; ?></div>

        <label style="position: absolute; top: 690px; left:30px;">Maçanet Int.Dir/Esq:</label>
        <?php 
            if ($row_gerando['id_mar_intDirEsq'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 690px; left:164px;"></div>
                <label style="position: absolute; top: 690px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 690px; left:210px;"></div>
                <label style="position: absolute; top: 690px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 690px; left:164px;"></div>
                <label style="position: absolute; top: 690px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 690px; left:210px;"></div>
                <label style="position: absolute; top: 690px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 690px; left:268px;"><?= $row_gerando['txt_marintDirEsq']; ?></div>

        <label style="position: absolute; top: 710px; left:30px;">Mangueira de Ar:</label>
        <?php 
            if ($row_gerando['id_mangueira_ar'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 710px; left:164px;"></div>
                <label style="position: absolute; top: 710px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 710px; left:210px;"></div>
                <label style="position: absolute; top: 710px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 710px; left:164px;"></div>
                <label style="position: absolute; top: 710px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 710px; left:210px;"></div>
                <label style="position: absolute; top: 710px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 710px; left:268px;"><?= $row_gerando['txt_mangueiraAr']; ?></div>

        <label style="position: absolute; top: 730px; left:30px;">Marc. de Comb.Elet.:</label>
        <?php 
            if ($row_gerando['id_combEletrico'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 730px; left:164px;"></div>
                <label style="position: absolute; top: 730px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 730px; left:210px;"></div>
                <label style="position: absolute; top: 730px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 730px; left:164px;"></div>
                <label style="position: absolute; top: 730px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 730px; left:210px;"></div>
                <label style="position: absolute; top: 730px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 730px; left:268px;"><?= $row_gerando['txt_CombEletrico']; ?></div>

        <label style="position: absolute; top: 752px; left:30px; font-size:13px">Marc. de Comb. Ponteiro</label>
        <?php 
            if ($row_gerando['id_marc_combPonteiro'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 750px; left:164px;"></div>
                <label style="position: absolute; top: 750px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 750px; left:210px;"></div>
                <label style="position: absolute; top: 750px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 750px; left:164px;"></div>
                <label style="position: absolute; top: 750px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 750px; left:210px;"></div>
                <label style="position: absolute; top: 750px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 750px; left:268px;"><?= $row_gerando['txt_CombPonteiro']; ?></div>

        <label style="position: absolute; top: 770px; left:30px;">Óleo do Motor:</label>
        <?php 
            if ($row_gerando['id_oleoMotor'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 770px; left:164px;"></div>
                <label style="position: absolute; top: 770px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 770px; left:210px;"></div>
                <label style="position: absolute; top: 770px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 770px; left:164px;"></div>
                <label style="position: absolute; top: 770px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 770px; left:210px;"></div>
                <label style="position: absolute; top: 770px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 770px; left:268px;"><?= $row_gerando['txt_oleoMotor']; ?></div>

        <label style="position: absolute; top: 792px; left:30px; font-size:12px;">Palhetas do Para-brisas:</label>
        <?php 
            if ($row_gerando['id_palheParaBrisas'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 790px; left:164px;"></div>
                <label style="position: absolute; top: 790px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 790px; left:210px;"></div>
                <label style="position: absolute; top: 790px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 790px; left:164px;"></div>
                <label style="position: absolute; top: 790px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 790px; left:210px;"></div>
                <label style="position: absolute; top: 790px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 790px; left:268px;"><?= $row_gerando['txt_palheparaBrisas']; ?></div>

        <label style="position: absolute; top: 810px; left:30px;">Para Barro:</label>
        <?php 
            if ($row_gerando['id_paraBarro'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 810px; left:164px;"></div>
                <label style="position: absolute; top: 810px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 810px; left:210px;"></div>
                <label style="position: absolute; top: 810px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 810px; left:164px;"></div>
                <label style="position: absolute; top: 810px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 810px; left:210px;"></div>
                <label style="position: absolute; top: 810px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 810px; left:268px;"><?= $row_gerando['txt_paraBarro']; ?></div>

        <label style="position: absolute; top: 830px; left:30px;">Para-brisas:</label>
        <?php 
            if ($row_gerando['id_paraBrisas'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 830px; left:164px;"></div>
                <label style="position: absolute; top: 830px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 830px; left:210px;"></div>
                <label style="position: absolute; top: 830px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 830px; left:164px;"></div>
                <label style="position: absolute; top: 830px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 830px; left:210px;"></div>
                <label style="position: absolute; top: 830px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 830px; left:268px;"><?= $row_gerando['txt_paraBrisas']; ?></div>

        <label style="position: absolute; top: 852px; left:30px; font-size:12px;">Para-choque Dianteiro:</label>
        <?php 
            if ($row_gerando['id_paraChoqueDianteiro'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 850px; left:164px;"></div>
                <label style="position: absolute; top: 850px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 850px; left:210px;"></div>
                <label style="position: absolute; top: 850px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 850px; left:164px;"></div>
                <label style="position: absolute; top: 850px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 850px; left:210px;"></div>
                <label style="position: absolute; top: 850px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 850px; left:268px;"><?= $row_gerando['txt_paraChoqueDianteiro']; ?></div>

        <label style="position: absolute; top: 872px; left:30px; font-size:12px;">Para-choque Traseiro:</label>
        <?php 
            if ($row_gerando['id_paraChoqueTraseiro'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 870px; left:164px;"></div>
                <label style="position: absolute; top: 870px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 870px; left:210px;"></div>
                <label style="position: absolute; top: 870px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 870px; left:164px;"></div>
                <label style="position: absolute; top: 870px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 870px; left:210px;"></div>
                <label style="position: absolute; top: 870px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 870px; left:268px;"><?= $row_gerando['txt_paraChoqueTraseiro']; ?></div>

        <label style="position: absolute; top: 890px; left:30px;">Para-lama:</label>
        <?php 
            if ($row_gerando['id_paraLama'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 890px; left:164px;"></div>
                <label style="position: absolute; top: 890px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 890px; left:210px;"></div>
                <label style="position: absolute; top: 890px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 890px; left:164px;"></div>
                <label style="position: absolute; top: 890px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 890px; left:210px;"></div>
                <label style="position: absolute; top: 890px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 890px; left:268px;"><?= $row_gerando['txt_paraLama']; ?></div>

        <label style="position: absolute; top: 910px; left:30px;">Pisca Alerta:</label>
        <?php 
            if ($row_gerando['id_piscaAlerta'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 910px; left:164px;"></div>
                <label style="position: absolute; top: 910px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 910px; left:210px;"></div>
                <label style="position: absolute; top: 910px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 910px; left:164px;"></div>
                <label style="position: absolute; top: 910px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 910px; left:210px;"></div>
                <label style="position: absolute; top: 910px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 910px; left:268px;"><?= $row_gerando['txt_piscaAlerta']; ?></div>

        <label style="position: absolute; top: 930px; left:30px;">Pneus:</label>
        <?php 
            if ($row_gerando['id_pneus'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 930px; left:164px;"></div>
                <label style="position: absolute; top: 930px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 930px; left:210px;"></div>
                <label style="position: absolute; top: 930px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 930px; left:164px;"></div>
                <label style="position: absolute; top: 930px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 930px; left:210px;"></div>
                <label style="position: absolute; top: 930px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 930px; left:268px;"><?= $row_gerando['txt_pneus']; ?></div>

        <label style="position: absolute; top: 950px; left:30px;">Pneus Lacrado:</label>
        <?php 
            if ($row_gerando['id_pneusLacrado'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 950px; left:164px;"></div>
                <label style="position: absolute; top: 950px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 950px; left:210px;"></div>
                <label style="position: absolute; top: 950px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 950px; left:164px;"></div>
                <label style="position: absolute; top: 950px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 950px; left:210px;"></div>
                <label style="position: absolute; top: 950px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 950px; left:268px;"><?= $row_gerando['txt_pneusLacrado']; ?></div>

        <label style="position: absolute; top: 972px; left:30px; font-size:12px;">Porcas / Paraf. Das Rodas:</label>
        <?php 
            if ($row_gerando['id_porcasParafRodas'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 970px; left:164px;"></div>
                <label style="position: absolute; top: 970px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 970px; left:210px;"></div>
                <label style="position: absolute; top: 970px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 970px; left:164px;"></div>
                <label style="position: absolute; top: 970px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 970px; left:210px;"></div>
                <label style="position: absolute; top: 970px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 970px; left:268px;"><?= $row_gerando['txt_pocasParafRodas']; ?></div>

        <label style="position: absolute; top: 990px; left:30px;">Rádio Amador:</label>
        <?php 
            if ($row_gerando['id_radioAmador'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 990px; left:164px;"></div>
                <label style="position: absolute; top: 990px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 990px; left:210px;"></div>
                <label style="position: absolute; top: 990px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 990px; left:164px;"></div>
                <label style="position: absolute; top: 990px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 990px; left:210px;"></div>
                <label style="position: absolute; top: 990px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 990px; left:268px;"><?= $row_gerando['txt_radioAmador']; ?></div>

        <label style="position: absolute; top: 1010px; left:30px;">Rádio do Veículo:</label>
        <?php 
            if ($row_gerando['id_radioVeiculo'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 1010px; left:164px;"></div>
                <label style="position: absolute; top: 1010px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 1010px; left:210px;"></div>
                <label style="position: absolute; top: 1010px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 1010px; left:164px;"></div>
                <label style="position: absolute; top: 1010px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 1010px; left:210px;"></div>
                <label style="position: absolute; top: 1010px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 1010px; left:268px;"><?= $row_gerando['txt_radioVeiculo']; ?></div>

        <label style="position: absolute; top: 1032px; left:30px; font-size:12px;">Ret. Élet. Lado Dir./Esq.:</label>
        <?php 
            if ($row_gerando['id_eletLadoDirEsq'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 1030px; left:164px;"></div>
                <label style="position: absolute; top: 1030px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 1030px; left:210px;"></div>
                <label style="position: absolute; top: 1030px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 1030px; left:164px;"></div>
                <label style="position: absolute; top: 1030px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 1030px; left:210px;"></div>
                <label style="position: absolute; top: 1030px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 1030px; left:268px;"><?= $row_gerando['txt_eletLadoDirEsq']; ?></div>

        <label style="position: absolute; top: 1052px; left:30px; font-size:12px;">Seta Direita / Esquerda:</label>
        <?php 
            if ($row_gerando['id_setaDirEsq'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 1050px; left:164px;"></div>
                <label style="position: absolute; top: 1050px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 1050px; left:210px;"></div>
                <label style="position: absolute; top: 1050px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 1050px; left:164px;"></div>
                <label style="position: absolute; top: 1050px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 1050px; left:210px;"></div>
                <label style="position: absolute; top: 1050px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 1050px; left:268px;"><?= $row_gerando['txt_setaDirEsq']; ?></div>

        <label style="position: absolute; top: 1070px; left:30px;">Tacográfo:</label>
        <?php 
            if ($row_gerando['id_tacografo'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 1070px; left:164px;"></div>
                <label style="position: absolute; top: 1070px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 1070px; left:210px;"></div>
                <label style="position: absolute; top: 1070px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 1070px; left:164px;"></div>
                <label style="position: absolute; top: 1070px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 1070px; left:210px;"></div>
                <label style="position: absolute; top: 1070px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 1070px; left:268px;"><?= $row_gerando['txt_tacografo']; ?></div>

        <label style="position: absolute; top: 1090px; left:30px;">Tampa do Tanque:</label>
        <?php 
            if ($row_gerando['id_tampaTanque'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 1090px; left:164px;"></div>
                <label style="position: absolute; top: 1090px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 1090px; left:210px;"></div>
                <label style="position: absolute; top: 1090px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 1090px; left:164px;"></div>
                <label style="position: absolute; top: 1090px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 1090px; left:210px;"></div>
                <label style="position: absolute; top: 1090px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 1090px; left:268px;"><?= $row_gerando['txt_tampaTanque']; ?></div>

        <label style="position: absolute; top: 1110px; left:30px;">Tapeçaria - Bancos:</label>
        <?php 
            if ($row_gerando['id_tapecariaBancos'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 1110px; left:164px;"></div>
                <label style="position: absolute; top: 1110px; left:184px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 1110px; left:210px;"></div>
                <label style="position: absolute; top: 1110px; left:230px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 1110px; left:164px;"></div>
                <label style="position: absolute; top: 1110px; left:184px;">OK</label>
                <div class="circle" style="position: absolute; top: 1110px; left:210px;"></div>
                <label style="position: absolute; top: 1110px; left:230px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 1110px; left:268px;"><?= $row_gerando['txt_tapecariaBancos']; ?></div>

        <label style="position: absolute; top: 156px; left:438px;">Tapeçaria - Cama:</label>
        <?php 
            if ($row_gerando['id_tapecariaCama'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 156px; left:556px;"></div>
                <label style="position: absolute; top: 156px; left:576px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 156px; left:602px;"></div>
                <label style="position: absolute; top: 156px; left:622px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 156px; left:556px;"></div>
                <label style="position: absolute; top: 156px; left:576px;">OK</label>
                <div class="circle" style="position: absolute; top: 156px; left:602px;"></div>
                <label style="position: absolute; top: 156px; left:622px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 150px; left:660px;"><?= $row_gerando['txt_tapecariaCama'] ?></div>

        <label style="position: absolute; top: 180px; left:438px; font-size:12px;">Trava da Porta Dir./Esq.:</label>
        <?php 
            if ($row_gerando['id_travaPortaDirEsq'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 178px; left:556px;"></div>
                <label style="position: absolute; top: 178px; left:576px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 178px; left:602px;"></div>
                <label style="position: absolute; top: 178px; left:622px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 178px; left:556px;"></div>
                <label style="position: absolute; top: 178px; left:576px;">OK</label>
                <div class="circle" style="position: absolute; top: 178px; left:602px;"></div>
                <label style="position: absolute; top: 178px; left:622px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 178px; left:660px;"><?= $row_gerando['txt_travaPortaDirEsq'] ?></div>

        <label style="position: absolute; top: 197px; left:438px;">Ventilador:</label>
        <?php 
            if ($row_gerando['id_ventilador'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 197px; left:556px;"></div>
                <label style="position: absolute; top: 197px; left:576px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 197px; left:602px;"></div>
                <label style="position: absolute; top: 197px; left:622px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 197px; left:556px;"></div>
                <label style="position: absolute; top: 197px; left:576px;">OK</label>
                <div class="circle" style="position: absolute; top: 197px; left:602px;"></div>
                <label style="position: absolute; top: 197px; left:622px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 197px; left:660px;"><?= $row_gerando['txt_ventilador'] ?></div>

        <label style="position: absolute; top: 218px; left:438px; font-size:12px;">Vidro Elét. - Dir./Esq.:</label>
        <?php 
            if ($row_gerando['id_vidroEletDirEsq'] == 0)
            {
        ?>
                <div class="circle" style="position: absolute; top: 216px; left:556px;"></div>
                <label style="position: absolute; top: 216px; left:576px;">OK</label>
                <div class="circle_marcado" style="position: absolute; top: 216px; left:602px;"></div>
                <label style="position: absolute; top: 216px; left:622px;">NÃO</label>
        <?php
            }else{
        ?> 
                <div class="circle_marcado" style="position: absolute; top: 216px; left:556px;"></div>
                <label style="position: absolute; top: 216px; left:576px;">OK</label>
                <div class="circle" style="position: absolute; top: 216px; left:602px;"></div>
                <label style="position: absolute; top: 216px; left:622px;">NÃO</label>
        <?php
            }
        ?>
        <div class="retangular" style="position: absolute; top: 216px; left:660px;"><?= $row_gerando['txt_vidroEletDirEsq'] ?></div>
        
    
        <div style="position: absolute; top: 1150px; left:530px; text-align:left;">
            <label style="font-size:14px">Usuário: <?=$logado ?></label>
        </div>
        
        <label style="position: absolute; top: 1150px; left:60px; font-size:14px">Data e hora da impressão: <?= date('d/m/Y \à\s H:i:s'); ?></label>
        </div>
    </div>
</body>
</html>