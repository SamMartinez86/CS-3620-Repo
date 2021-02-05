<?php

require_once('./userDAO.php');

CLass User
{
    private $username;
    private $user_id;

    public function getUser($user_id)
    {
        $this->user_id = $user_id;

        $userDAO = new $userDAO();
        $userDAO->getUser($this);
        
        return $this;
    {

    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function getUserId()
    {
        return $this->user_id;
    }
}

?>