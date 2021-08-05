<?php

require_once 'Database.php';

class Update extends Database
{
    public function update()
    {
        $id = $_POST['id'];
        $descricao = $_POST["descricao"];

        $sql = "UPDATE tarefa
                SET descricao = '{$descricao}', dt_ult_alt = NOW()
                WHERE id = {$id}; ";
        $result = mysqli_query($this->db, $sql);
        if ($result) {
            return 'true';
        } else {
            return 'false';
        }
    }
    public function finalizar()
    {
        $id = $_POST['id'];

        $sql = "SELECT finalizado
                FROM tarefa
                WHERE id = {$id}";
                
        $isFinished = mysqli_query($this->db, $sql);
        
        if ($isFinished) {
            $sql = "UPDATE finalizado
                    SET 0
                    WHERE id = {$id}";
            $result = mysqli_query($this->db, $sql);
            if($result){
                return true;
            }
        } else {
            $sql = "UPDATE finalizado
                    SET 1
                    WHERE id = {$id}";
            $result = mysqli_query($this->db, $sql);
            if($result){
                return true;                
            }
        }
    }
}
