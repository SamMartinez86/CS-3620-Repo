<?php
class UserDAO {
  function getUser($user){
    require_once('./utilities/connection.php');
    
    $sql = "SELECT * user_id FROM usertable " . $user->getUserId();
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $user->setFirstName($row["first_name"]);
      $user->setLastName($row["last_name"]);
      $user->setUsername($row["username"]);
        
    }
    } else {
        echo "0 results";
    }
    $conn->close();
  }

  function createUser($user){
    require_once('./utilities/connection.php');
    
    $sql = "INSERT INTO cs3620schema.usertable
    (
    `user_id`,
    `username`,
    `password`,
    `first_name`,
    `last_name`)
    VALUES
    ('" . $user->getUserId() . "',
    '" . $user->getUsername() . "',
    '" . $user->getPassword() . "',
    '" . $user->getFirstName() . "',
    '" . $user->getLastName() . "'
    );";
    $result = $conn->query($sql);

    $conn->close();
  }

}
?>