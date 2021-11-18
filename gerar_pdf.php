<?php	

	include_once 'config.php';

	session_start();
    // print_r($_SESSION);
    if((!isset($_SESSION['usuario']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['usuario']);
        unset($_SESSION['senha']);
        header('Location: login.php');
    }
    $logado = $_SESSION['usuario'];

	$result_gerador = "SELECT * FROM tb_checklistcavalo WHERE id";
	$resultado_gerador = mysqli_query($conexao, $result_gerador);
	$row_gerando = mysqli_fetch_assoc($resultado_gerador);

	// Formatação de datas.
	date_default_timezone_set('America/Manaus');

	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once('dompdf/autoload.inc.php');

	//Criando a Instancia
	$dompdf = new Dompdf();

	// Orientação da pagina em paisagem
	$dompdf->setPaper('A4', 'landscape');

	// $dompdf->imagem('Assets/img/logoAduana.png');

	// Carrega seu HTML
	$dompdf->load_html('
	<div style="width: 1000px; height: 641px; border: 1px solid; padding: 20px 20px 20px 20px;">
        
	<img src="./Assets/img/logoAduana.png" style="border:0px; width:230px; height:95px;">
	
	<h2 style="position: absolute; top: 35px; left:340px;">CHECK LIST- CAVALO MECÂNICO</h2>
	<h1 style="position: absolute; top: 80px; left:450px;"> </h1>

	<div>
		<p>Acendedor Elétrico: </p>
		<input type="text" style="position: absolute; top: 128px; left:155px; width:20px; height:20px">
		<label style="position: absolute; top: 133px; left:164px;">'.$row_gerando['id_acdeletrico'].'</label>
		<label style="position: absolute; top: 133px; left:184px;">OK</label>

		<input type="text" style="position: absolute; top: 126px; left:210px; width:20px; height:20px"">
		<label style="position: absolute; top: 133px; left:240px;">NÃO</label>
		<input type="text" maxlength="20" style="position: absolute; top: 124px; left:280px; padding: 13px">
	</div>

	<div style="position: absolute; top: 700px; left:30px; width: 785px; text-align:right;">
        <label style="font-size:22px">Usuário: '.$logado.'</label>
    </div>
	
	<label style="position: absolute; top: 700px; left:100px; font-size:14px">Data e hora da impressão: '.date('d/m/Y \à\s H:i:s').'</label>
	</div>
	');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"guia_agendamento.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>