<?php

require_once 'Database.php';

class Read extends Database
{
    public function read()
    {
        $sql = "SELECT * 
                FROM tarefa 
                WHERE excluido = 0;";
        $result = mysqli_query($this->db, $sql);
        $tarefas = mysqli_fetch_array($result, 0, PGSQL_NUM);
        return $tarefas;
    }
}
