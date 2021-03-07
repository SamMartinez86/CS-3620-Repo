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
</style>

 <!-- Begin page content -->
 <main role="main" class="container">
      <h1 class="mt-5">Superhero Team Builder</h1>
      <div class="col-3">
        <a href="./create_hero.php" class="btn-primary form-control btn">Add a Superhero</a>
      </div>
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
            echo '<div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">' . $heros[$i]->getHeroName() . '</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Rating: ' . $heros[$i]->getHeroAbility() . '</h6>
                        <p class="card-text">' . $heros[$i]->getHeroDescription() . '</p>
                        <a href="#" class="card-link">Card link</a>
                        <a href="#" class="card-link">Another link</a>
                    </div>
                  </div>
                  <br />';
        }
      ?>

    </main>

<center><a href="logout.php">Logout</a></center>

<?php require_once('footer.php'); ?>


