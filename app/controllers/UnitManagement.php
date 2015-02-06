<?php
/**
 * Final Year Project: Assessment Database
 * Created by: Michael Leah (L1048345)
 * Created on: 05/02/2015
 */

class UnitManagement extends Controller
{

    public function index()
    {
        Session::startSession();
        Session::handleLogin();

        $model = $this->model('Assessment');
        $units = $model->getUnits(Session::get('username'));

        if (isset($_POST['unitName']) && !empty($_POST['unitName'])) {
            $unitName = $_POST['unitName'];
            $model->createUnits($unitName, Session::get('username'));
            header('Location: /AssessmentDatabase/public/unitmanagement/index/');
        }



        $this->view('unitmanagement/index', [
            'units' => $units
        ]);
    }


    public function deleteUnit($param = '')
    {
        Session::startSession();
        Session::handleLogin();

        $unitID = $param;


        $model = $this->model('Assessment');
        if ($model->deleteUnit($unitID, Session::get('username')))
        {
            header('Location: /AssessmentDatabase/public/UnitManagement/');
            die();
        }

        $this->view('unitmanagement/delete', [
            'unit' => $unitID
        ]);
    }


    public function edit($param = '')
    {
        Session::startSession();
        Session::handleLogin();

        $model = $this->model('Assessment');
        $unitID = $param;

        $unitName = $model->getUnitByID($unitID);
        $criteria = $model->getCriteria($unitID);
        $strand = [];

        foreach ($criteria as $element) {
            array_push($strand, $model->getStrandByID($element['strand_id']));
        }

        $allRelatedStrands = [];
        if (isset($_POST['strands']) && !empty($_POST['strands']))
        {
            $strandReference = $_POST['strands'];
            switch ($strandReference) {
                case 0:
                    break;
                case 1:
                    $reference = 'CS';
                    $allRelatedStrands = $model->getStrandByReference($reference);
                    $nonDuplicateStrands = $model->handleDuplicateStrands($strand, $allRelatedStrands);
                    break;
                case 2:
                    $reference = 'IT';
                    $allRelatedStrands = $model->getStrandByReference($reference);
                    $nonDuplicateStrands = $model->handleDuplicateStrands($strand, $allRelatedStrands);
                    break;
                case 3:
                    $reference = 'DL';
                    $allRelatedStrands = $model->getStrandByReference($reference);
                    $nonDuplicateStrands = $model->handleDuplicateStrands($strand, $allRelatedStrands);
                    break;
                default:
                    break;
            }
        }




        $this->view('unitmanagement/edit', [
            'criteria' => $criteria,
            'unitName' => $unitName,
            'strandDetails' => $strand,
            'strandReference' => $nonDuplicateStrands,
        ]);
    }


}