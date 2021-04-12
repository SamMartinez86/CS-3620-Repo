<?php 
    require_once'sessioncheck.php'; 

    require_once'header.php';

?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

  .cardtainer {
    width: 90%;
    margin: 0 auto;
    padding: 0.5em 0;
    display: flex;
    flex-flow: wrap;

  }

  .cards {
    width: 90%;
    margin: 0.5em auto;
    flex: 1 0 24%;
    margin: 1%;
  }

  .card {
    /*flex: 0 1 24%;*/

  }

  .deleteLink {
    color: #2494ef;
  }
</style>

<!-- Begin page content -->
<main role="main" class="container">

  <h1 class="mt-5">Marketplace items:</h1>

  <form action="create_item.php">
    <center><input class="btn btn-primary w3-button w3-round w3-blue" type="submit" value="Add item" /></center>
  </form>
  <form action="wishlist.php">
    <center><input class="btn btn-primary w3-button w3-round w3-blue" type="submit" value="wishlist" /></center>
  </form>

  <br />
  <div class="cardtainer">
    <?php
         
        if(isset($_GET["del"]) AND $_GET["del"] == "true"){
          echo "<script>alert('Item was deleted!')</script>";
        }

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        require_once('./item/item.php');

        $item = new item();
        $items = $item->getMyItems($_SESSION["user_id"]);
        
        $listLength = count($items);

        for($i = 0; $i < $listLength; $i++) {            
            echo '<div class="cards w3-card-4 w3-light-grey">
                    <div class="card">                    
                      <a href="' . $items[$i]->getItemImage() . '"><img alt="' . $items[$i]->getItemName() . '" title="' . $items[$i]->getItemName() . '" src="' . $items[$i]->getItemImage() . '" border="0" /></a>
                      <h1 >' . $items[$i]->getItemName() . '</h1>                     
                      <h4 > ' . $items[$i]->getItemCost() . '</h4>
                      <h4 > ' . $items[$i]->getItemType() . '</h4>                       
                      <h5 >$ ' . $items[$i]->getItemDescription() . '</h5>                       
                      <a href="delete_item.php?item_id=' . $items[$i]->getItemId() . '" class="card-link deleteLink">Delete item</a>
                    </div>
                  </div>
                  <br />';
        }
      ?>
  </div>

</main>

<center><a href="logout.php">Logout</a></center>

<?php require_once('footer.php'); ?>
