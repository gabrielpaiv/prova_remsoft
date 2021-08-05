<?php 
    Class Database {
        public $host = "localhost";
        public $port = 3306;
        public $dbname = "prova_remsoft";
        public $user = "root";
        public $password = "root";
        public $db;
        function __construct(){
            $this->db = mysqli_connect($this->host, $this->user, $this->password, $this->dbname, $this->port); 
        }
    }
