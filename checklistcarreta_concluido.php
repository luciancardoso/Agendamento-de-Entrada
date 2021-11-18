<?php
    include_once('config.php');

    $id_chekUnidBau = $_POST['id_chekUnidadeBau'];
    $motorista = $_POST['tx_motorista'];
    $placacarreta = $_POST['cod_placacarreta'];
    $datahora = $_POST['cod_datahora'];
    $sts_frentebau = $_POST['frenteCarretaBau'];
    $tx_frentebau = $_POST['obs_frenteCarretaBau'];
    $sts_lacrePlaca = $_POST['lacrePlaca'];
    $tx_lacrePlaca = $_POST['obs_lacrePlaca'];
    $sts_lanternaDireita = $_POST['lanternaDireita'];
    $tx_lanternaDireita = $_POST['obs_lanternaDireita'];
    $sts_lanternaEsquerda = $_POST['lanternaEsquerda'];
    $tx_obs_lanternaEsquerda = $_POST['obs_lanternaEsquerda'];
    $sts_lateralDirFitLuminosa = $_POST['lateralDirFitLuminosa'];
    $tx_lateralDirFitLuminosa = $_POST['obs_lateralDirFitLuminosa'];
    $sts_lateralDirCarretaBau = $_POST['lateralDirCarretaBau'];
    $tx_lateralDirCarretaBau = $_POST['obs_lateralDirCarretaBau'];
    $sts_lateralEsqFitLumino = $_POST['lateralEsqFitLumino'];
    $tx_lateralEsqFitLumino = $_POST['obs_lateralEsqFitLumino'];
    $sts_lateralEsqCarretaBau = $_POST['lateralEsqCarretaBau'];
    $tx_lateralEsqCarretaBau = $_POST['obs_lateralEsqCarretaBau'];
    $sts_travado = $_POST['travado'];
    $tx_travado = $_POST['obs_travado'];
    $sts_luzDaPlaca = $_POST['luzDaPlaca'];
    $tx_luzDaPlaca = $_POST['obs_luzDaPlaca'];
    $sts_luzDeFreio = $_POST['luzDeFreio'];
    $tx_luzDeFreio = $_POST['obs_luzDeFreio'];
    $sts_luzDeRe = $_POST['luzDeRe'];
    $tx_luzDeRe = $_POST['obs_luzDeRe'];
    $sts_paraBarro = $_POST['paraBarro'];
    $tx_paraBarro = $_POST['obs_paraBarro'];
    $sts_paraChoque = $_POST['paraChoque'];
    $tx_paraChoque = $_POST['obs_paraChoque'];
    $sts_paraChoqueFitLuminosa = $_POST['paraChoqueFitLuminosa'];
    $txt_paraChoqueFitLuminosa = $_POST['obs_paraChoqueFitLuminosa'];
    $sts_paraLama = $_POST['paraLama'];
    $tx_paraLama = $_POST['obs_paraLama'];
    $sts_peHidraulico1 = $_POST['peHidraulico1'];
    $tx_peHidraulico1 = $_POST['obs_peHidraulico1'];
    $sts_peHidraulico2 = $_POST['peHidraulico2'];
    $tx_peHidraulico2 = $_POST['obs_peHidraulico2'];
    $sts_pinos = $_POST['pinos'];
    $tx_pinos = $_POST['obs_pinos'];
    $sts_piscaAlerta = $_POST['piscaAlerta'];
    $tx_piscaAlerta = $_POST['obs_piscaAlerta'];
    $sts_pneu = $_POST['pneu'];
    $tx_pneu = $_POST['obs_pneu'];
    $sts_pneuLacrado = $_POST['pneuLacrado'];
    $tx_pneuLacrado = $_POST['obs_pneuLacrado'];
    $sts_porcasParafusoRodas = $_POST['porcasParafusoRodas'];
    $tx_porcasParafusoRodas = $_POST['obs_porcasParafusoRodas'];
    $sts_setaDireita = $_POST['setaDireita'];
    $tx_setaDireita = $_POST['obs_setaDireita'];
    $sts_setaEsquerda = $_POST['setaEsquerda'];
    $tx_setaEsquerda = $_POST['obs_setaEsquerda'];
    $sts_tomadaDeForca = $_POST['tomadaDeForca'];
    $tx_tomadaDeForca = $_POST['obs_tomadaDeForca'];
    $sts_traseiraCarretaBau = $_POST['traseiraCarretaBau'];
    $tx_traseiraCarretaBau = $_POST['obs_traseiraCarretaBau'];

    $result_enviar = "INSERT INTO tb_checklistcarretabau(id_chekUnidadeBau, tx_motorista, cod_placacarreta, cod_datahora, frenteCarretaBau, obs_frenteCarretaBau, lacrePlaca, obs_lacrePlaca, lanternaDireita, obs_lanternaDireita, lanternaEsquerda, obs_lanternaEsquerda, lateralDirFitLuminosa, obs_lateralDirFitLuminosa,
    lateralDirCarretaBau, obs_lateralDirCarretaBau, lateralEsqFitLumino, obs_lateralEsqFitLumino, lateralEsqCarretaBau, obs_lateralEsqCarretaBau, travado, obs_travado, luzDaPlaca, obs_luzDaPlaca, luzDeFreio, obs_luzDeFreio, luzDeRe, obs_luzDeRe, paraBarro, obs_paraBarro,
    paraChoque, obs_paraChoque, paraChoqueFitLuminosa, obs_paraChoqueFitLuminosa, paraLama, obs_paraLama, peHidraulico1, obs_peHidraulico1, peHidraulico2, obs_peHidraulico2, pinos, obs_pinos, piscaAlerta, obs_piscaAlerta, pneu, obs_pneu, pneuLacrado, 
    obs_pneuLacrado, porcasParafusoRodas, obs_porcasParafusoRodas, setaDireita, obs_setaDireita, setaEsquerda, obs_setaEsquerda, tomadaDeForca, obs_tomadaDeForca, traseiraCarretaBau, obs_traseiraCarretaBau) 
    VALUES ('$id_chekUnidBau', '$motorista', '$placacarreta', '$datahora', '$sts_frentebau', '$tx_frentebau', '$sts_lacrePlaca', '$tx_lacrePlaca', '$sts_lanternaDireita', '$tx_lanternaDireita', '$sts_lanternaEsquerda', '$tx_obs_lanternaEsquerda',
    '$sts_lateralDirFitLuminosa', '$tx_lateralDirFitLuminosa', '$sts_lateralDirCarretaBau', '$tx_lateralDirCarretaBau', '$sts_lateralEsqFitLumino', '$tx_lateralEsqFitLumino', '$sts_lateralEsqCarretaBau', '$tx_lateralEsqCarretaBau', '$sts_travado', '$tx_travado', '$sts_luzDaPlaca', 
    '$tx_luzDaPlaca', '$sts_luzDeFreio', '$tx_luzDeFreio', '$sts_luzDeRe', '$tx_luzDeRe', '$sts_paraBarro' , '$tx_paraBarro', '$sts_paraChoque', '$tx_paraChoque', '$sts_paraChoqueFitLuminosa', '$txt_paraChoqueFitLuminosa', '$sts_paraLama', '$tx_paraLama',
    '$sts_peHidraulico1', '$tx_peHidraulico1', '$sts_peHidraulico2', '$tx_peHidraulico2', '$sts_pinos', '$tx_pinos', '$sts_piscaAlerta', '$tx_piscaAlerta', '$sts_pneu', '$tx_pneu', '$sts_pneuLacrado', '$tx_pneuLacrado', '$sts_porcasParafusoRodas',
    '$tx_porcasParafusoRodas', '$sts_setaDireita', '$tx_setaDireita', '$sts_setaEsquerda', '$tx_setaEsquerda', '$sts_tomadaDeForca', '$tx_tomadaDeForca', '$sts_traseiraCarretaBau', '$tx_traseiraCarretaBau')";
    $resultado_checked = mysqli_query($conexao, $result_enviar)


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
