<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once('./sessioncheck.php');

    require_once('./hero/hero.php');

    $hero = new hero();
    $heros = $hero->deleteHero($_SESSION["user_id"]. $_GET[hero_id]);

    header("Location: dashboard.php?del=true");
?>