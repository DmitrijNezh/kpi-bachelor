<?php
require_once 'BaseDB.php';

abstract class ChartTypes
{
    const AREA = "area";
    const RECTANGLE = "rectangle";
}

class ChartData extends BaseDB
{
    public function create($idObj, $idGround, $data)
    {
        return $this->db->sql("INSERT INTO chart_data (id_obj, id_ground, type, data) VALUES (?,?,'area',?)", array($idObj, $idGround, $data));
    }
    public function readAllFromMap($idMap)
    {
        $sql = "
            SELECT
	            mo.id, gt.name, gt.color, cd.data
            FROM
	            chart_data AS cd
	            JOIN map_objects AS mo ON cd.id_obj = mo.id
	            JOIN ground_types AS gt ON cd.id_ground = gt.id
            WHERE
	            mo.id_map = ?
	        ORDER BY
	            cd.id DESC

        ";

        return $this->db->sql($sql, array($idMap));
    }
}