
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
?>