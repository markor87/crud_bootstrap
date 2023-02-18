<?php
require_once dirname(__DIR__) . "/classes/db_connection.php";
class AllStudents  {
    private $conn;

    public function __construct($db){
        $this->conn=$db->getConnection;
    }
public function getAllStudents(){
        $sql="select ime,prezime from studenti";
        $result=$this->conn->querry($sql);
}
}


