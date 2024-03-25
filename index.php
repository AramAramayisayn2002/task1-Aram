<?php
require_once('configs/config.php');
require_once('libraries/Controller.php');
require_once('libraries/Database.php');
session_start();
class Route
{
    private $controller = 'userController';
    private $method = 'index';
    public function __construct()
    {
        $url = $this->getUrlWords();
        if (isset($url[0]) && $url[0] != '') {
            $this->controller = ucfirst($url[0]) . 'Controller';
            if (isset($url[1]) && $url[1] != '') {
                $this->method = $url[1];
            }
        }
        $dir = 'controllers/';
        require $dir . $this -> controller . '.php';
        $this->controller = new $this->controller;
        call_user_func([$this->controller, $this->method]);
    }
    public function getUrlWords()
    {
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('/', $url);
        unset($url[0]);
        unset($url[1]);
        unset($url[2]);
        $url = array_values($url);
        return $url;
    }
}
$url = new Route();