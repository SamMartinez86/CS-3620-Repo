<?php
$servername = "cs3620sqlsam.mysql.database.azure.com";
//$username = "sam@cs3620sqlsam";
//$password = "1801Church";
//$username = (isset($_SESSION["SQLUSER"]) ? $_ENV['SQLUSER'] : $_SESSION["SQLUSER"]);
//$password = (isset($_SESSION["SQLPW"]) ? $_ENV['SQLPW'] : $_SESSION["SQLPW"]);
$username = $_SESSION["SQLUSER"];
$password = $_SESSION["SQLPW"];
$dbname = "userschema";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
} 
?>