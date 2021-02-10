<?php
    require_once('./header.php');
?>  

<?php
    require_once('./user/user.php');

    $user = new user();
    $user->getUser(12);

    echo $user->getUsername();
    echo "<br />";
    echo $user->getFirstName();
    echo "<br />";
    echo $user->getLastName();
?>

<?php
    require_once('./footer.php');
?>  
