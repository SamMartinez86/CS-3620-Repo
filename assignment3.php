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

/*
$sql = "SELECT * FROM Food";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - FoodName: " . $row["FoodName"]. " - FoodCost: " . $row["FoodCost"]. "<br>";
  }
} else {
  echo "0 results";
}
*/

// Insert into Db
$sql = "INSERT INTO Food (FoodName, FoodCost)
VALUES ('Lasagna', '20')";

if ($conn->query($sql) === TRUE) {
    echo "New record 'Lasagna' created successfully <br>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }



// close db connection
$conn->close();
?>