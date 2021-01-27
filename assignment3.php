<?php
$servername = "cs3620sqlsam.mysql.database.azure.com";
$username = "sam@cs3620sqlsam";
$password = "1801church";
$dbname = "cs3620schema";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = INSERT INTO Food (FoodName, FoodCost)
VALUES ('HotDog', 10);

$sql = INSERT INTO Food (FoodName, FoodCost)
VALUES ('Nachos', 15);

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>