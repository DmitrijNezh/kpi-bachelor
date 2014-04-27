<?php
require_once 'BaseModel.php';

class DataModel extends BaseModel
{
    public function getData()
    {
        $data = parent::getData();

        $data['title'] = "Обработка данных";
        $data['active'] = "data";

        return $data;
    }
}