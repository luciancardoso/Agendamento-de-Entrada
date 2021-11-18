<?php
include_once '../model/Conexao.php';
include_once '../model/Manager.php';

$manager = new Manager();

$update = $_POST;
$id = $_POST['id'];

if(isset($id) && !empty($id)){
    $manager->updateCostumer("transportadora", $update, $id);

    header("Location: ../cadastro.php?costumer_updated");
}