<?php
require_once 'BaseModel.php';
require_once DB_ROOT."GroundTypes.php";

class GroundModel extends BaseModel
{
    public function getData()
    {
        $data = parent::getData();

        $data['title'] = "Типы грунтов";
        $data['active'] = "ground";

        return $data;
    }

    public function getDataWithTypes()
    {
        $data = $this->getData();

        $groundTypes = new GroundTypes();
        $data['types'] = $groundTypes->readAll();

        return $data;
    }

    public function getDataWithTypeId($id)
    {
        $data = $this->getData();

        $groundTypes = new GroundTypes();
        $data['type'] = $groundTypes->read($id);

        return empty($data['type']) ? null : $data;
    }

    public function remove($id)
    {
        $groundTypes = new GroundTypes();
        $groundTypes->delete($id);
    }

    public function create($name, $description, $color)
    {
        $groundTypes = new GroundTypes();
        $groundTypes->create($name, $description, $color);
    }

    public function update($id, $name, $description, $color)
    {
        $groundTypes = new GroundTypes();
        $groundTypes->update($id, $name, $description, $color);
    }
}