
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('./wishList/wishList.php');

class wishListDAO {

  function createWishlistItem($wishlist){
    require_once('./utilities/connection.php');
    //require_once('./wishList.wishList.php');

    // prepare and bind
    $insertWishList = $conn->prepare("INSERT INTO userschema.wishlist (`item_id`,
    `user_id`) VALUES (?, ?)");

    $user = $wishlist->getUserId();
    $item = $wishlist->getItemId();


    $insertWishList->bind_param("ss", $item, $user);
    $insertWishList->execute();

    $insertWishList->close();
    $conn->close();
  }

  function ShowWishListItem($user_id){
    require_once('./utilities/connection.php');
    //require_once('./item/item.php');
    //require_once('./user/user.php');
    require_once('./wishList/wishList.php');

    /*
    $sql = "SELECT (userschema.item.item_name, userschema.item.item_description, userschema.item.item_cost, userschema.item.item_type, userschema.item.item_image, userschema.item.item_id
    userschema.user.user_id, userschema.user.first_name)
    FROM (( userschema.wishlist 
    INNER JOIN userschema.user ON userschema.wishlist.user_id = userschema.user.user_id)
    INNER JOIN userschema.item ON userschema.wishlist.item_id = userschema.item.item_id)
    WHERE userschema.user.user_id =" . $user_id;
    */

    $sql = "SELECT * FROM userschema.wishlist";

    $result = $conn->query($sql);

    $wishes = [];
    $index = 0;

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $wish= new wishlist();

            $wish->setItemId($row["userschema.item.item_id"]);
            $wish->setItemName($row["userschema.item.item_name"]);
            $wish->setItemCost($row["userschema.item.item_description"]);
            $wish->setItemDescription($row["userschema.item.item_cost"]);
            $wish->setItemType($row["userschema.item.item_type"]);
            $wish->setItemImage($row["userschema.item.item_image"]);
            $wish->setUserId($row["userschema.user.user_id"]);
            $wishes[$index] = $wish;
            $index = $index + 1;
        }
    }
    else {
        echo "0 results";
    } 
    $conn->close();

    return $wishes;
  }

  // delete wishlist item function
  function deleteWishlistItem($uid,$hid){
    require_once('./utilities/connection.php');

    $sql = "DELETE FROM userschema.wishlist WHERE user_id =" . $uid . " AND item_id =" . $hid;


    if ($conn->query($sql) == TRUE) {
        echo " Wishlist item deleted";
    }
    else {
        echo "0 results";
    } 
    $conn->close();
  }
}
?>