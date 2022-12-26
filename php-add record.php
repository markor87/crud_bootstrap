<?php
  // Connect to the database
  $host = "localhost";
  $username = "username";
  $password = "password";
  $dbname = "database_name";

  $conn = new mysqli($host, $username, $password, $dbname);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  // Get the form data
  $name = $_POST['name'];

  // Insert the data into the table
  $sql = "INSERT INTO table_name (name) VALUES ('$name')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the connection
  $conn->close();
?>
