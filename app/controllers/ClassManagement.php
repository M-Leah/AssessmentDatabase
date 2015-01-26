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

        $model = $this->model('TeacherClass');

        // Output all classes for this user
       $teacherName = Session::get('username');
       $classes =  $model->getClasses($teacherName);

        $this->view('classmanagement/index', [
            'classes' => $classes
        ]);
    }

    public function create()
    {
        Session::startSession();
        Session::handleLogin();
        $error = '';

        $model = $this->model('TeacherClass');

        if (isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])
            && isset($_POST['class_name']) && !empty($_POST['class_name'])) {
            $className = $_POST['class_name'];
            $teacherName = $_SESSION['username'];

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
                    $model->createClass($className, $teacherName, $location . $fileDetails['fileName']);
                    unlink($location . $fileDetails['fileName']);
                }


            } else {
                $error =  'Not CSV File';
            }

        } else {
            $error = 'No File Uploaded';
        }




        $this->view('classmanagement/create', [
            'error' => $error
        ]);
    }

    public function delete($param = '')
    {
        Session::startSession();
        Session::handleLogin();

        $model = $this->model('TeacherClass');
        $className = $param;
        $teacherName = $_SESSION['username'];

        if ($model->deleteClass($className, $teacherName)) {
            header('Location: /AssessmentDatabase/Public/ClassManagement/');
            die();
        }

        $error = 'There was a problem deleting ' . $className . 'Please click <a href="/AssessmentDatabase/public/classmanagement">here</a> to try again';

        $this->view('classmanagement/delete', [
            'error' => $error
        ]);
    }


    public function inspect($param = '')
    {
        Session::startSession();
        Session::handleLogin();

        $model = $this->model('TeacherClass');
        $className = $param;
        $teacherName = $_SESSION['username'];
        $message = '';

        if (isset($_POST['studentName']) && !empty($_POST['studentName'])) {

            $studentName = $_POST['studentName'];

            if ($model->addStudent($studentName, $className, $teacherName)) {
                $message = 'Record Added';
            } else {
                $message = 'Failed to insert record, please try again.';
            }


        }

        $students = $model->getStudents($className, $teacherName);


        $this->view('classmanagement/inspect', [
            'students' => $students,
            'className' => $className,
            'teacherName' => $teacherName,
            'message' => $message
        ]);
    }

    public function edit($param = '')
    {
        Session::startSession();
        Session::handleLogin();

        $message = '';

        $model = $this->model('TeacherClass');

        if(isset($_POST['newName']) && !empty($_POST['newName'])) {
            $studentID = $param;
            $newName = $_POST['newName'];
            $teacherName = $_SESSION['username'];

            if ($model->editStudentName($studentID, $newName, $teacherName)) {
                $message = 'Name Updated';
            } else {
                $message = 'Name failed to update, please try again';
            }
        }



        $this->view('classmanagement/edit', [
            'message' => $message
        ]);
    }

    public function deleteStudent($param = '')
    {
        Session::startSession();
        Session::handleLogin();

        $error = '';

        $model = $this->model('TeacherClass');

        $teacherName = $_SESSION['username'];

        if ($model->deleteStudent($param, $teacherName)) {
            header('Location: /Assessmentdatabase/public/classmanagement/');
            die();
        } else {
            $error = 'Error, name was not deleted. Please try again';
        }

        $this->view('classmanagement/delete', [
            'error' => $error
        ]);

    }

}