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
  $id = $_POST['id'];
  $name = $_POST['name'];

  // Update the record in the table
  $sql = "UPDATE table_name SET name='$name' WHERE id='$id'";

  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the connection
  $conn->close();
?>
