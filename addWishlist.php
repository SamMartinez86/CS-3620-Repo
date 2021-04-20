<?php

session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//require_once('./session/session.php');

require_once('./wishList/wishList.php');

$wishlist = new wishList();
$wishlist->setItemId($_POST["item"]);
$wishlist->setUserId($_SESSION["user_id"]);
$wishlist->createWishlistItem();

header("Location: dashboard.php");

?>