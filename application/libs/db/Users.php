<?php

require_once 'BaseDB.php';


class Users extends BaseDB
{
	public function create($login, $pass)
	{
		if (count($this->db->sql("SELECT * FROM users WHERE login = ?", array($login))) == 0) {
			$this->db->sql("INSERT INTO users (login, pass) VALUES (?,?)", array($login, $this->hashStr($pass)));

			return $this->db->sql("SELECT * FROM users WHERE login = ? AND pass = ?", array($login, $this->hashStr($pass)));
		}
		else
		{
			return false;
		}
	}

	public function login($login, $pass)
	{
		$user = $this->db->sql("SELECT * FROM users WHERE login = ? AND pass = ?", array($login, $this->hashStr($pass)));

        return !empty($user);
	}

	private function hashStr($pass)
	{
		$hashPass = md5($pass);
		return md5($hashPass . $this->salt);
	}

	private $salt = "321 strong Salt ### 123";
}