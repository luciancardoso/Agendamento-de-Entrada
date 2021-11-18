<?php 

    include_once('config.php');

	$id_transportadora = $_REQUEST['id_transportadora'];
	
	$result_sub_cat = "SELECT * FROM motoristas WHERE id_cliente=$id_transportadora ORDER BY nome_motorista";
	$resultado_sub_cat = mysqli_query($conexao, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$motoristas[] = array(
			'id'	=> $row_sub_cat['id'],
			'nome_motorista' => utf8_encode($row_sub_cat['nome_motorista']),
		);
	}
	
	echo(json_encode($motoristas));
?>