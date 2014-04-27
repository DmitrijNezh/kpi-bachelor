<?php

class Route
{
    public static function start()
    {
        $controllerName = 'Main';
        $actionName = 'index';
        
        $routes = explode('/', $_SERVER['REQUEST_URI']);

        if (!empty($routes[1])) {
            $controllerName = $routes[1];
        }

        if ( !empty($routes[2]) ) {
            $actionName = $routes[2];
        }

        $modelName = ucfirst($controllerName). 'Model';
        $controllerName = ucfirst($controllerName) . 'Controller';
        $actionName = strtolower($actionName) . 'Action';

        $modelFile = $modelName.'.php';
        $modelPath = "application/models/".$modelFile;
        if (file_exists($modelPath)) {
            include "application/models/".$modelFile;
        }
        else {
            include "application/models/BaseModel.php";
        }

        $controllerFile = $controllerName.'.php';
        $controllerPath = "application/controllers/".$controllerFile;
        if(file_exists($controllerPath)) {
            include "application/controllers/".$controllerFile;
        }
        else {
            Route::ErrorPage404();
        }

        $controller = new $controllerName;
        $action = $actionName;
        
        if (method_exists($controller, $action)) {
            $controller->$action();
        }
        else {
            Route::ErrorPage404();
        }
    }
    
    function ErrorPage404()
    {
        header("Location: /pages/nfound"); 
        exit();
    }
}