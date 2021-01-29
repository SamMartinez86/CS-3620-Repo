<?php

//session_start();

// open db connection
$servername = "cs3620sqlsam.mysql.database.azure.com";

$username = "sam@cs3620sqlsam";
$password = "1801Church";

//$username = (isset($_SESSION['SQLUSER'] ? $_SESSION ['SQLUSER'] : $_ENV['SQLUSER'];
//$password = (isset($_SESSION['SQLPW'] ? $_SESSION ['SQLPW'] : $_ENV['SQLPW'];
$dbname = "cs3620schema";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// insert statement
$sql = "INSERT INTO Food (FoodName, FoodCost)
VALUES ('Sandwich', 5)";

//Display records
//$sql = "SELECT * FROM Food";


// record confirmation 
if ($conn->query($sql) === TRUE) {
  echo "New record 'Sandwich' created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// close db connection
$conn->close();
?>