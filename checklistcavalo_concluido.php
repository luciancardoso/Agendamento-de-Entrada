<?php

    include_once('config.php');

    $checkUnidade = $_POST['id_chekUnidadeCav'];
    $placaCavalo = $_POST['cod_placaCavalo'];
    $placaPrancha = $_POST['cod_placaPranchaBau'];
    $datahora = $_POST['cod_datahora'];
    $acdeletrico = $_POST['id_acdeletrico'];
    $eletrico = $_POST['txt_eletrico'];
    $agua_radiador = $_POST['id_agua_radiador'];
    $agradiador = $_POST['txt_agradiador'];
    $arcondicionado = $_POST['id_arcondicionado'];
    $txt_arcondicionado = $_POST['txt_arcondicionado'];
    $id_arameplaca = $_POST['id_arameplaca'];
    $txt_arameplaca = $_POST['txt_arameplaca'];
    $id_arocuboroda = $_POST['id_arocuboroda'];
    $txt_arocuboroda = $_POST['txt_arocuboroda'];
    $id_bateria = $_POST['id_bateria'];
    $txt_bateria = $_POST['txt_bateria'];
    $id_bicos = $_POST['id_bicos'];
    $txt_bicos = $_POST['txt_bicos'];
    $id_buzina = $_POST['id_buzina'];
    $txt_buzina = $_POST['txt_buzina'];
    $id_certitocografo = $_POST['id_certitocografo'];
    $txt_certitocografo = $_POST['txt_certitocografo'];
    $id_ch_ignicao = $_POST['id_ch_ignicao'];
    $txt_ch_ignicao = $_POST['txt_ch_ignicao'];
    $id_chicote = $_POST['id_chicote'];
    $txt_chicote = $_POST['txt_chicote'];
    $id_ci_seguranca = $_POST['id_ci_seguranca'];
    $txt_ci_seguranca = $_POST['txt_ci_seguranca'];
    $id_crlv_veiculo = $_POST['id_crlv_veiculo'];
    $txt_crlvveiculo = $_POST['txt_crlvveiculo'];
    $id_retrovisorDirEsq = $_POST['id_retrovisorDirEsq'];
    $txt_retrovisorDirEsq = $_POST['txt_retrovisorDirEsq'];
    $validadeExtintor = $_POST['validadeExtintor'];
    $id_extintorVal = $_POST['id_extintorVal'];
    $txt_obsextintor = $_POST['txt_obsextintor'];
    $id_farol_alto = $_POST['id_farol_alto'];
    $txt_farolAlto = $_POST['txt_farolAlto'];
    $id_farol_baixo = $_POST['id_farol_baixo'];
    $txt_farolbaixo = $_POST['txt_farolbaixo'];
    $id_freiomotor = $_POST['id_freiomotor'];
    $txt_freiomotor = $_POST['txt_freiomotor'];
    $id_lacre_placa = $_POST['id_lacre_placa'];
    $txt_lacreplaca = $_POST['txt_lacreplaca'];
    $id_lanterna_DirEsq = $_POST['id_lanterna_DirEsq'];
    $txt_laternaDirEsq = $_POST['txt_laternaDirEsq'];
    $id_lateralDirEsq = $_POST['id_lateralDirEsq'];
    $txt_lateralDirEsq = $_POST['txt_lateralDirEsq'];
    $id_luz_placa = $_POST['id_luz_placa'];
    $txt_luzplaca = $_POST['txt_luzplaca'];
    $id_luz_freio = $_POST['id_luz_freio'];
    $txt_luzfreio = $_POST['txt_luzfreio'];
    $id_luz_re = $_POST['id_luz_re'];
    $txt_luzre = $_POST['txt_luzre'];
    $id_luz_teto = $_POST['id_luz_teto'];
    $txt_luzteto = $_POST['txt_luzteto'];
    $id_luzes_painel = $_POST['id_luzes_painel'];
    $txt_luzesPainel = $_POST['txt_luzesPainel'];
    $id_mac_ExternaDirEsq = $_POST['id_mac_ExternaDirEsq'];
    $txt_macExternaDirEsq = $_POST['txt_macExternaDirEsq'];
    $id_mar_intDirEsq = $_POST['id_mar_intDirEsq'];
    $txt_marintDirEsq = $_POST['txt_marintDirEsq'];
    $id_mangueira_ar = $_POST['id_mangueira_ar'];
    $txt_mangueiraAr = $_POST['txt_mangueiraAr'];
    $id_combEletrico = $_POST['id_combEletrico'];
    $txt_CombEletrico = $_POST['txt_CombEletrico'];
    $id_marc_combPonteiro = $_POST['id_marc_combPonteiro'];
    $txt_CombPonteiro = $_POST['txt_CombPonteiro'];
    $id_oleoMotor = $_POST['id_oleoMotor'];
    $txt_oleoMotor = $_POST['txt_oleoMotor'];
    $id_palheParaBrisas = $_POST['id_palheParaBrisas'];
    $txt_palheparaBrisas = $_POST['txt_palheparaBrisas'];
    $id_paraBarro = $_POST['id_paraBarro'];
    $txt_paraBarro = $_POST['txt_paraBarro'];
    $id_paraBrisas = $_POST['id_paraBrisas'];
    $txt_paraBrisas = $_POST['txt_paraBrisas'];
    $id_paraChoqueDianteiro = $_POST['id_paraChoqueDianteiro'];
    $txt_paraChoqueDianteiro = $_POST['txt_paraChoqueDianteiro'];
    $id_paraChoqueTraseiro = $_POST['id_paraChoqueTraseiro'];
    $txt_paraChoqueTraseiro = $_POST['txt_paraChoqueTraseiro'];
    $id_paraLama = $_POST['id_paraLama'];
    $txt_paraLama = $_POST['txt_paraLama'];
    $id_piscaAlerta = $_POST['id_piscaAlerta'];
    $txt_piscaAlerta = $_POST['txt_piscaAlerta'];
    $id_placa = $_POST['id_placa'];
    $txt_placa = $_POST['txt_placa'];
    $id_pneus = $_POST['id_pneus'];
    $txt_pneus = $_POST['txt_pneus'];
    $id_pneusLacrado = $_POST['id_pneusLacrado'];
    $txt_pneusLacrado = $_POST['txt_pneusLacrado'];
    $id_porcasParafRodas = $_POST['id_porcasParafRodas'];
    $txt_pocasParafRodas = $_POST['txt_pocasParafRodas'];
    $id_radioAmador = $_POST['id_radioAmador'];
    $txt_radioAmador = $_POST['txt_radioAmador'];
    $id_radioVeiculo = $_POST['id_radioVeiculo'];
    $txt_radioVeiculo = $_POST['txt_radioVeiculo'];
    $id_eletLadoDirEsq = $_POST['id_eletLadoDirEsq'];
    $txt_eletLadoDirEsq = $_POST['txt_eletLadoDirEsq'];
    $id_setaDirEsq = $_POST['id_setaDirEsq'];
    $txt_setaDirEsq = $_POST['txt_setaDirEsq'];
    $id_tacografo = $_POST['id_tacografo'];
    $txt_tacografo = $_POST['txt_tacografo'];
    $id_tampaTanque = $_POST['id_tampaTanque'];
    $id_tapecariaBancos = $_POST['id_tapecariaBancos'];
    $txt_tapecariaBancos = $_POST['txt_tapecariaBancos'];
    $id_tapecariaCama = $_POST['id_tapecariaCama'];
    $txt_tapecariaCama = $_POST['txt_tapecariaCama'];
    $id_travaPortaDirEsq = $_POST['id_travaPortaDirEsq'];
    $txt_travaPortaDirEsq = $_POST['txt_travaPortaDirEsq'];
    $id_ventilador = $_POST['id_ventilador'];
    $txt_ventilador = $_POST['txt_ventilador'];
    $id_vidroEletDirEsq = $_POST['id_vidroEletDirEsq'];
    $txt_vidroEletDirEsq = $_POST['txt_vidroEletDirEsq'];


    $result_checklistcavalo = "INSERT INTO tb_checklistcavalo(id_chekUnidadeCav, cod_placaCavalo, cod_placaPranchaBau, cod_datahora, id_acdeletrico, txt_eletrico, id_agua_radiador, txt_agradiador, id_arcondicionado, txt_arcondicionado, id_arameplaca, txt_arameplaca, id_arocuboroda, txt_arocuboroda,
    id_bateria, txt_bateria, id_bicos, txt_bicos, id_buzina, txt_buzina, id_certitocografo, txt_certitocografo, id_ch_ignicao, txt_ch_ignicao, id_chicote, txt_chicote, id_ci_seguranca, txt_ci_seguranca, id_crlv_veiculo, txt_crlvveiculo,
    id_retrovisorDirEsq, txt_retrovisorDirEsq, validadeExtintor, id_extintorVal, txt_obsextintor, id_farol_alto, txt_farolAlto, id_farol_baixo, txt_farolbaixo, id_freiomotor, txt_freiomotor, id_lacre_placa, txt_lacreplaca, id_lanterna_DirEsq,
    txt_laternaDirEsq, id_lateralDirEsq, txt_lateralDirEsq, id_luz_placa, txt_luzplaca, id_luz_freio, txt_luzfreio, id_luz_re, txt_luzre, id_luz_teto, txt_luzteto, id_luzes_painel, txt_luzesPainel, id_mac_ExternaDirEsq, txt_macExternaDirEsq,
    id_mar_intDirEsq, txt_marintDirEsq, id_mangueira_ar, txt_mangueiraAr, id_combEletrico, txt_CombEletrico, id_marc_combPonteiro, txt_CombPonteiro, id_oleoMotor, txt_oleoMotor, id_palheParaBrisas, txt_palheparaBrisas, id_paraBarro, txt_paraBarro,
    id_paraBrisas, txt_paraBrisas, id_paraChoqueDianteiro, txt_paraChoqueDianteiro, id_paraChoqueTraseiro, txt_paraChoqueTraseiro, id_paraLama, txt_paraLama, id_piscaAlerta, txt_piscaAlerta, id_placa, txt_placa, id_pneus, txt_pneus, id_pneusLacrado,
    txt_pneusLacrado, id_porcasParafRodas, txt_pocasParafRodas, id_radioAmador, txt_radioAmador, id_radioVeiculo, txt_radioVeiculo, id_eletLadoDirEsq, txt_eletLadoDirEsq, id_setaDirEsq, txt_setaDirEsq, id_tacografo, txt_tacografo, id_tampaTanque,
    txt_tampaTanque, id_tapecariaBancos, txt_tapecariaBancos, id_tapecariaCama, txt_tapecariaCama, id_travaPortaDirEsq, txt_travaPortaDirEsq, id_ventilador, txt_ventilador, id_vidroEletDirEsq, txt_vidroEletDirEsq) 
    VALUES 
    ('$checkUnidade', '$placaCavalo', '$placaPrancha', '$datahora', '$acdeletrico', '$eletrico', '$agua_radiador', '$agradiador', '$arcondicionado', '$txt_arcondicionado', '$id_arameplaca', '$txt_arameplaca', '$id_arocuboroda', '$txt_arocuboroda', '$id_bateria', '$txt_bateria', '$id_bicos',
    '$txt_bicos', '$id_buzina', '$txt_buzina', '$id_certitocografo', '$txt_certitocografo', '$id_ch_ignicao', '$txt_ch_ignicao', '$id_chicote', '$txt_chicote', '$id_ci_seguranca', '$txt_ci_seguranca', '$id_crlv_veiculo', '$txt_crlvveiculo',
    '$id_retrovisorDirEsq', '$txt_retrovisorDirEsq', '$validadeExtintor', '$id_extintorVal', '$txt_obsextintor', '$id_farol_alto', '$txt_farolAlto', '$id_farol_baixo', '$txt_farolbaixo', '$id_freiomotor', '$txt_freiomotor', '$id_lacre_placa',
    '$txt_lacreplaca', '$id_lanterna_DirEsq', '$txt_laternaDirEsq', '$id_lateralDirEsq', '$txt_lateralDirEsq', '$id_luz_placa', '$txt_luzplaca', '$id_luz_freio', '$txt_luzfreio', '$id_luz_re', '$txt_luzre', '$id_luz_teto', '$txt_luzteto',
    '$id_luzes_painel', '$txt_luzesPainel', '$id_mac_ExternaDirEsq', '$txt_macExternaDirEsq', '$id_mar_intDirEsq', '$txt_marintDirEsq', '$id_mangueira_ar', '$txt_mangueiraAr', '$id_combEletrico', '$txt_CombEletrico', '$id_marc_combPonteiro',
    '$txt_CombPonteiro', '$id_oleoMotor', '$txt_oleoMotor', '$id_palheParaBrisas', '$txt_palheparaBrisas', '$id_paraBarro', '$txt_paraBarro', '$id_paraBrisas', '$txt_paraBrisas', '$id_paraChoqueDianteiro', '$txt_paraChoqueDianteiro', '$id_paraChoqueTraseiro',
    '$txt_paraChoqueTraseiro', '$id_paraLama', '$txt_paraLama', '$id_piscaAlerta', '$txt_piscaAlerta', '$id_placa', '$txt_placa', '$id_pneus', '$txt_pneus', '$id_pneusLacrado', '$txt_pneusLacrado', '$id_porcasParafRodas', '$txt_pocasParafRodas',
    '$id_radioAmador', '$txt_radioAmador', '$id_radioVeiculo', '$txt_radioVeiculo', '$id_eletLadoDirEsq', '$txt_eletLadoDirEsq', '$id_setaDirEsq', '$txt_setaDirEsq', '$id_tacografo', '$txt_tacografo', '$id_tampaTanque', '$txt_tampaTanque', '$id_tapecariaBancos',
    '$txt_tapecariaBancos', '$id_tapecariaCama', '$txt_tapecariaCama', '$id_travaPortaDirEsq', '$txt_travaPortaDirEsq', '$id_ventilador', '$txt_ventilador', '$id_vidroEletDirEsq', '$txt_vidroEletDirEsq')";
    
    $resultado_checklist = mysqli_query($conexao, $result_checklistcavalo)
    

?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CheckList Concluído</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="./Assets/css/base/base.css">
    <link rel="stylesheet" href="./Assets/css/checklist_concluido.css">
    <link rel="stylesheet" href="./Assets/css/componentes/cartao.css">
    <link rel="stylesheet" href="./Assets/css/componentes/inputs.css">
    <link rel="stylesheet" href="./Assets/css/componentes/botao.css">
</head>
<body>

    <style>
        .cadastro-cabecalho__logo {
            width: 9.625rem;
            margin-bottom: 1.5rem;
        }
    </style>

    <main class="container flex flex--coluna flex--centro">
        <div class="cadastro-cabecalho">
            <img src="./Assets/img/logoAduana.png" alt="Logo Aduana" height="70" class="cadastro-cabecalho__logo">
            <h1 class="cadastro-cabecalho__titulo">Sistema Aduana</h1>
        </div>
        <section class="cadastro-cartao cartao">
            <span class="cadastro-cartao__icone-concluido"></span>
            <h1 class="cadastro-cartao__titulo cartao__titulo">CheckList Concluído!</h1>
            <a href="checklist.php" class="botao">Pagina Inicial</a>
        </section>
    </main>
</body>
</html>
