<?php
require_once('./item/itemDAO.php');

class item implements \JsonSerializable {

  // object member variables
  private $item_id;
  private $user_id;
  private $item_name;
  private $item_description;
  private $item_cost;
  private $item_type;
  private $item_image;


  // constructor
  function __construct() {
  }

  // item_id getter/setter
  function getItemId(){
    return $this->item_id;
  }
  function setItemId($item_id){
    $this->item_id = $item_id;
  }

  // item_name getter/setter
  function getItemName() {
    return $this->hero_first;
  }
  function setItemName($hero_first){
    $this->hero_first = $hero_first;
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

  // user_id getter/setter
  function setUserId($user_id){
    $this->user_id = $user_id;
  }
  function getUserId(){
    return $this->user_id;
  }
 
  // item_type getter/setter
  function getItemType() {
    return $this->item_cost;
  }
  function setItemType($item_cost){
    $this->item_cost = $item_cost;
  }

  // item_image getter/setter
  function getItemImage() {
    return $this->item_cost;
  }
  function setItemImage($item_cost){
    $this->item_cost = $item_cost;
  }

  // get item list function
  function getMyItems($user_id){
    $itemDAO = new itemDAO();
    return $itemDAO->getItemsByUserId($user_id);
  }

  // serialize object Json
  public function jsonSerialize(){
      $vars = get_object_vars($this);
      return $vars;
  }

  // create new hero entry
  function createItem(){
    $itemDAO = new itemDAO();
    $itemDAO->createItem($this);
  }

  // delete hero function
  function deleteItem($user_id, $item_id){
    $itemDAO = new itemDAO();
    $itemDAO->deleteItem($user_id, $item_id);
  }
}

?>