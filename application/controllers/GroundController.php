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

        $this->view->generate('GroundView.php', $this->model->getDataWithTypes());
    }

    public function removeAction()
    {
        if (!empty($_GET['id'])) {
            $this->model->remove($_GET['id']);
        }

        $this->redirectTo("/ground/");
    }

    public function addAction()
    {
        if (empty($_POST)) {
            $this->view->generate('GroundEditView.php', $this->model->getData());
        }
        else {
            $this->model->create($_POST['name'], $_POST['description'], $_POST['color']);
            $this->redirectTo("/ground/");
        }
    }

    public function editAction()
    {
        if (!empty($_GET['id'])) {
            if (empty($_POST)) {
                $data = $this->model->getDataWithTypeId($_GET['id']);
                if (empty($data)) {
                    $this->redirectTo("/ground/");
                }

                $this->view->generate('GroundEditView.php', $data);
            }
            else {
                $this->model->update($_GET['id'], $_POST['name'], $_POST['description'], $_POST['color']);
                $this->redirectTo("/ground/");
            }
        }
    }

}