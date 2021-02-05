<?php

    require_once('./user/header.php');

?>

<?php
    require_once('./user/user.php');

    $user = new user();
    $user->getUser(1);

    echo $user->getUsername();
?>

