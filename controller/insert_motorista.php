<?php
include_once '../model/Conexao.php';
include_once '../model/Manager.php';

$manager = new Manager();

$data = $_POST;
// $id = $_POST['id_cliente'];

if(isset($data) && !empty($data)){
    $manager->listMotorista("motoristas", $data);

    header("Location: ../cadastro-motorista.php?costumer_add_success");
}

?>