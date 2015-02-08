<?php
/**
 * Final Year Project: Assessment Database
 * Created by: Michael Leah (L1048345)
 * Created on: 08/02/2015
 */

class Assessment
{
    /**
     * Links all the criteria strands to the students in preparation for marking
     * @param $studentName
     * @param $unitID
     * @param $strandID
     * @param $identifier
     * @return bool
     */
    public function createAssessmentGroup($studentName, $unitID, $strandID, $identifier, $teacherName)
    {
        $db = Database::getInstance();

        $statement = $db->prepare("INSERT INTO assessment (student_name, unit_id, strand_id, identifier, teacher_name) VALUES(:studentName, :unitID, :strandID, :identifier, :teacherName);");
        $statement->bindParam(':studentName', $studentName);
        $statement->bindParam(':unitID', $unitID);
        $statement->bindParam(':strandID', $strandID);
        $statement->bindParam(':identifier', $identifier);
        $statement->bindParam(':teacherName', $teacherName);

        if ($statement->execute()) {
            return true;
        }

        return false;
    }

    /**
     * Returns all the identifiers used to recognise assessments
     * @param $teacherName
     * @return array|bool
     */
    public function getIdentifiersByTeacher($teacherName)
    {
        $db = Database::getInstance();

        $statement = $db->prepare("SELECT DISTINCT(identifier), unit_id FROM assessment WHERE teacher_name = :teacherName;");
        $statement->bindParam(':teacherName', $teacherName);
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (sizeof($result) > 0) {
            return $result;
        }

        return false;
    }

}