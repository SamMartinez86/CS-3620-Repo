<?php require_once("sessioncheck.php") 
    require_once('./header.php');

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

<h1>Page protected</h1>

<a href="logout.php">Logout</a>

<?php
    require_once('./footer.php');
?>