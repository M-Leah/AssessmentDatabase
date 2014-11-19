<?php
/*
* Final Year Project - Assessment Database
* @author Michael Leah
*/
class Home extends Controller
{
    public function index($param = '', $param2 = '')
    {
        $user = $this->model('User');
        $user->name = $param;
        $user->age = $param2;

        $this->view('home/index', [
            'name' => $user->name,
            'age' => $user->age
        ]);
             
    }
    
    
    
}