<?php

class MapController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new MapModel();
    }

    public function indexAction()
    {
        $this->auth();

        $redirect = true;
        if (!empty($_GET['id'])) {
            $data = $this->model->getDataForMap($_GET['id']);
            if (!empty($data)) {
                $this->view->generate('MapView.php', $data);
                $redirect = false;
            }
        }

        if ($redirect) {
            $this->redirectTo("/");
        }
    }

    public function publicAction()
    {
        $redirect = true;
        if (!empty($_GET['id'])) {
            $data = $this->model->getDataForPublicMap($_GET['id']);
            if (!empty($data)) {
                $this->view->generate('MapView.php', $data, "LogOutTemplateView.php");
                $redirect = false;
            }
        }

        if ($redirect) {
            $this->redirectTo("/");
        }
    }
}