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
                $distinctCriteria = $this->model('Assessment')->getDistinctCriteriaByIdentifiers($selectedIdentifiers, $class);


                // Store the require variables in a session so it is accessible across the various reports.
                Session::set('details', $details);
                Session::set('criteria', $distinctCriteria);

                switch($_POST['options']) {
                    case 0:
                        header('Location: /AssessmentDatabase/public/ReportManagement/Levels/' . $class);
                        break;
                    case 1:
                        echo 'Not functional yet';
                        break;
                    case 2:
                        echo 'Not functional yet';
                        break;
                    case 3:
                        echo 'Not functional yet';
                        break;
                    default:
                        $error = 'No Report option Selected';
                        break;
                }

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


    public function levels($class = '')
    {
        Session::startSession();
        Session::handleLogin();

        $details = Session::get('details');
        $criteria = Session::get('criteria');

        $convert = new Convert();
        $students = $this->model('TeacherClass')->getStudents($class, Session::get('username'));

        $numeric = $convert->toNumericValue($details, $students);
        $maximumScore = $convert->toMaximumScore($criteria);
        $percentage = $convert->numericToPercentage($numeric, $maximumScore);
        $levels = $convert->toLevel($percentage);


        $this->view('reportmanagement/levels', [
            'levels' => $levels
        ]);
    }


}