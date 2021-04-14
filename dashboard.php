<?php
error_reporting (E_ALL ^ E_NOTICE);
require_once 'sessioncheck.php';

require_once 'header.php';

?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>


  .carditem{
    text-align: center
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
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: stretch;
    flex-basis: 16.66%;
  }

  .searchHolder {
    cursor: pointer;
  }

  .menusItemized {
    width: 100%;
    display: flex;
  }

 select {
    width: auto;
 }

 form {
  width: auto;
 }



</style>

<!-- Begin page content -->
<main role="main" class="container">

  <center><div class="menuRow">
    <div class="menusItemized">
      <form action="wishlist.php">
        <input class="" type="submit" value="Wish list" />
      </form>
    </div>
    <div class="menusItemized ">
      <select class="" name="order">
        <option value="name_asc">Name Asc</option>
        <option value="name_desc">Name Desc</option>
        <option value="cost_asc">Cost Asc</option>
        <option value="cost_desc">Cost Desc</option>
      </select>
    </div>
    <div class="menusItemized ">
      <form method='post'>
        <input class="" type="text" placeholder="search?" name="search_keyword">
        <button class="" type="submit">Search</button>
      </form>
    </div>
    <div class="menusItemized ">
      <form method='post'>
        <input class="" type="submit" value="Reset" name="reset" />
      </form>
    </div>
    <div class="menusItemized ">
      <form action="logout.php">
        <input class="" type="submit" value="Logout" />
      </form>
    </div>
    </center></div>

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
                      <h1 class="carditem">' . $items[$i]->getItemName() . '</h1>                     
                      <h4 class="carditem"> ' . $items[$i]->getItemCost() . '</h4>
                      <h4 class="carditem"> ' . $items[$i]->getItemType() . '</h4>                       
                      <h5 class="carditem">$' . $items[$i]->getItemDescription() . '</h5>
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

<?php require_once('footer.php'); ?>
