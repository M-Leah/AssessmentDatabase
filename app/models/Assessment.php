<?php
/**
 * Final Year Project: Assessment Database
 * Created by: Michael Leah (L1048345)
 * Created on: 05/02/2015
 */

class Assessment
{

    /**
     * Method to return all a teachers' created units
     * @param $teacherName
     * @return array|bool
     */
    public function getUnits($teacherName)
    {
        $db = Database::getInstance();

        $statement = $db->prepare("SELECT * FROM Unit WHERE teacher_name = :teacher_name;");
        $statement->bindParam(':teacher_name', $teacherName);
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (sizeof($result) > 0) {
            return $result;
        }

        return false;

    }

    /**
     * Method for inserting new units into the database
     * @param $unitName
     * @param $teacherName
     * @return bool
     */
    public function createUnits($unitName, $teacherName)
    {
        $db = Database::getInstance();

        $statement = $db->prepare("INSERT INTO unit (unit_name, teacher_name) VALUES (:unitName, :teacherName);");
        $statement->bindParam(':unitName', $unitName);
        $statement->bindParam(':teacherName', $teacherName);

        if ($statement->execute()) {
            return true;
        }

        return false;
    }

    /**
     * Method for deleting a unit record from the database
     * @param $unitName
     * @param $teacherName
     * @return bool
     */
    public function deleteUnit($unitID, $teacherName)
    {
        $db = Database::getInstance();

        $statement = $db->prepare("DELETE FROM unit WHERE unit_id = :unitID AND teacher_name = :teacherName;");
        $statement->bindParam(':unitID', $unitID);
        $statement->bindParam(':teacherName', $teacherName);

        if ($statement->execute()) {
            return true;
        }

        return false;
    }

    /**
     * Method for retrieving all criteria linked to a unit from the database.
     * @param $unitID
     * @return bool
     */
    public function getCriteria($unitID)
    {
        $db = Database::getInstance();

        $statement = $db->prepare("SELECT * FROM criteria WHERE unit_id = :unitID;");
        $statement->bindParam(':unitID', $unitID);
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (sizeof($result) > 0) {
            return $result;
        }

        return false;

    }

    /**
     * Returns the Unit details in array form from the ID
     * @param $unitID
     * @return array|bool
     */
    public function getUnitByID($unitID)
    {
        $db = Database::getInstance();

        $statement = $db->prepare("SELECT * FROM unit WHERE unit_id = :unitID;");
        $statement->bindParam(':unitID', $unitID);
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (sizeof($result) > 0) {
            return $result;
        }

        return false;
    }


    /**
     * @param $strandID
     * @return bool
     */
    public function getStrandByID($strandID)
    {
        $db = Database::getInstance();

        $statement = $db->prepare("SELECT * FROM strand WHERE strand_id = :strandID;");
        $statement->bindParam(':strandID', $strandID);
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (sizeof($result) > 0) {
            return $result;
        }

        return false;
    }


}