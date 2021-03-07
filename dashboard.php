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
    /*margin: 0 auto;*/
  

  }

  .cards {
    /*width: 20rem;*/
    display: flex;
    flex-direction: row;
    /*flex-wrap: wrap;
    justify-content: space-between; */
  }

  .card {
    flex: 24%;
  }
</style>

<!-- Begin page content -->
<main role="main" class="container">

  <h1 class="mt-5">Team Members:</h1>

  <form action="create_hero.php">
    <center><input class="btn btn-primary w3-button w3-round w3-blue" type="submit" value="Add Superhero" /></center>
  </form>

  <br />
  <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        require_once('./hero/hero.php');

        $hero = new hero();
        $heros = $hero->getMyHeros();  

        $listLength = count($heros);

        for($i = 0; $i < $listLength; $i++) {            
            echo '<div class="cards w3-card-4 w3-light-grey">
                    <div class="card">
                        <h1 >' . $heros[$i]->getHeroName() . '</h1>
                        <h4 >Rating: ' . $heros[$i]->getHeroAbility() . '</h4>
                        <h5 >Powers: ' . $heros[$i]->getHeroDescription() . '</h5>
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
