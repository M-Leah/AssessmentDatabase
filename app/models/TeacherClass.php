<?php
/**
 * Final Year Project: Assessment Database
 * Created by: Michael Leah (L1048345)
 * Created on: 15/12/2014
 */
require '../app/core/Database.php';

class TeacherClass {
    protected $class_id;
    protected $class_name;
    protected $teacher_name;

    public function createClass($className, $teacherName, $fileLocation)
    {
        // Create Class in DB
        $db = Database::getInstance();
        $statement = $db->prepare("INSERT INTO teacherclass (class_name, teacher_name) VALUES (:class_name, :teacher_name);");
        $statement->bindParam(':class_name', $className);
        $statement->bindParam(':teacher_name', $teacherName);
        if ($statement->execute())
        {
            self::insertStudentCSV($fileLocation);
        }
    }

    /**
     * @param $fileLocation
     */
    public function insertStudentCSV($fileLocation)
    {
        $db = Database::getInstance();
        $statement = $db->prepare("INSERT INTO student (student_name, class_name) VALUES (:student_name, :class_name);");

        $handle = fopen($fileLocation, 'r');
        while ($data = fgetcsv($handle))
        {
            $statement->bindParam(':student_name', $data[0]);
            $statement->bindParam(':class_name', $data[1]);
            $statement->execute();
        }
    }

    public function getClasses($teacherName)
    {
        $db = Database::getInstance();
        $statement = $db->prepare("SELECT * FROM teacherclass WHERE teacher_name = :teacher_name;");
        $statement->bindParam(':teacher_name', $teacherName);
        $statement->execute();

        $result = $statement->fetchAll();
        if (sizeof($result) > 0)
        {
            // Classes found
            return $result;
        }

        return false;
    }

    public function deleteClass($className)
    {
        $db = Database::getInstance();
        $statement = $db->prepare("DELETE FROM student WHERE class_name = :class_name;");
        $statement->bindParam(':class_name', $className);
        if ($statement->execute())
        {
            $statement = $db->prepare("DELETE FROM teacherclass WHERE class_name = :class_name;");
            $statement->bindParam(':class_name', $className);
            if ($statement->execute())
            {
                return true;
            }
        }

        return false;

    }

}