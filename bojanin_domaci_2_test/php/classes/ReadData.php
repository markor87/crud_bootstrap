<?php

class ReadData
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function readData()
    {
        $sql = "SELECT id,ime,prezime FROM studenti";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
