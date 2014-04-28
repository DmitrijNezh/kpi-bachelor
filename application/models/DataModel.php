<?php
require_once 'BaseModel.php';
require_once FS_LIBS."handlers/CsvHandler.php";
require_once DB_ROOT.'Users.php';
require_once DB_ROOT.'ImportLog.php';
require_once DB_ROOT.'Maps.php';

class DataModel extends BaseModel
{
    public function getData()
    {
        $data = parent::getData();

        $data['title'] = "Обработка данных";
        $data['active'] = "data";

        $users = new Users();
        $data['id_user'] = $users->getUserId($_SESSION['login']);

        return $data;
    }

    public function getDataWithUser()
    {
        $data = $this->getData();

        $importLog = new ImportLog();
        $data['import_log'] = $importLog->readAll($data['id_user']);

        return $data;
    }

    public function getDataForAdd()
    {
        $data = $this->getData();

        $maps = new Maps();
        $data['maps'] = $maps->readAll($data['id_user']);

        return $data;
    }

    public function remove($id)
    {

    }

    public function processData($impData)
    {
        $data = $this->getData();
        $importLog = new ImportLog();

        if (empty($impData['type']) || empty($_FILES["imp_file"]["tmp_name"])) {
            $importLog->create($data['id_user'], $impData['type'], "FAIL!", "", $impData['map']);
            return;
        }

        $uploadDir = 'tmp/';
        $uploadFile = $uploadDir . basename($_FILES['imp_file']['name']);
        move_uploaded_file($_FILES['imp_file']['tmp_name'], $uploadFile);

        $handler = null;

        switch ($impData['type']) {
            case 'csv':
                $handler = new CsvHandler($uploadFile, $impData['map']);
                break;
        }

        $result = $handler->handle();
        $importLog->create($data['id_user'], $result['type'], $result['status'], join(", ", $result['objects_list']), $impData['map']);
    }
}