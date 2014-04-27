<?php

class DataController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new DataModel();
    }

    public function indexAction()
    {
        $this->auth();

        $this->view->generate('DataView.php', $this->model->getData());
    }
}