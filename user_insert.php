<?php

session_start();

require_once('./user/user.php');

$user = new user();
$user->setUserId($_POST["user_id"]);
$user->setUsername($_POST["username"]);
$user->setFirstName($_POST["first_name"]);
$user->setLastName($_POST["last_name"]);
$user->setUserId($_POST["password"]);
$user->createUser();

?>