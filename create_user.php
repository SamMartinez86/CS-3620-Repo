<?php
    require_once('./header.php');
?>  

<form method="POST" action="user_insert.php">
    Username:<input type="text" name="username" /><br />
    First name:<input type="text" name="firstName" /><br />
    Last name:<input type="text" name="lastName" /><br />
    Password:<input type="text" name="password" /><br />
    <input type="submit" value="Create User" />

</form>

<?php
    require_once('./footer.php');
?>  
