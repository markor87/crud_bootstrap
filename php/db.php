<?php

// Connection parameters
$host = '10.15.32.49';
$user = 'marko.radovanovic';
$password = 'LoneDruid1987';
$dbname = 'izvrsioci';

// Establish connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
