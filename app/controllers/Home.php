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
        $user = $model->get(1);

        $id = $user->getId();
        $name =  $user->getUsername();
        $password = $user->getPassword();
        $email = $user->getEmail();



        $this->view('home/index', [
            'id' => $id,
            'name' => $name,
            'password' => $password,
            'email' => $email


        ]);

    }



}