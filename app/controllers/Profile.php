<?php
/**
 * Final Year Project: Assessment Database
 * Created by: Michael Leah (L1048345)
 * Created on: 15/12/2014
 */

class Profile extends Controller
{
    public function index()
    {
        Session::startSession();
        $model = $this->model('User');
        Session::handleLogin();

        $this->view('profile/index', []);
    }
}