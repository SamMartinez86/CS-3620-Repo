<?php
require_once('./user/userDAO.php');

class User {
  // Properties
  private $user_id;
  private $username;
  private $firstName;
  private $last_name;
  private $password;

  // Methods
  function __construct() {
  }
  function getUserId(){
    return $this->user_id;
  }
  function setUserId($user_id){
    $this->user_id = $user_id;
  }
  function getUsername() {
    return $this->username;
  }
  function setUsername($username){
    $this->username = $username;
  }
  function getFirstName() {
    return $this->firstName;
  }
  function setFirstName($firstName){
    $this->firstName = $firstName;
  }
  function getLastName() {
    return $this->lastName;
  }
  function setLastName($lastName){
    $this->lastName = $lastName;
  }
  function setPassword($password){
    $this->password = hash("sha256", $password);
  }
  function getPassword(){
    return $this->password;
  }

  function getUser($user_id){
    $this->user_id = $user_id;
    $userDAO = new userDAO();
    $userDAO->getUser($this);
    return $this;
  }

  function createUser(){
    $userDAO = new userDAO();
    $userDAO->createUser($this);
  }

  function deleteUser($username){
    $userDAO = new userDAO();
    $userDAO->deleteUser($username);
  }
}
?>