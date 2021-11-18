<?php
include_once '../model/Conexao.php';
include_once '../model/Manager.php';

$manager = new Manager();

$update = $_POST;
$id = $_POST['id'];

if(isset($id) && !empty($id)){
    $manager->updateCostumer("motoristas", $update, $id);

    header("Location: ../cadastro-motorista.php?costumer_updated");
}