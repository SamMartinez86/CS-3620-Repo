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
    flex: 0 1 24%;

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

  /* method='post' action="search_insert.php"      <div class="menuItems">
      <form action="create_item.php">
        <center><input class="btn btn-primary w3-button w3-round w3-blue" type="submit" value="Add item" /></center>
      </form>
    </div> */
</style>

<!-- Begin page content -->
<main role="main" class="container">

  <div class="menuRow">
    <div class="searchHolder menuItems">
      <form action="search_insert.php">
        <input type="text" placeholder="search?" name="search_keyword">
        <button type="submit"><i class="fa fa-search"></i></button>
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
         

        /* 
        if(isset($_GET["del"]) AND $_GET["del"] == "true"){
          echo "<script>alert('Item was deleted!')</script>";
        }
        */

        
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        require_once('./item/item.php');

        $item = new item();
        $items = $item->getItemsByUserId($_SESSION["user_id"]);
        
        $listLength = !empty($items) ? count($items) :0;
        //$listLength = count($items);

        for($i = 0; $i < $listLength; $i++) {            
            echo '<div class="cards w3-card-4 w3-light-grey">
                    <div class="card">                    
                      <a href="' . $items[$i]->getItemImage() . '"><img alt="' . $items[$i]->getItemName() . '" title="' . $items[$i]->getItemName() . '" src="' . $items[$i]->getItemImage() . '" border="0" /></a>
                      <h1 >' . $items[$i]->getItemName() . '</h1>                     
                      <h4 > ' . $items[$i]->getItemCost() . '</h4>
                      <h4 > ' . $items[$i]->getItemType() . '</h4>                       
                      <h5 >$' . $items[$i]->getItemDescription() . '</h5>
                      <form action="addWishlist.php">
                      <center><input class="btn btn-primary w3-button w3-round w3-blue" type="submit" value="Add to wishlist" /></center>
                      </form>                                            
                    </div>
                    <br />';
          }
          
      ?>
  </div>

</main>

<center><a href="logout.php">Logout</a></center>

<?php require_once('footer.php'); ?>
