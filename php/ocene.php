<?php
require 'db.php';

// Prepared statement
$query = "SELECT * FROM ocene /*WHERE username = ? AND password = ?*/";
$stmt = mysqli_prepare($conn, $query);

// Bind parameters
$username = "my_username";
$password = "my_password";
mysqli_stmt_bind_param($stmt, "ss", $username, $password);

// Execute statement
mysqli_stmt_execute($stmt);
//
// Get result
$result = mysqli_stmt_get_result($stmt);

// Fetch rows
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['id'] . " " . $row['organ'] . "<br>";
}

// Close connection
mysqli_close($conn);
?>