<?php

class MainController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new MainModel();
    }

    public function indexAction()
    {
        $this->auth();

        $this->view->generate('MainView.php', $this->model->getData());
    }
}