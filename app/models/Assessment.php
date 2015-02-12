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
     * Method for deleting an assessment group
     * @param $identifier
     * @param $teacherName
     * @return bool
     */
    public function deleteAssessmentGroup($identifier, $teacherName)
    {
        $db = Database::getInstance();

        $statement = $db->prepare("DELETE FROM assessment WHERE identifier = :identifier AND teacher_name = :teacherName;");
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


    /**
     * Method to prevent duplicate identifiers being used in the database per teacher.
     * @param $teacherName
     * @param $identifier
     * @return bool
     */
    public function handleDuplicateIdentifiers($teacherName, $identifier)
    {
        if ($currentIdentifiers = self::getIdentifiersByTeacher($teacherName)) {
            // Identifiers exist
            foreach ($currentIdentifiers as $uniqueID)
            {
                if ($uniqueID['identifier'] == $identifier)
                {
                    // Identifier has been used previously by the teacher
                    return true;
                }
            }
        }

        // Identifier does not already exist for the teacher
        return false;

    }

    /**
     * Method for getting the contents of an assessment group in preparation for marking
     * @param $teacherName
     * @param $identifier
     * @return array|bool
     */
    public function getAssessmentGroupDetails($teacherName, $identifier)
    {
        $db = Database::getInstance();

        $statement = $db->prepare("SELECT * FROM `assessment` WHERE identifier = :identifier AND teacher_name = :teacherName;");
        $statement->bindParam(':identifier', $identifier);
        $statement->bindParam(':teacherName', $teacherName);
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (sizeof($result) > 0 ) {
            return $result;
        }

        return false;
    }

    /**
     * Method to return a singular students assessment details
     * @param $studentName
     * @param $teacherName
     * @param $identifier
     * @return array|bool
     */
    public function getStudentAssessmentDetails($studentName, $teacherName, $identifier)
    {
        // Prepare the string for a like query
        $newStudentName = '';
        $length = strlen($studentName);
        $endCount = $length - 1;

        for ($count = 0; $count < $length; $count++)
        {
            $newStudentName .= $studentName[$count];
            if ($count < $endCount) {
                $newStudentName .= '%';
            }
        }


        $db = Database::getInstance();

        $statement = $db->prepare("SELECT * FROM `assessment` WHERE student_name LIKE :studentName AND teacher_name = :teacherName AND identifier = :identifier;");
        $statement->bindParam(':studentName', $newStudentName);
        $statement->bindParam(':teacherName', $teacherName);
        $statement->bindParam(':identifier', $identifier);
        $statement->execute();

        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (sizeof($result) > 0) {
            return $result;
        }

        return false;
    }

    /**
     * Method to update the traffic light and comment in a student's assessment
     * @param $trafficLight
     * @param $comment
     * @param $assessmentID
     * @return bool
     */
    public function updateStudentAssessment($trafficLight, $comment, $assessmentID)
    {
        $db = Database::getInstance();

        $statement = $db->prepare("UPDATE assessment SET trafficlight = :trafficLight, comment = :comment WHERE assessment_id = :assessmentID;");
        $statement->bindParam(':trafficLight', $trafficLight);
        $statement->bindParam(':comment', $comment);
        $statement->bindParam(':assessmentID', $assessmentID);

        if ($statement->execute()) {
            return true;
        }

        return false;
    }

}