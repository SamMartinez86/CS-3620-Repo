<?php
   session_start();

   ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

   require_once('./user/user.php');

    $user = new user();
    $user->getUserF($_GET["id"]);

    echo json_encode($user);

?>