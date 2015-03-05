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

            $error = '';
            $identifiers = $this->model('Assessment')->getIdentifiersByTeacherAndClass(Session::get('username'), $class);


            $convert = new Convert();
            // Conditional Statement prevents error when Post Data is not submitted.
            if ($selectedIdentifiers = $convert->reportPostToArray($_POST)) {
                $details = $this->model('Assessment')->getAssessmentDetailsByIdentifierAndClass($selectedIdentifiers, $class);
                $distinctCriteria = $this->model('Assessment')->getDistinctCriteriaByIdentifiers($selectedIdentifiers, $class);

                $count = 0;
                foreach($selectedIdentifiers as $identifiers) {
                    $count++;
                }

                // Store the require variables in a session so it is accessible across the various reports.
                Session::set('details', $details);
                Session::set('criteria', $distinctCriteria);

                switch($_POST['options']) {
                    case 0:
                        header('Location: /AssessmentDatabase/public/ReportManagement/Levels/' . $class);
                        die();
                        break;
                    case 1:
                        if ($count > 1) {
                            $error = 'You may only select one identifier for a Visual Report';
                            break;
                        }
                        else {
                            header('Location: /AssessmentDatabase/public/ReportManagement/VisualAssessment/' . $class);
                            die();
                            break;
                        }
                    case 2:
                        header('Location: /AssessmentDatabase/public/ReportManagement/AssessmentStrength/' . $class);
                        die();
                        break;
                    case 3:
                        header('Location: /AssessmentDatabase/public/ReportManagement/StudentStrength/' . $class);
                        die();
                        break;
                    default:
                        $error = 'No Report option Selected';
                        break;
                }

            }

            $this->view('reportmanagement/report', [
                'className' => htmlentities($class),
                'identifiers' => $identifiers,
                'error' => $error
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
            'levels' => $levels,
            'class' => $class
        ]);
    }

    public function visualAssessment($class = '')
    {
        Session::startSession();
        Session::handleLogin();

        $details = Session::get('details');
        $criteria = Session::get('criteria');

        // Get UnitName and Overall Unit comment from the Details
        foreach($details as $identifier) {
            foreach($identifier as $array) {
                $overall = $this->model('Assessment')->getStudentOverallComments(Session::get('username'), $array['identifier']);
                $unitDetails = $this->model('Unit')->getUnitNameByID($array['unit_id']);
                break 2;
            }
        }

        // Get Names Array from the Details
        $temp = [];
        foreach($details as $identifier) {
            foreach($identifier as $array) {
                $temp[] = $array['student_name'];
            }
        }

        // Remap the Keys
        $temp = array_unique($temp);
        $studentNames = [];
        foreach ($temp as $student) {
            $studentNames[] = $student;
        }

        // Get National Level
        $convert = new Convert();
        $students = $this->model('TeacherClass')->getStudents($class, Session::get('username'));

        $numeric = $convert->toNumericValue($details, $students);
        $maximumScore = $convert->toMaximumScore($criteria);
        $percentage = $convert->numericToPercentage($numeric, $maximumScore);
        $levels = $convert->toLevel($percentage);

        $this->view('reportmanagement/visual', [
            'detailsArray' => $details,
            'unitDetails' => $unitDetails,
            'studentNames' => $studentNames,
            'class' => $class,
            'overall' => $overall,
            'levels' => $levels
        ]);
    }


    public function studentStrength($class = '')
    {
        Session::startSession();
        Session::handleLogin();

        $details = Session::get('details');
        $criteria = Session::get('criteria');

        $convert = new Convert();
        $students = $this->model('TeacherClass')->getStudents($class, Session::get('username'));

        $numeric = $convert->toNumericValue($details, $students);
        $strongest = $convert->returnStrongest($numeric);
        $weakest = $convert->returnWeakest($numeric);

        // Get assessment details for the strongest student(s)
        foreach($strongest as $student) {
            $strongestDetails[] = $this->model('Assessment')->getStudentAssessmentDetailsByNameAndClass($student['student_name'], Session::get('username'), $class);
        }

        // Get assessment details for the weakest student(s)
        foreach($weakest as $student) {
            $weakestDetails[] = $this->model('Assessment')->getStudentAssessmentDetailsByNameAndClass($student['student_name'], Session::get('username'), $class);
        }

        $this->view('reportmanagement/studentstrength', [
            'strongest' => $strongest,
            'strongestDetails' => $strongestDetails,
            'weakest' => $weakest,
            'weakestDetails' => $weakestDetails,
            'class' => $class
        ]);
    }

    public function assessmentStrength($class = '')
    {

        Session::startSession();
        Session::handleLogin();

        // Store a list of chosen strands for later use
        $strands = Session::get('criteria');

        // Store the Assessment details for the chosen strands
        $assessmentDetails = Session::get('details');

        $convert = new Convert();

        $maxScore = $convert->getMaximumAssessmentGroupScores($assessmentDetails);
        $assessmentScoresTotal = $convert->toAssessmentGroupScoresTotal($assessmentDetails);
        $percentageScores = $convert->scoresToPercentage($assessmentScoresTotal, $maxScore);

        // Get the Weakest and Strongest Unit from Percentage Scores
        $strongestAssessment = $convert->getStrongestUnit($percentageScores);
        $weakestAssessment = $convert->getWeakestUnit($percentageScores);

        $strongestDetails = $this->model('Assessment')->getAssessmentGroupDetails(Session::get('username'), $strongestAssessment['identifier']);
        $weakestDetails = $this->model('Assessment')->getAssessmentGroupDetails(Session::get('username'), $weakestAssessment['identifier']);

        $this->view('reportmanagement/assessmentstrength', [
            'percentageScores' => $percentageScores,
            'strongestAssessment' => $strongestAssessment,
            'strongestDetails' => $strongestDetails,
            'weakestAssessment' => $weakestAssessment,
            'weakestDetails' => $weakestDetails
        ]);
    }


}