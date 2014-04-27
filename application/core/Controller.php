<?php

class Controller 
{
    public $model;
    public $view;
    
    public function __construct()
    {
        $this->view = new View();
    }
    
    public function indexAction() {}

    public function auth()
    {
        if (!$this->model->isAuth()) {
            $this->redirectTo("/auth/");
        }
    }

    public function redirectTo($location)
    {
        header("Location: " . $location);
        exit();
    }
}