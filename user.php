<?php

require_once('./userDAO.php');

CLass User
{
    private $username;
    private $user_id;

    public function getUser($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    {

    public function getUsername()
    {
        return $username;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function getUserId()
    {
        return $user_id;
    }
}

?>