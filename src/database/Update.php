<?php

require_once 'Database.php';

class Update extends Database
{
    public function update()
    {
        $id = $_POST['id'];
        $descricao = $_POST["Descricao"];
        $finalizado = $_POST["Finalizado"];

        if ($this->checkFinish($id) && $finalizado == 0) {
            $sql = "UPDATE tarefa
                    SET finalizado = '$finalizado', dt_ult_alt = NOW()
                    WHERE id='{$id}'";
            $result = mysqli_query($this->db, $sql);
            if ($result) {
                echo '#' + $id;
            }
        } else {
            if ($finalizado == 1) {
                $sql = "UPDATE tarefa
                        SET finalizado = '{$finalizado}', dt_finalizado = NOW()
                        WHERE id = {$id};";
                $result = mysqli_query($this->db, $sql);
                if ($result) {
                    echo '#' + $id;
                }
            } else {
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
        }
    }
    public function checkFinish($id)
    {
        $sql = "SELECT finalizado
                FROM tarefa
                WHERE id = '$id'";
        $isFinished = mysqli_query($this->db, $sql);
        if ($isFinished) {
            return true;
        } else {
            return false;
        }
    }
}
