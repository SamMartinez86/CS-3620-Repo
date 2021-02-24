<?php
    require_once('./header.php');

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>  


<form method="POST" action="registration_insert.php" >
    Username:<input type="text" name="username" /><br />
    First Name:<input type="text" name="firstName" /><br />
    Last Name:<input type="text" name="lastName" /><br />
    Password:<input type="password" name="password" /><br />
    <input type="submit" value="Create User" />
</form>


<?php
    require_once('./footer.php');
?>  
