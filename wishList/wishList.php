<?php
require_once('./wishList/wishListDAO.php');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


ini_set('memory_limit','16M');

class wishList implements \JsonSerializable {
  // Properties
  private $user_id;
  private $first_name;
  private $item_id;
  private $item_name;
  private $item_description;
  private $item_cost;
  private $item_type;
  private $item_image;

  // Methods
  function __construct() {
  }

  // from user
  // user_id getter/setter
  function getUserId(){
    return $this->user_id;
  }
  function setUserId($user_id){
    $this->user_id = $user_id;
  }

  // first_name getter/setter
  function getFirstName() {
    return $this->first_name;
  }
  function setFirstName($first_name){
    $this->first_name = $first_name;


  // from items
  // item_id getter/setter
  function getItemId(){
    return $this->item_id;
  }
  function setItemId($item_id){
    $this->item_id = $item_id;
  }

  // item_name getter/setter
  function getItemName() {
    return $this->item_name;
  }
  function setItemName($item_name){
    $this->item_name = $item_name;
  }

  // item_description getter and setter
  function getItemDescription() {
    return $this->item_description;
  }
  function setItemDescription($item_description){
    $this->item_description = $item_description;
  }

  // item_cost getter/setter
  function getItemCost() {
    return $this->item_cost;
  }
  function setItemCost($item_cost){
    $this->item_cost = $item_cost;
  }

      // item_type getter/setter
  function getItemType() {
    return $this->item_type;
  }
  function setItemType($item_type){
    $this->item_type = $item_type;
  }

  // item_image getter/setter
  function getItemImage() {
    return $this->item_image;
  }
  function setItemImage($item_image){
    $this->item_image = $item_image;
  }


  function createWishlistItem(){
      $wishListDAO = new wishList();
      $wishListDAO->createWishlistItem($this);
  }

  // get item list function
  function ShowWishListItem($user_id){
    $wishListDAO = new wishList();
    return $wishListDAO->ShowWishListItem($user_id);
  }

  public function jsonSerialize(){
      $vars = get_object_vars($this);
      return $vars;
  }
}
?>