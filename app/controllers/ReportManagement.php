<?php
/**
 * Final Year Project: Assessment Database
 * Created by: Michael Leah (L1048345)
 * Created on: 17/02/2015
 */

class ReportManagement extends Controller
{
    public function index()
    {
        Session::startSession();
        Session::handleLogin();

        $classModel = $this->model('TeacherClass');
        $classes = $classModel->getClasses(Session::get('username'));

        if (isset($_POST['class']) && isset($_POST['report']) &&!empty($_POST['class']) && !empty($_POST['report'])) {
            switch($_POST['report']) {
                case 1:
                    header('Location: /AssessmentDatabase/public/reportmanagement/levels/' . $_POST['class']);
                    break;
                case 2:
                    echo 'Redirect to Two';
                    break;
                case 3:
                    echo 'Redirect to Three';
                    break;
                case 4:
                    echo 'Redirect to Four';
                    break;
                case 5:
                    echo 'Redirect to Five';
                    break;
                default:
                    // return error
                    break;
            }
        }

        $this->view('reportmanagement/index', [
            'classes' => $classes
        ]);
    }

    public function levels($param = '')
    {
        Session::startSession();
        Session::handleLogin();

        $className = $param;

        // Select all students within the chosen class, with the chosen teacher.
        // Equate their traffic lights to a score (red + 1, amber + 2, green +3)
        // Print out a list of student names, with their score next to their name
        // Have a class that converts that level number into a level (i.e. 5b = 60-69)

        $classModel = $this->model('TeacherClass');
        $assessmentModel = $this->model('Assessment');

        $students = $classModel->getStudents($className, Session::get('username'));
        $assessmentDetails = $assessmentModel->getAssessmentDetailsByClass($className, Session::get('username'));

        $converter = new Convert();
        $scores = $converter->toNumericValue($assessmentDetails, $students);
        $levels = $converter->toLevel($scores);





        $this->view('reportmanagement/levels', [
            'students' => $students,
            'scores' => $scores,
            'levels' => $levels
        ]);
    }
}