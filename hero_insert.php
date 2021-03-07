<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

require_once('./hero/hero.php');

$hero = new hero();
$hero->setHeroName($_POST["hero_name"]);
$hero->setHeroAbility($_POST["hero_ability"]);
$hero->setHeroDescription($_POST["hero_description"]);
$hero->createHero(); 

header("Location: dashboard.php");
?>