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

  // Select all records from the table
  $sql = "SELECT * FROM table_name";
  $result = $conn->query($sql);

  // Populate the table
  if ($result->num_rows > 0) {
    // Output the data for each row
    while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row['id'] . "</td>";
      echo "<td>" . $row['name'] . "</td>";
      echo "</tr>";
    }
  } else {
    echo "No results found";
  }

  // Close the connection
  $conn->close();
?>
