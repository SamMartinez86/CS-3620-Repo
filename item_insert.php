<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once('sessioncheck.php');

require_once('./item/item.php');

$item = new item();
$item->setItemName($_POST["item_name"]);
$item->setItemCost($_POST["item_cost"]);
$item->setItemDescription($_POST["item_description"]);
$item->setItemType($_SESSION["item_type"]);
$item->setItemImage($_SESSION["item_image"]);
$item->setUserId($_SESSION["user_id"]);

$item->createItem(); 



header("Location: dashboard.php");
?>