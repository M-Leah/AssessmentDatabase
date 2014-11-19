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
        $this->view('login/index', []);
    }
}