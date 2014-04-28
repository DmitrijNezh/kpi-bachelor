<?php
require_once DB_ROOT."Users.php";

class Model
{
    public function getData() {}

    public function isAuth()
    {
        session_start();
        if (isset($_SESSION['pass']) && isset($_SESSION['login']))
        {
            $users = new Users();
            return $users->login($_SESSION['login'], $_SESSION['pass']);
        }
        return false;
    }
}