<?php

namespace application\core;

use application\core\View;

abstract class Controller
{
    public $route;
    public $view;
    public $model;
    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
        if (isset($route['model']))
            $modle = $route['model'];
        else
            $modle = $route['controller'];
        $this->model = $this->loadModel($modle);
    }
    public function loadModel($name)
    {
        $path = 'application\models\\' . ucfirst($name) . 'Model'; # path for model of curent controller
        if (class_exists($path)) { # check if this model class exists

            return new $path;
        }
    }
}
