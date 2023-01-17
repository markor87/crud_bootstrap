<?php
require_once dirname(__DIR__). "/classes/db_connection.php";
class Validation {
    private $errors = array();
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function validateEmail($email) {
        if (empty($email)) {
            $this->errors['email'] = "Email field is required";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Invalid email format";
        }
    }

    public function validatePassword($password) {
        if (empty($password)) {
            $this->errors['password'] = "Password field is required";
        } else if (strlen($password) < 8) {
            $this->errors['password'] = "Password must be at least 8 Fcharacters long";
        }
    }
    public function checkUser($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $stmt->execute([$email, $password]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$user) {
            $this->errors['user'] = "Incorrect email or password";
        }
    }
    public function validate($email, $password) {
        $this->validateEmail($email);
        $this->validatePassword($password);
        if(empty($this->errors)){
            $this->checkUser($email, $password);
        }
        return $this->errors;
    }
}

