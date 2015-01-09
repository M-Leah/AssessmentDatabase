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
            self::insertStudentCSV($fileLocation, $teacherName);
        }
    }

    /**
     * @param $fileLocation
     */
    public function insertStudentCSV($fileLocation, $user)
    {
        $db = Database::getInstance();
        $statement = $db->prepare("INSERT INTO student (student_name, class_name, teacher_name) VALUES (:student_name, :class_name, :teacher_name);");

        $handle = fopen($fileLocation, 'r');
        while ($data = fgetcsv($handle))
        {
            if ($data[0] == 'student_name') {
                unset($data[0]);
            }
            elseif ($data[1] == 'class_name') {
                unset($data[1]);
            }
            else
            {
                $statement->bindParam(':student_name', $data[0]);
                $statement->bindParam(':class_name', $data[1]);
                $statement->bindParam(':teacher_name', $user);
                $statement->execute();
            }

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

    public function deleteClass($className, $teacherName)
    {
        $db = Database::getInstance();
        $statement = $db->prepare("DELETE FROM student WHERE class_name = :class_name AND teacher_name = :teacher_name;");
        $statement->bindParam(':class_name', $className);
        $statement->bindParam(':teacher_name', $teacherName);
        if ($statement->execute())
        {
            $statement = $db->prepare("DELETE FROM teacherclass WHERE class_name = :class_name AND teacher_name = :teacher_name;");
            $statement->bindParam(':class_name', $className);
            $statement->bindParam(':teacher_name', $teacherName);
            if ($statement->execute())
            {
                return true;
            }
        }

        return false;

    }

}