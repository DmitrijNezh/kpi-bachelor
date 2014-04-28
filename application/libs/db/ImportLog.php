<?php
require_once 'BaseDB.php';

class ImportLog extends BaseDB
{
    public function create($idUser, $type, $status, $objList, $idMap)
    {
        return $this->db->sql("INSERT INTO import_log (id_user, type, status, objects_list, date, id_map) VALUES (?,?,?,?, NOW(), ?)", array($idUser, $type, $status, $objList, $idMap));
    }

    public function read($id, $idUser)
    {
        $row = $this->db->sql("SELECT * FROM import_log WHERE id = ? AND id_user = ?", array($id, $idUser));
        return $row[0];
    }

    public function update($id, $idUser, $status, $objList)
    {
        return $this->db->sql("UPDATE import_log SET status = ?, objects_list = ? WHERE id = ? AND id_user = ?", array($status, $objList, $id, $idUser));
    }

    public function delete($id, $idUser)
    {
        return $this->db->sql("DELETE FROM import_log WHERE id = ? AND id_user = ?", array($id, $idUser));
    }

    public function readAll($idUser)
    {
        $sql = "
            SELECT
                il.id AS id,
                il.type AS type,
                il.status AS status,
                il.objects_list AS objects_list,
                m.title AS m_title
            FROM
                import_log AS il
                JOIN maps AS m ON il.id_map = m.id
            WHERE
                il.id_user = ?
        ";

        return $this->db->sql($sql, array($idUser));
    }
}