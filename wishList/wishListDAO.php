
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class wishListDAO {
//    function getWishlist($wishlist){
//        require('./utilities/connection.php');
//
//        $sql = "SELECT userschema.item.item_name, userschema.item.item_description,
//        userschema.item.item_cost, userschema.item.item_type, userschema.item.item_image FROM userschema.item
//        INNER JOIN user ON userschema.item.item_id = userschema.wishlist.item_id";
//
//        $result = $conn->query($sql);
//    }

    function createWishlistItem($wishlist){
        require_once('./utilities/connection.php');
        require_once('./wishList.wishList.php');

        // prepare and bind
        $insertWishList = $conn->prepare("INSERT INTO userschema.wishlist (`item_id`,`user_id`)
        VALUES (?, ?)");

        $user = $wishlist->getUserId();
        $item = $wishlist->getItemId();


        $insertWishList->bind_param("ss", $item, $user);
        $insertWishList->execute();

        $insertWishList->close();
        $conn->close();
    }

}

    function ShowWishListItem($user_id){
        require_once('./utilities/connection.php');

        $sql = "SELECT (userschema.item.item_name, userschema.item.item_description, userschema.item.item_type, userschema.item.item_image, userschema.item.item_id
        userschema.user.user_id, userschema.user.first_name)
        FROM (( userschema.wishlist 
        INNER JOIN userschema.user ON userschema.wishlist.user_id = userschema.user.user_id)
        INNER JOIN userschema.item ON userschema.wishlist.item_id = userschema.item.item_id)
        WHERE userschema.user.user_id =" . $user_id;

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
?>