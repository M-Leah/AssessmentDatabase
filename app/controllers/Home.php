<?php
/*
* Final Year Project - Assessment Database
* @author Michael Leah
*/
class Home extends Controller
{
    /**
     *
     */
    public function index()
    {
        $model = $this->model('User');

        Session::handleLogin();
        echo Session::get('user_logged_in');



        $this->view('home/index', []);

    }

    public function logout()
    {
        $model = $this->model('User');
        Session::destroy();

        header('Location: /AssessmentDatabase/public/login/index');
        exit();
    }



}