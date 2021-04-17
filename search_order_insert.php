<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//session_start();

require_once('sessioncheck.php');

require_once('./item/item.php');

$item = new item();
$item->setOrder($_POST["order"]);

$item->orderItem(); 

header("Location: dashboard.php");
?>