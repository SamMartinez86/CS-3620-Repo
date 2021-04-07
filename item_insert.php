<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once('sessioncheck.php');

require_once('./item/item.php');

$hero = new item();
$hero->setItemName($_POST["item_name"]);
$hero->setItemCost($_POST["cost_item"]);
$hero->setItemDescription($_POST["item_description"]);
$hero->setUserId($_SESSION["user_id"]);
$hero->createItem(); 



header("Location: dashboard.php");
?>