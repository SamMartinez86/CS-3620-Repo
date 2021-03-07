<?php 
    //require_once("sessioncheck.php") 

    require_once('header.php');

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
    margin: 0 auto;
    
  }

  .cards {
    display: flex-basis;
    flex-wrap: wrap;
    justify-content: space-between;
  }

  .card {
    flex: 0 1 24%;
  }
</style>

 <!-- Begin page content -->
 <main role="main" class="container">

      <h1 class="mt-5">Team Members:</h1>
      
      <a href="./create_hero.php" class="btn-primary form-control btn">Add a Superhero</a>

  <br/>
      <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        require_once('./hero/hero.php');

        $hero = new hero();
        $heros = $hero->getMyHeros();  

        $listLength = count($heros);

        for($i = 0; $i < $listLength; $i++) {            
            echo '<div class="cardtainer w3-card-4 w3-light-grey" style="width: 20rem;">
                    <div class="cards">
                        <h3 class="card">Name: ' . $heros[$i]->getHeroName() . '</h3>
                        <h4 class="card mb-2 text-muted">Rating: ' . $heros[$i]->getHeroAbility() . '</h4>
                        <p class="card">Powers: ' . $heros[$i]->getHeroDescription() . '</p>
                    </div>
                  </div>
                  <br />';
        }
      ?>

      <!-- 
            echo '<div class="cards" style="width: 18rem;">
                    <div class="card-body">
                        <h3 class="card-title">Name:' . $heros[$i]->getHeroName() . '</h3>
                        <h4 class="card-subtitle mb-2 text-muted">Rating: ' . $heros[$i]->getHeroAbility() . '</h4>
                        <p class="card-text">Powers:' . $heros[$i]->getHeroDescription() . '</p>
                    </div>
                  </div>
                  <br />';
        <a href="#" class="card-link">Card link</a>
        <a href="#" class="card-link">Another link</a>
      -->

    </main>

<center><a href="logout.php">Logout</a></center>

<?php require_once('footer.php'); ?>


