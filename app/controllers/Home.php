<?php
/*
* Final Year Project - Assessment Database
* @author Michael Leah
*/
class Home extends Controller
{

    public function index()
    {
        Session::startSession();

        $model = $this->model('User');
        Session::handleLogin();

        $name = $_SESSION['username'];

        $this->view('home/index', [
            'name' => $name
        ]);

    }

    public function logout()
    {
        Session::startSession();

        /* Destroys the session to log out the user */
        Session::destroy();
        header('Location: /AssessmentDatabase/public/login/');
        exit();
    }


}