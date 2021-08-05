<?php

require_once 'Database.php';

class Create extends Database
{
    public function createTask()
    {
        $descricao = $_POST["Descricao"];

        $sql = "INSERT
                INTO tarefa(descricao,finalizado,dt_finalizado,dt_criacao,dt_ult_alt,excluido) 
                VALUES ('$descricao',0,NULL,NOW(),NOW(), 0);";
        $result = pg_query($this->db, $sql);
        if ($result) {
            echo '#alerta';
        }
    }
}
