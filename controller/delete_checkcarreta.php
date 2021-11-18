<?php
include_once '../model/Conexao.php';
include_once '../model/Manager.php';

$manager = new Manager();

$id = $_POST['id_deletacarreta'];

if(isset($id) && !empty($id)){
    $manager->deleteChecklistCarreta("tb_checklistcarretabau", $id);

    header("Location: ../checklist.php?costumer_deleted");
}