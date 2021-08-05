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
            header("Location: ../screens/Home/");
            exit;
        }
    }
    public function finalizar()
    {
        $id = $_POST['id'];

        $sql = "SELECT finalizado
                FROM tarefa
                WHERE id = {$id}";

        $result = mysqli_query($this->db, $sql);
        $isFinished = mysqli_fetch_assoc($result);
        if ($isFinished["finalizado"] == "1") {
            // var_dump("finalizado");
            $sql = "UPDATE tarefa
                    SET finalizado = 0, dt_finalizado = NULL
                    WHERE id = {$id}";
            $result = mysqli_query($this->db, $sql);
            if ($result) {
                header("Location: ../screens/Home/");
                exit;
            }
        } else if ($isFinished["finalizado"] == "0") {
            // var_dump("finalizar");
            $sql = "UPDATE tarefa
                    SET finalizado = 1, dt_finalizado = NOW()
                    WHERE id = {$id}";
            $result = mysqli_query($this->db, $sql);
            if ($result) {
                header("Location: ../screens/Home/");
                exit;
            }
        }
    }
}
