<?php
class DB {
    private $host = "localhost";
    private $username = "username";
    private $password = "password";
    private $database = "database";
    public $conn;

    public function __construct(){
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }
}
