<?php
/**
 * Final Year Project: Assessment Database
 * Created by: Michael Leah (L1048345)
 * Created on: 19/11/2014
 */

class Login extends Controller
{
    public function index()
    {
        if (isset($_POST['username']) && isset($_POST['password'])) {
            if (!empty($_POST['username']) && isset($_POST['password'])){
                $username = $_POST['username'];
                $password = $_POST['password'];

                echo 'Values received by Login.php! ' . $username . ' ' . $password;
            }
        }

        $this->view('login/index', []);
    }
}