<?php
require_once 'BaseDB.php';

class Pages extends BaseDB
{
    public function read($code)
    {
        $row = $this->db->sql("SELECT * FROM pages WHERE code = ?", array($code));
        return $row[0];
    }
}