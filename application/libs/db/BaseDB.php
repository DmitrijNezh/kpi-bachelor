<?php

require_once 'DataBase.php';

class BaseDB 
{
	public function __construct($db = null)
	{
		$this->db = is_null($db) ? DataBase::getInstance() : $db;
	}

	protected $db;
}