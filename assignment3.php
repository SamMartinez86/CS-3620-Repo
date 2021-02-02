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

// query table
$sql = "SELECT * FROM Food";
// store query in variable
$result = $conn->query($sql);

// If rows exist in result
if ($result->num_rows > 0) 
{
    while($row = $result->fetch_assoc()) // put results in array and loop
    {
        echo "Food Name: " . $row["FoodName"]. "Food Cost: " . $row["FoodCost"]. "<br>";
    }

} else 
{
    echo "No results, something is wrong."
}

// insert statement
//$sql = "INSERT INTO Food (FoodName, FoodCost)
//VALUES ('Lasagna', 8)";

//Display records
//$sql = "SELECT * FROM Food";


// record confirmation 
if ($conn->query($sql) === TRUE) {
  echo "Displayed";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// close db connection
$conn->close();
?>