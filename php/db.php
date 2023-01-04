<?php

// Connection parameters
$host = 'localhost';
$user = 'username';
$password = 'password';
$dbname = 'database_name';

// Establish connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepared statement
$query = "SELECT * FROM users WHERE username = ? AND password = ?";
$stmt = mysqli_prepare($conn, $query);

// Bind parameters
$username = "my_username";
$password = "my_password";
mysqli_stmt_bind_param($stmt, "ss", $username, $password);

// Execute statement
mysqli_stmt_execute($stmt);

// Get result
$result = mysqli_stmt_get_result($stmt);

// Fetch rows
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['username'] . " " . $row['email'] . "<br>";
}

// Close connection
mysqli_close($conn);

?>
