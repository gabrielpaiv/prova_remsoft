<?php
require_once 'Database.php';

class Delete extends Database
{
    public function delete()
    {
        $id = $_POST['id'];
        $sql = "UPDATE tarefa 
                SET excluido = 1
                WHERE id = {$id};";
        $result = mysqli_query($this->db, $sql);
        if ($result) {
            return 'true';
        }
    }
}
