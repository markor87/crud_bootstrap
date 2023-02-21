<?php
class DB {
private $host = "10.15.32.49";
private $dbname = "fakultet";
private $username = "marko.radovanovic";
private $password = "LoneDruid1987";
private $conn;

public function __construct() {
$dsn = "mysql:host={$this->host};dbname={$this->dbname}";
$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

try {
$this->conn = new PDO($dsn, $this->username, $this->password, $options);
} catch (PDOException $e) {
echo "Connection failed: " . $e->getMessage();
}
}

public function __destruct() {
$this->conn = null;
}

public function getConnection() {
return $this->conn;
}
}