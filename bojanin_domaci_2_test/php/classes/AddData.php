<?php
class AddData {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addData($ime, $prezime) {
        $sql = "INSERT INTO studenti (ime, prezime) VALUES (?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$ime, $prezime]);

        return $stmt->rowCount();
    }
}
