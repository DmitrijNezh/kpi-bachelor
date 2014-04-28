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

        $this->view->generate('MainView.php', $this->model->getDataWithMaps());
    }

    public function removeAction()
    {
        if (!empty($_GET['id'])) {
            $this->model->remove($_GET['id']);
        }

        $this->redirectTo("/main/");
    }

    public function addAction()
    {
        if (empty($_POST)) {
            $this->view->generate('MainEditView.php', $this->model->getData());
        }
        else {
            $this->model->create($_POST['title'], $_POST['description'], $_POST['lat'], $_POST['lng'], $_POST['zoom'], isset($_POST['is_public']));
            $this->redirectTo("/main/");
        }
    }

    public function editAction()
    {
        if (!empty($_GET['id'])) {
            if (empty($_POST)) {
                $data = $this->model->getDataWithMapId($_GET['id']);
                if (empty($data)) {
                    $this->redirectTo("/main/");
                }

                $this->view->generate('MainEditView.php', $data);
            }
            else {
                $this->model->update($_GET['id'], $_POST['title'], $_POST['description'], $_POST['lat'], $_POST['lng'], $_POST['zoom'], isset($_POST['is_public']));
                $this->redirectTo("/main/");
            }
        }
    }
}