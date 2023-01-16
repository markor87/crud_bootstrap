<?php
class Database
{
    private $host = "10.15.32.49";
    private $db_name = "izvrsioci";
    private $username = "marko.radovanovic";
    private $password = "LoneDruid1987";
    private $conn;

    public function connect()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
        }
        return $this->conn;
    }

    public function testConnection()
    {
        return $this->conn != null;
    }
}

/* $database = new Database();
$db = $database->connect();

if($database->testConnection()) {
    echo "Uspesno";
}
else {
    echo "Neuspesno";
} */
