<?php
class itemDAO {
  function getAllItems(){
    require_once('./utilities/connection.php');
    require_once('./item/item.php');

    $sql = "SELECT item_id, item_name, item_description, item_cost, item_type, item_image, user_id FROM userschema.item";
    $result = $conn->query($sql);

    $items;
    $index = 0;

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $hero = new hero();

            $hero->setItemId($row["item_id"]);
            $hero->setItemName($row["item_name"]);
            $hero->setItemDescription($row["item_description"]);
            $hero->setItemCost($row["item_cost"]);
            $hero->setItemType($row["item_cost"]);
            $hero->setItemImage($row["item_cost"]);
            $hero->setUserId($row["user_id"]);
            $heros[$index] = $hero;
            $index = $index + 1;
        }
    }
    else {
        echo "0 results";
    } 
    $conn->close();

    return $items;
  }

  function createHero($hero){
    require_once('./utilities/connection.php');

    // prepare and bind
    $insertHero = $conn->prepare("INSERT INTO userschema.herodb (`item_name`,
    `item_description`, `item_cost`, `user_id`) VALUES (?, ?, ?, ?)");

    $hn = $hero->getHeroName();
    $ha = $hero->getHeroAbility();
    $hd = $hero->getHeroDescription();
    $ui = $hero->getUserId();

    $insertHero->bind_param("ssss", $hn, $ha, $hd, $ui);
    $insertHero->execute();

    $insertHero->close();
    $conn->close();
  }

  // select heros by user id function
  function getHerosByUserId($user_id){
    require_once('./utilities/connection.php');
    require_once('./hero/hero.php');

    $sql = "SELECT item_id, item_name, item_description, item_cost, user_id FROM userschema.herodb WHERE user_id =" . $user_id;
    $result = $conn->query($sql);

    $heros;
    $index = 0;

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $hero = new hero();

            $hero->setHeroId($row["item_id"]);
            $hero->setHeroName($row["item_name"]);
            $hero->setHeroAbility($row["item_description"]);
            $hero->setHeroDescription($row["item_cost"]);
            $hero->setUserId($row["user_id"]);
            $heros[$index] = $hero;
            $index = $index + 1;
        }
    }
    else {
        echo "0 results";
    } 
    $conn->close();

    return $heros;
  }

  // delete show function
  function deleteHero($uid,$hid){
    require_once('./utilities/connection.php');

    $sql = "DELETE FROM userschema.herodb WHERE user_id =" . $uid . " AND item_id =" . $hid;


    if ($conn->query($sql) == TRUE) {
      echo "Show Deleted";
  }
  else {
      echo "0 results";
  } 
    $conn->close();
  }

}
?>