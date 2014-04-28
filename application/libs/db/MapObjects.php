<?php
require_once 'BaseDB.php';

abstract class MapObjTypes
{
    const POINT = "point";
    const LINE = "line";
}

class MapObjects extends BaseDB
{
    public function create($idMap, $type, $data)
    {
        return $this->db->sql("INSERT INTO map_objects (id_map, type, data) VALUES (?,?,?)", array($idMap, $type, $data));
    }

    public function read($id, $idMap)
    {
        $row = $this->db->sql("SELECT * FROM map_objects WHERE id = ? AND id_map = ?", array($id, $idMap));
        return $row[0];
    }

    public function update($id, $idMap, $type, $data)
    {
        return $this->db->sql("UPDATE map_objects SET id_map = ?, type = ?, data = ? WHERE id = ?", array($idMap, $type, $data, $id));
    }

    public function delete($id, $idMap)
    {
        return $this->db->sql("DELETE FROM map_objects WHERE id = ? AND id_map = ?", array($id, $idMap));
    }

    public function readAllFromMap($idMap)
    {
        return $this->db->sql("SELECT * FROM map_objects WHERE id_map = ?", array($idMap));
    }
}