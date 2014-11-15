<?php
/*
* Final Year Project - Assessment Database
* @author Michael Leah
*/
class Home extends Controller
{
    public function index()
    {
       $Teacher = $this->model('Teacher');
       $this->view('home/index', []);
       
       $teacher = TeacherDAO::getID(1);
    }
    
    
    
}