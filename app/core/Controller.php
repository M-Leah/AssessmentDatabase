<?php
/*
* Final Year Project - Assessment Database
* @author Michael Leah
*/

require 'Session.php';

class Controller {

    protected function model($model)
    {
        // REQUIRES FILE CHECK
        require_once '../app/models/' . $model . '.php';
        return new $model();
    }
    
    public function view($view, $data = [])
    {
        // REQUIRES FILE CHECK
        require_once '../app/views/' . $view . '.php';
    }
}

