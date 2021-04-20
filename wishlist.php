<?php 
    require_once'sessioncheck.php'; 

    require_once'header.php';

?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  h1 {
    text-align: center;
  }

  div {
    text-align: center;
    font-size: 20px;
  }

  th {
    text-align: left;
  }

  a {
    color: blue;
    font-size: 20px;
  }

  img {

    width: 100%;
    height: 350px;
    object-fit: cover;
    vertical-align: top;
  }

  .cardtainer {
    width: 90%;
    margin: 0 auto;
    padding: 0.5em 0;
    display: flex;
    flex-flow: wrap;

  }

  .cards {
    width: 350px;
    margin: 0.5em auto;
    flex: 1 0 24%;
    margin: 1%;
  }

  .card {
    /*flex: 0 1 24%;*/

  }

  .menuRow {
    width: 90%;
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
  }

  .menuItems {}

  .searchHolder {
    cursor: pointer;
  }

  .deleteLink {
    color: #2494ef;
  }
</style>

<!-- Begin page content -->
<main role="main" class="container">

  <div class="menuRow">
    <div class="searchHolder menuItems">
      <form action="search_insert.php">
        <input type="text" placeholder="search?" name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    </div>
    <div class="menuItems">
      <form action="create_item.php">
        <center><input class="btn btn-primary w3-button w3-round w3-blue" type="submit" value="Add item" /></center>
      </form>
    </div>
    <div class="menuItems">
      <form action="wishlist.php">
        <center><input class="btn btn-primary w3-button w3-round w3-blue" type="submit" value="wishlist" /></center>
      </form>
    </div>
  </div>

  <br />
  <div class="cardtainer">
    <?php
         
        if(isset($_GET["del"]) AND $_GET["del"] == "true"){
          echo "<script>alert('Item was deleted!')</script>";
        }

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        require_once('./wishList/wishList.php');

        $wishList = new wishList();
        $wishLists = $wishList->ShowWishListItem($_SESSION["user_id"]);

        $listLength = !empty($wishLists) ? count($wishLists) : 0;

        for($i = 0; $i < $listLength; $i++) {            
            echo '<div class="cards w3-card-4 w3-light-grey">
                    <div class="card">                    
                      <a href="' . $wishLists[$i]->getItemImage() . '"><img alt="' . $wishLists[$i]->getItemName() . '" title="' . $wishLists[$i]->getItemName() . '" src="' . $wishLists[$i]->getItemImage() . '" border="0" /></a>
                      <h1 >' . $wishLists[$i]->getItemName() . '</h1>                     
                      <h4 > ' . $wishLists[$i]->getItemCost() . '</h4>
                      <h4 > ' . $wishLists[$i]->getItemType() . '</h4>                       
                      <h5 >$' . $wishLists[$i]->getItemDescription() . '</h5>
                      <form action="addWishlist.php">
                      <center><input class="btn btn-primary w3-button w3-round w3-blue" type="submit" value="Add to wishlist" /></center>
                      </form>                       
                      <a href="deleteWishList.php?item_id=' . $wishLists[$i]->getItemId() . '" class="card-link deleteLink">Delete item</a>
                    </div>
                  </div>
                  <br />';
        }
      ?>
  </div>

</main>

<?php require_once('footer.php'); ?>
