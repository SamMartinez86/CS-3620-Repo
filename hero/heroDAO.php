<?php
class heroDAO {
  function getAllHeros(){
    require_once('./utilities/connection.php');
    require_once('./hero/hero.php');

    $sql = "SELECT hero_id, hero_name, hero_ability, hero_description, user_id FROM userschema.herodb";
    $result = $conn->query($sql);

    $heros;
    $index = 0;

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $hero = new hero();

            $hero->setHeroId($row["hero_id"]);
            $hero->setHeroName($row["hero_name"]);
            $hero->setHeroAbility($row["hero_ability"]);
            $hero->setHeroDescription($row["hero_description"]);
            $hero->setUserId($row["user_id"]);
            $heros[$index] = $hero;
            $index = $index + 1;
        }
    }
    else {
        echo "0 results";
    } 
    $conn->close();

    return $heros;
  }

  function createHero($hero){
    require_once('./utilities/connection.php');

    // prepare and bind
    $insertHero = $conn->prepare("INSERT INTO userschema.herodb (`hero_name`,
    `hero_ability`, `hero_description`, `user_id`) VALUES (?, ?, ?, ?)");

    $hn = $hero->getHeroName();
    $ha = $hero->getHeroAbility();
    $hd = $hero->getHeroDescription();
    $ui = $hero->getUserId();

    $insertHero->bind_param("ssss", $hn, $ha, $hd, $ui);
    $insertHero->execute();

    $insertHero->close();
    $conn->close();
  }

  // select heros by user id function
  function getHerosByUserId($user_id){
    require_once('./utilities/connection.php');
    require_once('./hero/hero.php');

    $sql = "SELECT hero_id, hero_name, hero_ability, hero_description, user_id FROM userschema.herodb WHERE user_id =" . $user_id;
    $result = $conn->query($sql);

    $heros = 0;
    $index = 0;

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $hero = new hero();

            $hero->setHeroId($row["hero_id"]);
            $hero->setHeroName($row["hero_name"]);
            $hero->setHeroAbility($row["hero_ability"]);
            $hero->setHeroDescription($row["hero_description"]);
            $hero->setUserId($row["user_id"]);
            $heros[$index] = $hero;
            $index = $index + 1;
        }
    }
    else {
        echo "0 results";
    } 
    $conn->close();

    return $heros;
  }

  // delete show function
  function deleteHero($uid,$hid){
    require_once('./utilities/connection.php');

    $sql = "DELETE FROM userschema.herodb WHERE user_id =" . $uid . " AND hero_id =" . $hid;


    if ($conn->query($sql) == TRUE) {
      echo "Show Deleted";
  }
  else {
      echo "0 results";
  } 
    $conn->close();
  }

}
?>