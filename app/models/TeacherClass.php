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

    /**
     * @param $fileLocation
     */
    public function insertClassCSV($fileLocation)
    {
        $db = Database::getInstance();
        $statement = $db->prepare("INSERT INTO teacherclass (class_name, teacher_name) VALUES (:class_name, :teacher_name);");

        $handle = fopen($fileLocation, 'r');
        while ($data = fgetcsv($handle))
        {
            $statement->bindParam(':class_name', $data[0]);
            $statement->bindParam(':teacher_name', $data[1]);
            $statement->execute();

        }
    }

    /**
     * @param $fileLocation
     */
    public function insertStudentCSV($fileLocation)
    {

    }



}