<?php
require_once('./hero/heroDAO.php');

class Hero implements \JsonSerializable {

  // object member variables
  private $hero_id;
  private $hero_name;
  private $user_id;
  private $hero_ability;
  private $hero_description;

  // constructor
  function __construct() {
  }

  // hero_id getter/setter
  function getHeroId(){
    return $this->hero_id;
  }
  function setHeroId($hero_id){
    $this->hero_id = $hero_id;
  }

  // hero_name getter/setter
  function getHeroName() {
    return $this->hero_first;
  }
  function setHeroName($hero_first){
    $this->hero_first = $hero_first;
  }

  // hero_description getter and setter
  
  function getHeroDescription() {
    return $this->hero_description;
  }
  function setHeroDescription($hero_description){
    $this->hero_description = $hero_description;
  }

  // hero_ability getter/setter
  function getHeroAbility() {
    return $this->hero_ability;
  }
  function setHeroAbility($hero_ability){
    $this->hero_ability = $hero_ability;
  }

  // user_id setter
  function setUserId($user_id){
    $this->user_id = $user_id;
  }
 
  // get hero list function
  function getMyHeros(){
    $heroDAO = new heroDAO();
    return $heroDAO->getAllHeros();
  }

  // serialize object Json
  public function jsonSerialize(){
      $vars = get_object_vars($this);
      return $vars;
  }

  // create new hero entry
  function createHero(){
    $heroDAO = new heroDAO();
    $heroDAO->createHero($this);
  }
}
?>