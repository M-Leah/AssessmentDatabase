<?php
/**
 * Final Year Project: Assessment Database
 * Created by: Michael Leah (L1048345)
 * Created on: 17/02/2015
 */

class ReportManagement extends Controller
{
    public function index($class = '')
    {
        Session::startSession();
        Session::handleLogin();

        if (isset($class) && !empty($class)) {

            $identifiers = $this->model('Assessment')->getIdentifiersByTeacherAndClass(Session::get('username'), $class);


            $convert = new Convert();
            // Conditional Statement prevents error when Post Data is not submitted.
            if ($selectedIdentifiers = $convert->reportPostToArray($_POST)) {
                $details = $this->model('Assessment')->getAssessmentDetailsByIdentifierAndClass($selectedIdentifiers, $class);


            }

            $this->view('reportmanagement/report', [
                'className' => htmlentities($class),
                'identifiers' => $identifiers
            ]);
        }
        else {
            $classes = $this->model('TeacherClass')->getClasses(Session::get('username'));

            $this->view('reportmanagement/index', [
                'classes' => $classes
            ]);
        }
    }

    /* Below Code is not in use.
    // Not in use at present
    public function report()
    {
        Session::startSession();
        Session::handleLogin();

        $classes = $this->model('TeacherClass')->getClasses(Session::get('username'));

        $identifiers = $this->model('Assessment')->getIdentifiersByTeacher(Session::get('username'));

        if (isset($_POST['class']) && isset($_POST['report']) &&!empty($_POST['class']) && !empty($_POST['report'])) {
            switch($_POST['report']) {
                case 1:
                    header('Location: /AssessmentDatabase/public/reportmanagement/Levels/' . $_POST['class']);
                    break;
                case 2:
                    header('Location: /AssessmentDatabase/public/ReportManagement/StudentStrength/' . $_POST['class']);
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

        $this->view('reportmanagement/report', [
            'classes' => $classes,
            'identifiers' => $identifiers
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

    public function studentStrength($param = '')
    {
        Session::startSession();
        Session::handleLogin();

        $className = $param;

        $classModel = $this->model('TeacherClass');
        $assessmentModel = $this->model('Assessment');

        $students = $classModel->getStudents($className, Session::get('username'));
        $assessmentDetails = $assessmentModel->getAssessmentDetailsByClass($className, Session::get('username'));

        $converter = new Convert();
        $scores = $converter->toNumericValue($assessmentDetails, $students);

        $strongestStudent = $converter->returnStrongest($scores);
        $weakestStudent = $converter->returnWeakest($scores);

        foreach ($strongestStudent as $student) {
            $strongestStudentsArray[] = $assessmentModel->getStudentAssessmentDetailsByName($student['student_name'], Session::get('username'));
        }

        foreach ($weakestStudent as $student) {
            $weakestStudentsArray[] = $assessmentModel->getStudentAssessmentDetailsByName($student['student_name'], Session::get('username'));
        }


        $this->view('reportmanagement/studentstrength', [
            'strongestStudents' => $strongestStudent,
            'strongestStudentsDetails' => $strongestStudentsArray,
            'weakestStudents' => $weakestStudent,
            'weakestStudentsDetails' => $weakestStudentsArray
        ]);
    }

    */
}