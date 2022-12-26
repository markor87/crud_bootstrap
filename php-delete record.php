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

  // Delete the record from the table
  $sql = "DELETE FROM table_name WHERE id='$id'";

  if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  // Close the connection
  $conn->close();
?>
