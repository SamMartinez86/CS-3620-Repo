<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once('./wishList/wishList.php');

$wishlist = new wishList();
$wishlist->setItemId($_POST["item_id"]);
$wishlist->setUserId($_SESSION["user_id"]);

echo("Item ID:". $_POST["item_id"]);
echo("User ID:". $_SESSION["user_id"]);

$wishlist->createWishlistItem();

header("Location: dashboard.php");

?>