<?php
class UserDAO {
  function getUser($user){
    require_once('./utilities/connection.php');
    
    $sql = "SELECT firstName, lastName, user_id FROM usertable WHERE user_id =" . $user->getUserId();
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $user->setFirstName($row["firstName"]);
      $user->setLastName($row["lastName"]);
      $user->setUsername($row["username"]);
        
    }
    } else {
        echo "0 results";
    }
    $conn->close();
  }

  function createUser($user){
    require_once('./utilities/connection.php');
    
    $sql = "INSERT INTO userschema.usertable
    (
    `username`,
    `password`,
    `firstName`,
    `lastName`)
    VALUES
    ('" . $user->getUsername() . "',
    '" . $user->getPassword() . "',
    '" . $user->getFirstName() . "',
    '" . $user->getLastName() . "'
    );";

    if ($conn->query($sql) === TRUE) {
      echo "user created";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }

  function deleteUser($un){
    require_once('./utilities/connection.php');
    
    $sql = "DELETE FROM userschema.usertable WHERE username = '" . $un . "';";

    if ($conn->query($sql) === TRUE) {
      echo "user deleted";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }

}
?>