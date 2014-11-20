<?php
/*
* Final Year Project - Assessment Database
* @author Michael Leah
*/
class Home extends Controller
{
    public function index($param = '', $param2 = '')
    {
        $user = $this->model('UserDAO')->get(1);





        $this->view('home/index', []);

    }



}