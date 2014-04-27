<?php

require_once 'DbConfig.php';


class DataBase
{
	private function __construct()
	{
		try
		{
			$this->db = new PDO('mysql:host='.DbConfig::$dbHost.'; dbname='.DbConfig::$dbName, DbConfig::$dbLogin, DbConfig::$dbPass);
		}
		catch (PDOException $e) 
		{
			echo 'Connection failed: '. $e->getMessage(); 
		}
	}

	private static $instance;

	public static function getInstance() 
	{
		if (null === self::$instance) 
		{
            self::$instance = new self();
        }
        return self::$instance;
	}

	public function close()
	{
		$db = null;
	}

	public function sql($query, $params = null, $bindParams = null)
	{
		if ($this->db)
		{
			$sth = $this->db->prepare($query);

			if ($bindParams != null)
			{
				foreach ($bindParams as $key => $value) 
				{
					$sth->bindValue($key, $value, PDO::PARAM_INT);
				}
			}

			$sth->execute($params);
			return $sth->fetchAll(PDO::FETCH_ASSOC);
		}

		return null;
	}

	public function lastInsertId()
	{
		return $this->db->lastInsertId();
	}

	public function errorInfo()
	{
		return $this->db->errorInfo();
	}

	public function errorCode()
	{
		return $this->db->errorCode();
	}

	public function quote($str)
	{
		return $this->db->quote($str);
	}

	private $db;
}