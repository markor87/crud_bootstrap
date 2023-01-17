<?php
include "php/classes/db_connection.php";

class Login {
    private $username;
    private $password;
    private $db;

    public function __construct($username, $password, $db) {
        $this->username = $username;
        $this->password = $password;
        $this->db = $db;
    }

    public function validate() {
        if (empty($this->username) || empty($this->password)) {
            return "Please enter a username and password.";
        }

        if (!preg_match("/^[a-zA-Z0-9]+$/", $this->username)) {
            return "Invalid username. Only letters and numbers are allowed.";
        }

        if (strlen($this->password) < 8) {
            return "Invalid password. Must be at least 8 characters.";
        }

        // check against database if user exist with provided credentials
        $password = md5($this->password);
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $this->username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return "Invalid username or password.";
        }

        // start a session
        session_start();
        $_SESSION['username'] = $this->username;

        // redirect user to index.php
        header("Location: index.php");
        exit;

    }
}
