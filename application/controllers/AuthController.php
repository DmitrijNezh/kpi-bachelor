<?php

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new AuthModel();
    }

    public function indexAction()
    {
        if ($this->model->isAuth()) {
            $this->redirectTo("/");
        }

        if (!empty($_POST['login']) && !empty($_POST['pass'])) {

            if ($this->model->login($_POST['login'], $_POST['pass'])) {
                $this->redirectTo("/");
            }
        }

        $this->view->generate("LoginView.php", $this->model->getData(), "LogOutTemplateView.php");
    }

    public function logoutAction()
    {
        $this->model->logout();
        $this->redirectTo("/auth/");
    }
}