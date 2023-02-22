<?php
require_once('db_connection.php');

class User {
    private $conn;

    public function __construct(){
        $this->conn = (new DB())->conn;
    }

    public function create($name, $email, $phone){
        $stmt = $this->conn->prepare("INSERT INTO users (name, email, phone) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $phone);
        return $stmt->execute();
    }

    public function read(){
        $result = $this->conn->query("SELECT * FROM users ORDER BY id DESC");
        $rows = array();

        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function update($id, $name, $email, $phone){
        $stmt = $this->conn->prepare("UPDATE users SET name=?, email=?, phone=? WHERE id=?");
        $stmt->bind_param("sssi", $name, $email, $phone, $id);
        return $stmt->execute();
    }

    public function delete($id){
        $stmt = $this->conn->prepare("DELETE FROM users WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
