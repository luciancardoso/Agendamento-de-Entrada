<?php

class Manager extends Conexao
{

    public function insertCostumer($table, $data)
    {
        $pdo = parent::get_instance();
        $fields = implode(", ", array_keys($data));
        $values = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO $table ($fields) VALUES ($values)";
        $statement = $pdo->prepare($sql);
        foreach ($data as $key => $value) {
            $statement->bindValue(":$key", $value, PDO::PARAM_STR);
        }
        $statement->execute();
    }
        
    public function listCostumer($table)
    {
        $pdo = parent::get_instance();
        $sql = "SELECT * FROM $table  ORDER BY transportadora ASC";
        $statement = $pdo->query($sql);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function listMotorista($table)
    {
        $pdo = parent::get_instance();
        $sql = "SELECT * FROM $table  ORDER BY nome_motorista ASC";
        $statement = $pdo->query($sql);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function listCostumerTable($table)
    {
        $pdo = parent::get_instance();
        $sql = "SELECT * FROM $table ORDER BY id ASC";
        $statement = $pdo->query($sql);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function listEmails($table)
    {
        $pdo = parent::get_instance();
        $sql = "SELECT * FROM $table  ORDER BY nome ASC";
        $statement = $pdo->query($sql);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function updateCostumer($table, $data, $id)
    {
        $pdo = parent::get_instance();
        $new_values = "";
        foreach ($data as $k => $v) {
            $new_values .= "$k=:$k, ";
        }
        $new_values = substr($new_values, 0, -2);
        $sql = "Update $table SET $new_values WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        foreach ($data as $k => $v) {
            $stmt->bindValue(":$k", $v, PDO::PARAM_STR);
        }
        $stmt->execute();
    }

    public function getInfo($table, $id)
    {
        $pdo = parent::get_instance();
        $sql = "SELECT * FROM $table WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function deleteCostumer($table, $id){
        $pdo = parent::get_instance();
        $sql = "DELETE FROM $table WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
    }

    public function deleteChecklist($table, $id){
        $pdo = parent::get_instance();
        $sql = "DELETE FROM $table WHERE id_checklistcavalo = :id_checklistcavalo";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":id_checklistcavalo", $id);
        $stmt->execute();
    }

    public function deleteChecklistCarreta($table, $id){
        $pdo = parent::get_instance();
        $sql = "DELETE FROM $table WHERE id_checklistcarretabau = :id_checklistcarretabau";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":id_checklistcarretabau", $id);
        $stmt->execute();
    }
}