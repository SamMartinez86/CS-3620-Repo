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
            $item = new hero();

            $item->setItemId($row["item_id"]);
            $item->setItemName($row["item_name"]);
            $item->setItemDescription($row["item_description"]);
            $item->setItemCost($row["item_cost"]);
            $item->setItemType($row["item_cost"]);
            $item->setItemImage($row["item_cost"]);
            $item->setUserId($row["user_id"]);
            $items[$index] = $item;
            $index = $index + 1;
        }
    }
    else {
        echo "0 results";
    } 
    $conn->close();

    return $items;
  }

  function createHero($item){
    require_once('./utilities/connection.php');

    // prepare and bind
    $insertItem = $conn->prepare("INSERT INTO userschema.item (`item_name`,
    `item_description`, `item_cost`, `user_id`) VALUES (?, ?, ?, ?)");

    $hn = $item->getHeroName();
    $ha = $item->getHeroAbility();
    $hd = $item->getHeroDescription();
    $ui = $item->getUserId();

    $insertItem->bind_param("ssss", $hn, $ha, $hd, $ui);
    $insertItem->execute();

    $insertItem->close();
    $conn->close();
  }

  // select heros by user id function
  function getHerosByUserId($user_id){
    require_once('./utilities/connection.php');
    require_once('./hero/hero.php');

    $sql = "SELECT item_id, item_name, item_description, item_cost, user_id FROM userschema.item WHERE user_id =" . $user_id;
    $result = $conn->query($sql);

    $items;
    $index = 0;

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $item = new hero();

            $item->setHeroId($row["item_id"]);
            $item->setHeroName($row["item_name"]);
            $item->setHeroAbility($row["item_description"]);
            $item->setHeroDescription($row["item_cost"]);
            $item->setUserId($row["user_id"]);
            $items[$index] = $item;
            $index = $index + 1;
        }
    }
    else {
        echo "0 results";
    } 
    $conn->close();

    return $items;
  }

  // delete show function
  function deleteHero($uid,$hid){
    require_once('./utilities/connection.php');

    $sql = "DELETE FROM userschema.item WHERE user_id =" . $uid . " AND item_id =" . $hid;


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