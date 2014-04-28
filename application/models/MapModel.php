<?php
require_once 'BaseModel.php';
require_once DB_ROOT.'Users.php';
require_once DB_ROOT.'Maps.php';
require_once DB_ROOT.'MapObjects.php';
require_once DB_ROOT.'ChartData.php';

class MapModel extends BaseModel
{
    public function getData()
    {
        $data = parent::getData();

        $data['title'] = "Карты";
        $data['active'] = "maps";

        $users = new Users();
        $data['id_user'] = $users->getUserId($_SESSION['login']);

        return $data;
    }

    public function getDataForMap($mapId)
    {
        $data = $this->getData();

        $maps = new Maps();

        if ($maps->isUserMap($data['id_user'], $mapId)) {
            $mapObjects = new MapObjects();
            $chartData = new ChartData();

            $data['objects'] = $mapObjects->readAllFromMap($mapId);
            $data['map'] = $maps->read($mapId, $data['id_user']);
            $data['chart_data'] = $chartData->readAllFromMap($mapId);
        }
        else {
            $data = null;
        }

        return $data;
    }

    public function getDataForPublicMap($mapId)
    {
        $maps = new Maps();

        if ($maps->isPublicMap($mapId)) {
            $mapObjects = new MapObjects();
            $chartData = new ChartData();

            $data['objects'] = $mapObjects->readAllFromMap($mapId);
            $data['map'] = $maps->readPublic($mapId);
            $data['chart_data'] = $chartData->readAllFromMap($mapId);
        }
        else {
            $data = null;
        }

        return $data;
    }
}