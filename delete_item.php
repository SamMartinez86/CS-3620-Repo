<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once('./sessioncheck.php');

    require_once('./item/item.php');

    $item = new item();
    $items = $item->deleteItem($_SESSION["user_id"], $_GET["item_id"]);

    header("Location: dashboard.php?del=true");
?>