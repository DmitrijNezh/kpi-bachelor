<?php
require_once 'BaseModel.php';
require_once DB_ROOT."Users.php";


class AuthModel extends BaseModel
{
    public function getData()
    {
        $data = parent::getData();

        return $data;
    }

    public function login($login, $pass)
    {
        $users = new Users();

        if ($users->login($login, $pass)) {
            session_start();
            $_SESSION['pass'] = $pass;
            $_SESSION['login'] = $login;

            return true;
        }

        return false;
    }

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
    }
}