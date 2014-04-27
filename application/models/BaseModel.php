<?php
require_once DB_ROOT."Configs.php";

class BaseModel extends Model
{
	public function getData()
	{
        $data = array();

        $configs = new Configs();
        $data['configs']['main_title'] = $configs->getValue('main_title');

		return $data;
	}
}