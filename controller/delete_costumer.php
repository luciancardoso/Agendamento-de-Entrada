<?php
include_once '../model/Conexao.php';
include_once '../model/Manager.php';

$manager = new Manager();

$id = $_POST['id'];

if(isset($id) && !empty($id)){
    $manager->deleteCostumer("transportadora", $id);

    header("Location: ../cadastro.php?costumer_deleted");
}