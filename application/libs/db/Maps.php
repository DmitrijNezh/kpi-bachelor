<?php
require_once 'BaseDB.php';

class Maps extends BaseDB
{
    public function create($idUser, $title, $description, $lat, $lng, $zoom, $isPublic)
    {
        $data = array(
            $idUser,
            $title,
            $description,
            $lat,
            $lng,
            $zoom,
            $isPublic ? 1 : 0
        );

        return $this->db->sql("INSERT INTO maps (id_user, title, description, lat, lng, zoom, is_public) VALUES (?,?,?,?,?,?,?)", $data);
    }

    public function read($id, $idUser)
    {
        $row = $this->db->sql("SELECT * FROM maps WHERE id = ? AND id_user = ?", array($id, $idUser));
        return $row[0];
    }

    public function update($id, $idUser, $title, $description, $lat, $lng, $zoom, $isPublic)
    {
        $data = array(
            $title,
            $description,
            $lat,
            $lng,
            $zoom,
            $isPublic ? 1 : 0,
            $id,
            $idUser
        );

        return $this->db->sql("UPDATE maps SET title = ?, description = ?, lat = ?, lng = ?, zoom = ?, is_public = ? WHERE id = ? AND id_user = ?", $data);
    }

    public function delete($id, $idUser)
    {
        return $this->db->sql("DELETE FROM maps WHERE id = ? AND id_user = ?", array($id, $idUser));
    }

    public function readAll($idUser)
    {
        return $this->db->sql("SELECT * FROM maps WHERE id_user = ?", array($idUser));
    }

    public function isUserMap($idUser, $idMap)
    {
        $data = $this->db->sql("SELECT 1 FROM maps WHERE id_user = ? AND id = ?", array($idUser, $idMap));

        return !empty($data);
    }

    public function isPublicMap($idMap)
    {
        $data = $this->db->sql("SELECT 1 FROM maps WHERE is_public = 1 AND id = ?", array($idMap));

        return !empty($data);
    }

    public function readPublic($id)
    {
        $row = $this->db->sql("SELECT * FROM maps WHERE id = ? AND is_public = 1", array($id));
        return $row[0];
    }
}