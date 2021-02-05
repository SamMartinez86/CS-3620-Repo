<?php

require_once('./user/userDAO.php');

CLass User
{
    // attributes
    private $username;
    private $user_id;

    // get user method
    public function getUser($user_id)
    {
        $this->user_id = $user_id;

        $userDAO = new $userDAO();
        $userDAO->getUser($this);
        
        return $this;
    {

    // username getter
    public function getUsername()
    {
        return $this->username;
    }

    // username seetter
    public function setUsername($username)
    {
        $this->username = $username;
    }

    // user id getter
    public function getUserId()
    {
        return $this->user_id;
    }
}

?>