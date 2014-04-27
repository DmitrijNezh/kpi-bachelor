<?php

class GroundController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new GroundModel();
    }

    public function indexAction()
    {
        $this->auth();

        $this->view->generate('GroundView.php', $this->model->getData());
    }
}