<?php
include_once '../model/Conexao.php';
include_once '../model/Manager.php';

$manager = new Manager();

$update = $_POST;
$id = $_POST['id'];

if(isset($id) && !empty($id)){
    $manager->updateCostumer("tbemails", $update, $id);

    header("Location: ../emails.php?costumer_updated");
}