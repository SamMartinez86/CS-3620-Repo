<?php

// store variables
// server name 
$servername = "cs3620sqlsam.mysql.database.azure.com";

// store user and password
$username = "sam@cs3620sqlsam";
$password = "1801Church";

// store user and password with environment variables

// store db schema 
$dbname = "cs3620schema";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

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


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }


// close db connection
$conn->close();

?>