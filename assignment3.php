<?php
// open db connection
$servername = "https://cs3620app.azurewebsites.net";
$username = "sam@cs3620sqlsam";
$password = "1801Church";
$dbname = "cs3620schema";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// insert statement
$sql = "INSERT INTO Food (FoodName, FoodCost)
VALUES ('Nachos', 15)";

// record confirmation 
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// close db connection
$conn->close();
?>