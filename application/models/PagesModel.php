<?php
require_once 'BaseModel.php';
require_once DB_ROOT."Pages.php";

class PagesModel extends BaseModel
{
    function getData()
    {
        $data = parent::getData();
        return $data;
    }

    function getDataWithPage($pageCode)
    {
        $data = $this->getData();

        $pages = new Pages();
        $pageData = $pages->read($pageCode);

        if ($pageCode == "help")
        {
            $pageData['active'] = "help";
        }

        return array_merge($data, $pageData);
    }
}