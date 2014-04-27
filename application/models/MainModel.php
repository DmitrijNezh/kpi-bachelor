<?php
require_once 'BaseModel.php';

class MainModel extends BaseModel
{
	public function getData()
	{
		$data = parent::getData();

        $data['title'] = "Карты";
        $data['active'] = "maps";

		return $data;
	}
}