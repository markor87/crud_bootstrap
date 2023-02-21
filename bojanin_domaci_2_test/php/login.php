<?php
require_once dirname(__DIR__) . "/php/classes/db_connection.php";
require_once dirname(__DIR__) . "/php/classes/login_validation.php";

if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $username = $_POST["username"];
    $password = $_POST["password"];
    $db = new Database();
    $validation = new Validation();
    $errors = $validation->validate($username, $password);
    $result = $validation->validate();
    if (empty($errors)) {
        $database = new Database();
        $conn = $database->connect();

        $stmt=$conn->prepare("SELECT * FROM izvrsioci_users WHERE username = ? AND password = ?");
        $stmt->execute([$username,$password]);
        $user=$stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            header("location: index2.php");
        }
        else{
            $errors["login"]="Incorrect username or password";
        }
    }
}