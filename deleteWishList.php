<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once('./sessioncheck.php');

    require_once('./wishList/wishList.php');

    $wishlist = new wishList();
    $wishlists = $wishlist->deleteWishlistItem($_SESSION["user_id"], $_GET["item_id"]);

    header("Location: wishlist.php?del=true");
?>