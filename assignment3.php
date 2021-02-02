<?php

session_start();

// open db connection
$servername = "cs3620sqlsam.mysql.database.azure.com";

//$username = "sam@cs3620sqlsam";
//$password = "1801Church";

$username = (isset($_SESSION["SQLUSER"]) ? $_SESSION["SQLUSER"] : $_ENV['SQLUSER']);
$password = (isset($_SESSION["SQLPW"]) ? $_SESSION["SQLPW"] : $_ENV['SQLPW']);
$dbname = "cs3620schema";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// Insert into Db
$sql = "INSERT INTO Food (FoodName, FoodCost)
VALUES ('Lasagna', '20')";

if ($conn->query($sql) === TRUE) {
    echo "New record 'Lasagna' created successfully <br>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

// Delete record from Db
$sql = "DELETE FROM Food WHERE FoodName='Sushi'";

if ($conn->query($sql) === TRUE) {
  echo "Record 'Sushi' deleted successfully <br>";
} else {
  echo "Error deleting record: " . $conn->error;
}

// Display Db
$sql = "SELECT * FROM Food";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Food Name: " . $row["FoodName"]. "Food Cost: " . $row["FoodCost"]. "<br>";
  }
} else {
  echo "0 results";
}


// close db connection
$conn->close();
?>