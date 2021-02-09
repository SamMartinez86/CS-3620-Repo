<?php
require_once('./user/user.php');

class session {
  // Methods
  function login($username, $password) {
    $user = new User($username);
    
    session_start();

    $_SESSION["user"] = $user;
    print_r($_SESSION);
  }
}
?>