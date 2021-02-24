<?php
    require_once('./header.php');

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
    h1 {
        text-align: center;
    }

    div {
        text-align: center;
        font-size: 20px;
    }

    th {
        text-align: left;
    }

    a {
        color: blue;
        font-size: 20px;
    }
</style>

<title>Registration</title>


<form method="POST" action="registration_insert.php">
    <center>
        <table class="w3-table" style="width:40%">
            <tr>
                <th>Username:<input class="w3-input" type="text" name="username" onfocus="this.value=''" /></th>
            </tr>
            <tr>
                <th>First Name:<input class="w3-input" type="text" name="firstName" onfocus="this.value=''" /></th>
            </tr>
            <tr>
                <th>Last Name:<input class="w3-input" type="text" name="lastName" onfocus="this.value=''" /></th>
            </tr>
            <tr>
                <th>Password:<input class="w3-input" type="password" name="password" onfocus="this.value=''" /></th>
            </tr>
            <tr>
                <th>
                    <center><input class="btn btn-primary w3-button w3-round w3-blue" type="submit"
                            value="Create User" /></center>
            </tr>
        </table>
    </center>
</form>


<?php
    require_once('./footer.php');
?>
