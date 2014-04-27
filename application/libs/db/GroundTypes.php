<?php
require_once 'BaseDB.php';

class GroundTypes extends BaseDB
{
    public function create($name, $description, $color)
    {
        return $this->db->sql("INSERT INTO ground_types (name, description, color) VALUES (?,?,?)", array($name, $description, $color));
    }

    public function read($id)
    {
        $row = $this->db->sql("SELECT * FROM ground_types WHERE id = ?", array($id));
        return $row[0];
    }

    public function update($id, $name, $description, $color)
    {
        return $this->db->sql("UPDATE ground_types SET name = ?, description = ?, color = ? WHERE id = ?", array($name, $description, $color, $id));
    }

    public function delete($id)
    {
        return $this->db->sql("DELETE FROM ground_types WHERE id = ?", array($id));
    }

    public function readAll()
    {
        return $this->db->sql("SELECT * FROM ground_types");
    }

}