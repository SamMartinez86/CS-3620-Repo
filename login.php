  
<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once('./session/session.php');

    $session = new session();
    $session->login("sam@cs3620sqlsam", "1801Church");
?>  