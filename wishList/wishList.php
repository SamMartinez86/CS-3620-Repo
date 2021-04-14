<?php
require_once('./wishList/wishListDAO.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class wishList implements \JsonSerializable {
  // Properties
  private $user_id;
  private $item_id;

  // Methods
  function __construct() {
  }
  function getUserId(){
    return $this->user_id;
  }
  function setUserId($user_id){
    $this->user_id = $user_id;
  }
  function getItemId() {
    return $this->item_id;
  }
  function setItemId($item_id){
    $this->item_id = $item_id;
  }
  
  public function jsonSerialize(){
      $vars = get_object_vars($this);
      return $vars;
  }
}
?>