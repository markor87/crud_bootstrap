<?php

class Database {
    private $host = '10.15.32.49';
    private $username = 'marko.radovanovic';
    private $password = 'LoneDruid1987';
    private $database = 'fakultet';

    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            die('Connection failed: ' . $this->conn->connect_error);
        }
    }

    public function select($sql) {
        $result = $this->conn->query($sql);
        $rows = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
        }

        return $rows;
    }

    public function __destruct() {
        $this->conn->close();
    }
}
