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
</style>

<!-- Begin page content -->
<main role="main" class="container">

  <h1 class="mt-5">Team Members:</h1>

  <form action="create_hero.php">
    <center><input class="btn btn-primary w3-button w3-round w3-blue" type="submit" value="Add Superhero" /></center>
  </form>

  <br />
  <div class="cardtainer">
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
  </div>

</main>

<center><a href="logout.php">Logout</a></center>

<?php require_once('footer.php'); ?>
