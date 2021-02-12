<?php

    session_start();

    require_once('./user/user.php');

    $user = new user();
    $user->getUser(2);

    echo $user->getUsername();
    echo "<br />";
    echo $user->getFirstName();
    echo "<br />";
    echo $user->getLastName();

    $user = new user();
    $user->getUser($_GET["id"])

    echo json_encode($user);



?>