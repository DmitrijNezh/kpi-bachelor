<?php
require_once 'BaseModel.php';

class GroundModel extends BaseModel
{
    public function getData()
    {
        $data = parent::getData();

        $data['title'] = "Типы грунтов";
        $data['active'] = "ground";

        return $data;
    }
}