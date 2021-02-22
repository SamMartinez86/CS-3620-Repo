<?php
class UserDAO {
  function getUser($user){
    require_once('./utilities/connection.php');
    
    $sql = "SELECT first_name, last_name, username, user_id FROM user WHERE user_id =" . $user->getUserId();
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

  function checkLogin($passedinusername, $passedinpassword){
    require_once('./utilities/connection.php');
    $user_id = 0;
    $sql = "SELECT user_id FROM user WHERE username = '" . $passedinusername . "' AND password = '" . hash("sha256", trim($passedinpassword)) . "'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $user_id = $row["user_id"];
      }
    }
    else {
        echo "0 results";
    }
    $conn->close();
    return $user_id;
  }

  // for username
  function getUserN($user){
    require_once('./utilities/connection.php');
    
    $sql = "SELECT first_name, last_name, username FROM user WHERE username ="."'". $user->getUsername() ."'";
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

  // for firstname
  function getUserF($user){
    require_once('./utilities/connection.php');
    
    $sql = "SELECT first_name, last_name, username FROM user WHERE first_name ="."'". $user->getFirstName() ."'";
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

  // for lastname
  function getUserL($user){
    require_once('./utilities/connection.php');
    
    $sql = "SELECT first_name, last_name, username FROM user WHERE last_name ="."'". $user->getLastName() ."'";
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
    
    $sql = "INSERT INTO userschema.user
    (
    `username`,
    `password`,
    `first_name`,
    `last_name`)
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
    
    $sql = "DELETE FROM userschema.user WHERE username = '" . $un . "';";

    if ($conn->query($sql) === TRUE) {
      echo "user deleted";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  }
}
?>