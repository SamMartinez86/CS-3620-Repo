<?php
require_once('./user/user.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class session {

  // Methods
  function logout(){
    unset($_SESSION["loggedIn"]);
    unset($_SESSION["user_id"]);
  }

  function login($username, $password) {
    $user = new User();
    $loggedInUser = $user->checkLogin($username, $password);
    if($loggedInUser != 0){
      $_SESSION["loggedIn"] = true;
      $_SESSION["user_id"] = $loggedInUser;
      return true;
    }
    else{
    $this->logout();
      return false;
    }
  }
  
}
?>