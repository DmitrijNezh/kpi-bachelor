<?php

class PagesController extends Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new PagesModel();
    }

    public function indexAction()
    {
        $this->redirectTo("/");
    }

    public function helpAction()
    {
        $this->auth();
        
        $this->view->generate('PagesView.php', $this->model->getDataWithPage('help'));
    }

    public function nfoundAction()
    {
        $this->view->generate('PagesView.php', $this->model->getDataWithPage('404'), "LogOutTemplateView.php");
    }
}