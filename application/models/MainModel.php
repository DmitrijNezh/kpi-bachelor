<?php
require_once 'BaseModel.php';
require_once DB_ROOT.'Users.php';
require_once DB_ROOT.'Maps.php';

class MainModel extends BaseModel
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

    public function getDataWithMaps()
    {
        $data = $this->getData();

        $maps = new Maps();
        $data['maps'] = $maps->readAll($data['id_user']);

        return $data;
    }

    public function getDataWithMapId($id)
    {
        $data = $this->getData();

        $maps = new Maps();
        $data['map'] = $maps->read($id, $data['id_user']);

        return empty($data['map']) ? null : $data;
    }

    public function remove($id)
    {
        $data = $this->getData();

        $maps = new Maps();
        $maps->delete($id, $data['id_user']);
    }

    public function create($title, $description, $lat, $lng, $zoom, $isPublic)
    {
        $data = $this->getData();

        $maps = new Maps();
        $maps->create($data['id_user'], $title, $description, $lat, $lng, $zoom, $isPublic);
    }

    public function update($id, $title, $description, $lat, $lng, $zoom, $isPublic)
    {
        $data = $this->getData();

        $maps = new Maps();
        $maps->update($id, $data['id_user'], $title, $description, $lat, $lng, $zoom, $isPublic);
    }
}