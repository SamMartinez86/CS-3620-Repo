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

<!-- temp storage-->
<!--  class="form-control" -->
<!--  class="form-label" -->
<!--  class="mb-3" -->
<!--  class="form-text" -->
<!--  id="emailHelp" -->
<!--  aria-describedby="emailHelp" -->
<!--  id="emailHelp" -->

<title>Login</title>


<form action="login.php" method="POST">
  <center>
    <table class="w3-table" style="width:40%">
      <tr>
        <th><label for="exampleInputEmail1">
            <h2>Email address</h2>
          </label></th>
        <th><input class="w3-input" type="email" id="exampleInputEmail1" name="username" onfocus="this.value=''"></th>
      </tr>
      <tr>
        <th><label for="exampleInputPassword1">
            <h2>Password</h2>
          </label></th>
        <th><input class="w3-input" type="password" id="exampleInputPassword1" name="password" onfocus="this.value=''">
        </th>
      </tr>
      <tr>
        <th><button type="submit" class="btn btn-primary w3-button w3-round w3-blue">Submit</button></th>
        <th><a href="registration.php">Register</a></th>
      </tr>
    </table>
  </center>

  <?php
    require_once('./footer.php');
?>