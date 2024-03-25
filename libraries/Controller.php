<?php
class Controller
{
    protected function viewRender($view, $data = null)
    {
        require('views/' . $view     . '.php');
    }
    protected function modelRender($modelName) {
        require_once ('models/'.ucfirst($modelName).'.php');
        return $model = new $modelName;
    }
}
