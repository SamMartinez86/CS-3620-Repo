<?php
error_reporting (E_ALL ^ E_NOTICE);
class itemDAO {
  function getAllItems(){
    require_once('./utilities/connection.php');
    require_once('./item/item.php');

    $sql = "SELECT item_id, item_name, item_description, item_cost, item_type, item_image, user_id FROM userschema.item
    ORDER BY item_name ASC";
    $result = $conn->query($sql);

    $items = [];
    $index = 0;

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $item = new item();

            $item->setItemId($row["item_id"]);
            $item->setItemName($row["item_name"]);
            $item->setItemCost($row["item_description"]);
            $item->setItemDescription($row["item_cost"]);
            $item->setItemType($row["item_type"]);
            $item->setItemImage($row["item_image"]);
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

  function getAllFilterItems($order){
    require_once('./utilities/connection.php');
    require_once('./item/item.php');


    $sql = "SELECT item_id, item_name, item_description, item_cost, item_type, item_image, user_id FROM userschema.item
    ORDER BY " . $order;
    $result = $conn->query($sql);

    $items = [];
    $index = 0;

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $item = new item();

            $item->setItemId($row["item_id"]);
            $item->setItemName($row["item_name"]);
            $item->setItemCost($row["item_description"]);
            $item->setItemDescription($row["item_cost"]);
            $item->setItemType($row["item_type"]);
            $item->setItemImage($row["item_image"]);
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


  function createItem($item){
    require_once('./utilities/connection.php');

    // prepare and bind
    $insertItem = $conn->prepare("INSERT INTO userschema.item (`item_name`,
    `item_cost`,`item_description`,`item_type`, `item_image` ,`user_id`) VALUES (?, ?, ?, ?, ?, ?)");

    $in = $item->getItemName();
    $ia = $item->getItemCost();
    $id = $item->getItemDescription();
    $it = $item->getItemType();
    $ii = $item->getItemImage();
    $ui = $item->getUserId();

    $insertItem->bind_param("ssssss", $in, $ia, $id, $it, $ii, $ui);
    $insertItem->execute();

    $insertItem->close();
    $conn->close();
  }

  // select items by user id function
  function getItemsByUserId($user_id){
    require_once('./utilities/connection.php');
    require_once('./item/item.php');

    $sql = "SELECT item_id, item_name, item_description, item_cost, item_type, item_image, user_id FROM userschema.item WHERE user_id =" . $user_id;
    $result = $conn->query($sql);

    $items = [];
    $index = 0;

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $item = new item();

            $item->setItemId($row["item_id"]);
            $item->setItemName($row["item_name"]);
            $item->setItemCost($row["item_description"]);
            $item->setItemDescription($row["item_cost"]);
            $item->setItemType($row["item_type"]);
            $item->setItemImage($row["item_image"]);
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
  function deleteItem($uid,$hid){
    require_once('./utilities/connection.php');

    $sql = "DELETE FROM userschema.item WHERE user_id =" . $uid . " AND item_id =" . $hid;


    if ($conn->query($sql) == TRUE) {
      echo "Item deleted";
  }
  else {
      echo "0 results";
  } 
    $conn->close();
  }


  //search items
  
  function searchOrderedItemsByKeyword($search_keyword, $order){
    require_once('./utilities/connection.php');
    require_once('./item/item.php');

    $sql = "SELECT item_id, item_name, item_description, item_cost, item_type, item_image, user_id FROM userschema.item WHERE item_name LIKE '%" . $search_keyword . "%'
    OR item_type LIKE '%" . $search_keyword . "%'
    OR item_cost LIKE '%" . $search_keyword . "%'
    OR item_description LIKE '%" . $search_keyword . "%'
    ORDER BY " . $order;
    $result = $conn->query($sql);

    $items = [];
    $index = 0;

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $item = new item();

            $item->setItemId($row["item_id"]);
            $item->setItemName($row["item_name"]);
            $item->setItemCost($row["item_description"]);
            $item->setItemDescription($row["item_cost"]);
            $item->setItemType($row["item_type"]);
            $item->setItemImage($row["item_image"]);
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

    //search items
  
    function searchItemsByKeyword($search_keyword){
      require_once('./utilities/connection.php');
      require_once('./item/item.php');
  
      $sql = "SELECT item_id, item_name, item_description, item_cost, item_type, item_image, user_id FROM userschema.item WHERE item_name LIKE '%" . $search_keyword . "%'
      OR item_type LIKE '%" . $search_keyword . "%'
      OR item_cost LIKE '%" . $search_keyword . "%'";
      $result = $conn->query($sql);
  
      $items = [];
      $index = 0;
  
      if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
              $item = new item();
  
              $item->setItemId($row["item_id"]);
              $item->setItemName($row["item_name"]);
              $item->setItemCost($row["item_description"]);
              $item->setItemDescription($row["item_cost"]);
              $item->setItemType($row["item_type"]);
              $item->setItemImage($row["item_image"]);
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
  
}
?>