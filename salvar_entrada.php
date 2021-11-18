<?php

    session_start();

    include_once('config.php');
    require 'mail/mail.php';

$id_transportadora = $_POST['id_transportadora'];
$id_motorista = $_POST['id_motorista'];
$_SESSION['id_recinto'] = $_POST['id_unidade'];
$id_recinto = $_SESSION['id_recinto'];
$id_tipo_veiculo = $_POST['id_tipo_veiculo'];
$placa = $_POST['placa'];
$bau_placa = $_POST['placapranchabau'];
$placapranchacavalo = $_POST['placapranchacavalo'];
$container = $_POST['container'];
$lacrecavalo = $_POST['lacrecavalo'];
$bau_lacre = $_POST['lacrebau'];
$data = $_REQUEST['data'];
// $estabelecimento = $_POST['estabelecimento'];

//echo $id_recinto;

//Converter a data e hora do formato brasileiro para o formato do Banco de Dados
$data = explode(" ", $data);
list($date, $hora) = $data;
$data_sem_barra = array_reverse(explode("/", $date));
$data_sem_barra = implode("-", $data_sem_barra);
$data_sem_barra = $data_sem_barra . " " . $hora;

//Salvar no BD
$result_data = "INSERT INTO agendamentos (id_transportadora, id_motorista, id_unidade, id_tipo_veiculo, placa, placapranchabau, placapranchacavalo, container, lacrecavalo, lacrebau, data) VALUES ('$id_transportadora', '$id_motorista', '$id_recinto', '$id_tipo_veiculo', '$placa', '$bau_placa', '$placapranchacavalo', '$container', '$lacrecavalo', '$bau_lacre', '$data_sem_barra')";
$resultado_data = mysqli_query($conexao, $result_data);

//Consultar no BD
// $sth = $mysqli->query("SELECT * FROM motoristas WHERE id='id_cliente'");
//$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$result_usuario = "SELECT * FROM motoristas WHERE id=$id_motorista ORDER BY nome_motorista";
$resultado_usuario = mysqli_query($conexao, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

$result_cat_post = "SELECT * FROM transportadora WHERE id=$id_transportadora";
$resultado_cat_post = mysqli_query($conexao, $result_cat_post);
$row_cat_post = mysqli_fetch_assoc($resultado_cat_post);

//consultar no banco de dados
// $id_recinto = $_POST['id'];
// echo $id_recinto;

// $result_agendamento = "SELECT * FROM agendamentos WHERE id=$id_recinto";
// $resultado_agendamento = mysqli_query($conexao, $result_agendamento);
// $row_agendamento = mysqli_fetch_assoc($resultado_agendamento);



$assunto = 'Agendamento de Entrada';
$mensagem = '
    <style>
        .stylePadrao
        {
            width: 860px;
        }

        .styleCabecalhoTabela
        {
            font-family: Calibri;
            font-size: 15px; 
            font-weight: bold;
            text-align:center;
            color: #ffffff;
            background-color: #4f81bd;
            height: 15px;
        }
        
        .stylePainelTitulo
        {
            background-color: #ffffff;                                    
        }

        .stylePainelTituloErro
        {
            background-color: #D55C5C;                                    
        }

        .styleLinhaEscura
        {
            font-family: Calibri; 
            font-size: 15px; 
            text-align:left; 
            padding-left: 4px;
            background-color: #B9D8E6;
        }

        .styleLinhaClara
        {
            font-family: Calibri;
            font-size: 15px;
            text-align:left;
            padding-left: 4px;
        }
    </style>

    <table align="center" border="0" cellspacing="0" cellpadding="0" class="stylePadrao">

        <tr>
               <td colspan="7" align="right" bgcolor="#4F81BD" style="padding-right: 20px;">
                     <font face="Arial" size="2" color="#FFFFFF"><b>Aduana Despachos e Assessoria de Comércio Exterior Ltda</b></font>
               </td>
        </tr>

        <tr>
            <td colspan="7" style="padding: 2px;">
            </td>
        </tr>

        <tr>
            <td colspan="3" style="background-color: #FFFFFF; padding: 5px; padding-left: 20px;">
                <img src="http://www.aduana-dsp.com.br/app_Imagens/logo.jpg" style="height: 76px; width: 158px" alt="Logo Aduana"/>
            </td>
            <td colspan="4" 
                style="color: white; font-size: 24px; font-family: Arial; font-weight: bold; 
                padding: 5px; padding-right: 5px;
                text-align: right; vertical-align: middle; background-color: #FFFFFF;">
                <font color="#1F497D">
                   Agendamento de Entrada
                </font>
            </td>
        </tr>

        <tr>
            <td colspan="7">
                <hr />
            </td>
        </tr>

        <tr class="stylePainelTitulo">
            <td colspan="4" valign="center"
                style="color: black; font-size: 14px; font-family: Arial; font-weight: bold; 
                padding: 5px; padding-left: 20px; 
                text-align: left; vertical-align: middle;">
                <font color="#2571F3">
                    GUIA AGENDAMENTO
                </font>
            </td>
            <td colspan="3" valign="center" 
                style="color: black; font-size: 12px; font-family: Arial; font-weight: bold; 
                padding: 5px; padding-right: 20px;
                text-align: right; vertical-align: middle;">
                
            </td>
        </tr>
        
        <tr>
            <td colspan="7">
                <hr />
            </td>
        </tr>

        <tr>
            <td colspan="7" style="font-family: Arial; font-size: 12px; text-align:justify; padding-top: 5px; padding-bottom: 18px;">
                Olá Prezado(a).
                <br><br>
                Abaixo informações sobre o Agendamento Eletrônico.<br>
                Na <strong>Unidade:</strong> - '.$id_recinto.' <br>
                <br><br>
                Autorização de Entrada para a :</br></br>
                
                <strong>Data:</strong> '.date('d/m/Y \à\s H:i' ,strtotime($data_sem_barra)).'</br>
                <strong>Motorista:</strong> - '.$row_usuario['nome_motorista'].'</br>
                <strong>Empresa:</strong> - '.$row_cat_post['transportadora'].'</br>
                <strong>Tipo:</strong> - '.$id_tipo_veiculo.'</br>
                <strong>Placa:</strong> - '.$placa.'</br>
                <Strong>Placa Do Cavalo/Baú:</strong> - '.$placapranchacavalo.' '.$bau_placa.'</br>
                <strong>Container:</strong> - '.$container.'</br>
                <strong>Nº Lacre:</strong> - '.$lacrecavalo.'</br></br>

                Caso queira um contato mais direto, visite a pagina www.aduana-dsp.com.br
                e clique em ver telefone na pagina da empresa.</br></br>

            </td>
        </tr>
            
    </table>

    <table align="center" border="0" cellspacing="0" cellpadding="0" class="stylePadrao">
        <tr>
           <td colspan="7" style="text-align:center; font-family: Arial; font-size: 11px;">
           <h4>Caso esteja com problemas</h4>
           <p>
               Entre em contato:</br>
   
               <strong>Email:</strong> ti.aduana@aduana-dsp.com.br</br>
               <strong>Site:</strong> www.aduana-dsp.com.br
               </br>
               </br>
           </p>
                <br><br>Não responda este e-mail.<br/>
            </td>
        </tr>

        <tr>
            <td colspan="7">
                <hr />
            </td>
        </tr>
    </table>
';

send($assunto, $mensagem); 


?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamento Concluído</title>
    <link rel="icon" href="Assets/img/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="./assets/css/base/base.css">
    <link rel="stylesheet" href="./assets/css/checklist_concluido.css">
    <link rel="stylesheet" href="./assets/css/componentes/cartao.css">
    <link rel="stylesheet" href="./assets/css/componentes/inputs.css">
    <link rel="stylesheet" href="./assets/css/componentes/botao.css">
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
            <img src="./assets/img/logoAduana.png" alt="Logo Aduana" height="70" class="cadastro-cabecalho__logo">
            <h1 class="cadastro-cabecalho__titulo">Sistema Aduana</h1>
        </div>
        <section class="cadastro-cartao cartao">
            <span class="cadastro-cartao__icone-concluido"></span>
            <h1 class="cadastro-cartao__titulo cartao__titulo">Agendamento Concluído!</h1>
            <a href="painel.php" class="botao">Pagina Inicial</a>
        </section>
    </main>
</body>
</html>