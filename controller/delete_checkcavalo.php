<?php
include_once '../model/Conexao.php';
include_once '../model/Manager.php';

$manager = new Manager();

$id = $_POST['id_deleta'];

if(isset($id) && !empty($id)){
    $manager->deleteChecklist("tb_checklistcavalo", $id);

    header("Location: ../checklist.php?costumer_deleted");
}