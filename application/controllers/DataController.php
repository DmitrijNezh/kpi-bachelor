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

        $this->view->generate('DataView.php', $this->model->getDataWithUser());
    }

    public function addAction()
    {
        $this->auth();

        if (!empty($_POST)) {
            $this->model->processData($_POST);
            $this->redirectTo("/data/");
        }
        else {
            $this->view->generate('DataEditView.php', $this->model->getDataForAdd());
        }
    }

    public function removeAction()
    {
        $this->auth();

        if (!empty($_GET['id'])) {
            $this->model->remove($_GET['id']);
        }

        $this->redirectTo("/data/");
    }
}