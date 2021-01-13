<?php

namespace application\core;

class Router
{
    protected $routes = [];
    protected $params = [];
    function __construct()
    {
        $arr = require 'application/config/routes.php';
        foreach ($arr as $key => $value) {
            $this->add($key, $value);
        }
    }
    //adding route to routes array 
    public function add($route, $params)
    {
        $route = '#^' . $route . '$#'; #Turnig $route into RegEx   (Prepering for preg_match)
        $this->routes[$route] = $params;
    }
    //Check if the current url exists in routes if true add controller and action to params
    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/'); #current url whitout '/'  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $url = str_replace('SafeRideStore', '', $url);
        $url = trim($url, '/');

        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params; #current params to class params 
                $this->loadParams($url);
                return true;
            }
        }
        return false;
    }

    public function run()
    {
        if ($this->match()) {
            $path = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($path)) {
                $action = $this->params['action'] . 'Action';
                if (method_exists($path, $action)) { #check if method Action exists in this controller
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
          View::errorCode(404);
        }
    }
    //load parameter to params array if parameters passed in url
    private function loadParams($url)
    {
        //check if there is prameters passed in url 
        if (isset($this->params['id'])) {
            $segments = explode('/', $url);
            $this->params['id'] = array_pop($segments);
            if (isset($this->params['amount']))
                $this->params['amount'] = array_pop($segments);
            if (isset($this->params['size']))
                $this->params['size'] = array_pop($segments);
            if (isset($this->params['color']))
                $this->params['color'] = array_pop($segments);
        }
    }
}
