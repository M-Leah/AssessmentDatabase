<?php
/**
 * Final Year Project: Assessment Database
 * Created by: Michael Leah (L1048345)
 * Created on: 15/12/2014
 */

class ClassManagement extends Controller
{
    public function index()
    {
        Session::startSession();
        Session::handleLogin();

        $this->view('classmanagement/index', []);
    }

    public function create()
    {
        Session::startSession();
        Session::handleLogin();

        $model = $this->model('TeacherClass');

        if (isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])) {

            $fileDetails = [
                'fileName' => $_FILES['file']['name'],
                'size' => $_FILES['file']['size'],
                'type' => $_FILES['file']['type'],
                'tmp_name' => $_FILES['file']['tmp_name']
            ];

            // Check the file is a CSV.
            $fileTypes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');

            if(in_array($_FILES['file']['type'], $fileTypes)){

                $location = '../app/core/temp/';
                if (move_uploaded_file($fileDetails['tmp_name'], $location . $fileDetails['fileName']))
                {
                    /* insert the data from the CSV into the database, then delete the CSV file */
                    $model->insertClassCSV($location . $fileDetails['fileName']);
                    unlink($location . $fileDetails['fileName']);
                }


            } else {
                echo 'Not CSV File';
            }

        } else {
            echo 'No File Uploaded';
        }




        $this->view('classmanagement/create', []);
    }

    public function edit($param = '')
    {

    }

    public function delete($param = '')
    {

    }

    public function mark($param = '')
    {

    }
}