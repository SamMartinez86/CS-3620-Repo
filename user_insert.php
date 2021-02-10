<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('./user/user.php');

echo $_POST["user_id"];
echo $_POST["username"];
echo $_POST["first_name"];
echo $_POST["last_name"];
echo $_POST["password"];


$user = new user();
$user->setUserId($_POST["user_id"]);
$user->setUsername($_POST["username"]);
$user->setFirstName($_POST["first_name"]);
$user->setLastName($_POST["last_name"]);
$user->setUserId($_POST["password"]);

?>