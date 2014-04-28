<?php
require_once 'BaseDB.php';

class Configs extends BaseDB
{
    public function read($key)
    {
        $configs = $this->db->sql("SELECT * FROM configs WHERE c_key = ?", array($key));
        return $configs[0];
    }

    public function update($key, $value)
    {
        return $this->db->sql("UPDATE configs SET c_value = ? WHERE c_key = ?", array($value, $key));
    }

    public function getValue($key)
    {
        $conf = $this->read($key);
        return $conf['c_value'];
    }
}