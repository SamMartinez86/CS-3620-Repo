<?php
error_reporting (E_ALL ^ E_NOTICE);
require_once 'sessioncheck.php';

require_once 'header.php';

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
    align-items: baseline;
  }

  .menuItems {
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
  }

  .searchHolder {
    cursor: pointer;
  }

  .searchBox{
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;

  }

  .buttonBoi {
    flex-shrink: 0;
    margin: 5px;
  }

  .deleteLink {
    color: #2494ef;  
  }

  .buttonzy{
    
  }

  .searchSpot {
    height: 34px;
  }
</style>

<!-- Begin page content -->
<main role="main" class="container">

  <div class="menuRow">
    <div class="searchBox">
      <div>
      <select class="buttonzy" name="order" id="order">
        <option value="name_asc">Name Asc</option></option>
        <option value="name_desc">Name Desc</option>
        <option value="cost_asc">Cost Asc</option>
        <option value="cost_desc">Cost Desc</option>
      </select>
      </div>
      <div class="menuItems">
        <form method='post'>
          <input class="buttonzy" type="text" placeholder="search?" name="search_keyword">  
          <button class="buttonzy searchSpot" type="submit"><i class="fa fa-search"></i></button>
        </form>
      </div>
      <div class="menuItems">
        <form method='post'>
          <input class="buttonzy" type="submit" value="Reset" name="reset" />
        </form>
      </div>
    </div>
    <div class="menuItems">
      <form action="wishlist.php">
        <center><input class="buttonzy" type="submit" value="Wish list" /></center>
      </form>
    </div>
    <div class="menuItems" >
      <div class="menuItems">
        <form action="logout.php">
          <center><input class="buttonzy" type="submit" value="Logout" /></center>
        </form>
      </div>
    </div>
  </div>

  <br />
  <div class="cardtainer">
    <?php


        //ini_set('display_errors', 1);
        //ini_set('display_startup_errors', 1);
        //error_reporting(E_ALL);

        require_once('./item/item.php');
        
        if (!isset($_POST['search_keyword'])) {

            $item = new item();
            $items = $item->getMyItems();

            $listLength = !empty($items) ? count($items) : 0;

            for ($i = 0; $i < $listLength; $i++) {
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
                  </div>  
                    <br />';
            }
          
          } elseif (isset($_POST["reset"])){

            $item = new item();
            $items = $item->getMyItems();
  
            $listLength = !empty($items) ? count($items) :0;
  
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
                      </div>  
                        <br />';
            }
        }  else {

          
            $item = new item();
            $items = $item->searchItemsByKeyword($_POST['search_keyword']);

            $listLength = !empty($items) ? count($items) : 0;

            for ($i = 0; $i < $listLength; $i++) {
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
                    </div>  
                      <br />';
            }

        }
        
        ?>
  </div>

</main>

<center><a href="logout.php">Logout</a></center>

<?php require_once('footer.php'); ?>
