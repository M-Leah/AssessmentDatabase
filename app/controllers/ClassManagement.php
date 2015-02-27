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

                header('Location: /AssessmentDatabase/public/ClassManagement/');


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

    public function assess($param = '')
    {
        Session::startSession();
        Session::handleLogin();

        $className = $param;
        $error = '';

        $model = $this->model('Assessment');
        $unitModel = $this->model('Unit');
        $classModel = $this->model('TeacherClass');

        $units = $unitModel->getUnitsWithCriteria(Session::get('username'));

        if (isset($_POST['identifier']) && isset($_POST['unit'])) {
            if (!empty($_POST['identifier']) && !empty($_POST['unit'])) {
                $identifier = $_POST['identifier'];

                if ($model->handleDuplicateIdentifiers(Session::get('username'), $identifier) === false) {
                    $unitID = $_POST['unit'];

                    // get all students in class
                    $students = $classModel->getStudents($className, Session::get('username'));

                    // get all unit strands
                    $strands = $unitModel->getCriteria($unitID);

                    foreach ($students as $student) {
                        // For each student insert into the model.
                        foreach ($strands as $strand) {
                            // Links students to the criteria they will be marked against.
                            $model->createAssessmentGroup($student['student_name'], $unitID, $strand['strand_id'], $identifier, Session::get('username'), $className);
                        }
                        $model->createUnitComments($student['student_name'], $unitID, $identifier, Session::get('username'), $className);
                    }
                }

                $error = 'You have used that identifier for another class, please create a UNIQUE identifier';
            }
        }

        $assessments = $model->getIdentifiersByTeacherAndClass(Session::get('username'), $className) ? : $assessments = '';

        $this->view('classmanagement/assess', [
            'className' => $className,
            'units' => $units,
            'assessments' => $assessments,
            'error' => $error
        ]);

    }

    public function mark($paramOne = '', $paramTwo = '', $paramThree = '')
    {
        Session::startSession();
        Session::handleLogin();

        $className = $paramOne;
        $identifier = $paramTwo;

        $unitModel = $this->model('Unit');
        $assessmentModel = $this->model('Assessment');

        if (!empty($paramThree)) {

            $studentName = $paramThree;
            $studentDetails = $assessmentModel->getStudentAssessmentDetails($studentName, Session::get('username'), $identifier);

            $strandArray = [];
            foreach ($studentDetails as $detail) {
                $strandArray[] = $unitModel->getStrandByID($detail['strand_id']);
            }

            if (isset($_POST) && !empty($_POST)) {

                $count = 0;
                foreach ($studentDetails as $detail) {

                    $commentName = 'comment_' . $count;
                    $lightCode = $_POST[$detail['assessment_id']];
                    $comment = $_POST[$commentName];
                    $count++;

                    switch ($lightCode) {
                        case 0:
                            // Do nothing
                            break;
                        case 1:
                            // Red
                            $assessmentModel->updateStudentAssessment('Red', $comment, $detail['assessment_id']);
                            $flag = true;
                            break;
                        case 2:
                            // Amber
                            $assessmentModel->updateStudentAssessment('Amber', $comment, $detail['assessment_id']);
                            $flag = true;
                            break;
                        case 3:
                            // Green
                            $assessmentModel->updateStudentAssessment('Green', $comment, $detail['assessment_id']);
                            $flag = true;
                            break;
                        default:
                            // Do nothing
                            break;
                    }
                }

                if ($flag === true) {
                    header('Location: /AssessmentDatabase/public/ClassManagement/Mark/' . $className . '/' . $identifier);
                    $flag = false;
                }
            }

            $this->view('classmanagement/markStudent', [
               'className' => $className,
               'identifier' => $identifier,
               'studentName' => $studentName,
               'studentDetails' => $studentDetails,
               'strandArray' => $strandArray
           ]);

        } else {

            $classModel = $this->model('TeacherClass');
            $overallComments = $assessmentModel->getStudentOverallComments(Session::get('username'), $identifier);

            if (isset($_POST) && !empty($_POST)) {
                $count = 0;
                foreach ($overallComments as $student) {
                    $assessmentModel->updateStudentOverallComments($_POST[$count], $student['id']);
                    $count++;
                }
                header('Location: /AssessmentDatabase/public/ClassManagement/Mark/' . $className . '/' . $identifier);
            }


            $students = $classModel->getStudents($className, Session::get('username'));
            $unitName = $unitModel->getUnitByIdentifier(Session::get('username'), $identifier);

            $this->view('classmanagement/mark', [
                'className' => $className,
                'identifier' => $identifier,
                'students' => $students,
                'unitName' => $unitName,
                'comments' => $overallComments
            ]);
        }


    }

    public function deleteAssessment($paramOne = '', $paramTwo = '')
    {
        Session::startSession();
        Session::handleLogin();

        $className = $paramOne;
        $identifier = $paramTwo;


        $model = $this->model('Assessment');

        if ($model->deleteAssessmentGroup($identifier, Session::get('username'))) {
            header('Location: /AssessmentDatabase/public/classmanagement/assess/' . $className);
            die();
        }

        $this->view('classmanagement/delete', [
            'error' => 'Could not delete assessment group, please try again'
        ]);

    }

}