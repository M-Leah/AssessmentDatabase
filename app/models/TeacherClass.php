<?php
/**
 * Final Year Project: Assessment Database
 * Created by: Michael Leah (L1048345)
 * Created on: 15/12/2014
 */

class TeacherClass {
    protected $class_id;
    protected $class_name;
    protected $teacher_name;

    /**
     * @param $className
     * @param $teacherName
     * @param $fileLocation
     */
    public function createClass($className, $teacherName, $fileLocation)
    {
        // Create Class in DB
        $db = Database::getInstance();
        $statement = $db->prepare("INSERT INTO teacherclass (class_name, teacher_name) VALUES (:class_name, :teacher_name);");
        $statement->bindParam(':class_name', $className);
        $statement->bindParam(':teacher_name', $teacherName);
        if ($statement->execute())
        {
            self::insertStudentCSV($fileLocation, $teacherName, $className);
        }
    }

    /**
     * @param $fileLocation
     */
    public function insertStudentCSV($fileLocation, $user, $className)
    {
        $db = Database::getInstance();
        $statement = $db->prepare("INSERT INTO student (student_name, class_name, teacher_name) VALUES (:student_name, :class_name, :teacher_name);");

        $handle = fopen($fileLocation, 'r');
        while ($data = fgetcsv($handle))
        {
            if ($data[0] == 'student_name') {
                unset($data[0]);
            }
            else
            {
                $statement->bindParam(':student_name', $data[0]);
                $statement->bindParam(':class_name', $className);
                $statement->bindParam(':teacher_name', $user);
                $statement->execute();
            }

        }
    }

    /**
     * @param $teacherName
     * @return array|bool
     */
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

    /**
     * @param $className
     * @param $teacherName
     * @return bool
     */
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
                $statement = $db->prepare("DELETE FROM assessment WHERE class_name = :class_name AND teacher_name = :teacher_name;");
                $statement->bindParam(':class_name', $className);
                $statement->bindParam(':teacher_name', $teacherName);
                if ($statement->execute())
                {
                    return true;
                }

                return false;
            }
        }

        return false;

    }

    /**
     * @param $className
     * @param $teacherName
     * @return array|bool
     */
    public function getStudents($className, $teacherName)
    {
        $db = Database::getInstance();

        $statement = $db->prepare("SELECT * FROM student WHERE class_name = :class_name AND teacher_name = :teacher_name;");
        $statement->bindParam(':class_name', $className);
        $statement->bindParam(':teacher_name', $teacherName);
        $statement->execute();

        $results = $statement->fetchAll();
        if (sizeof($results) > 0)
        {
            return $results;
        }

        return false;
    }

    /**
     * Edit the student name, utilising the teacher name to prevent edit affecting classes the teacher does not control.
     * @param $studentID
     * @param $newName
     * @param $teacherName
     * @return bool
     */
    public function editStudentName($studentID, $newName, $teacherName)
    {
        $db = Database::getInstance();

        $statement = $db->prepare("UPDATE student SET student_name = :studentName WHERE student_id = :studentID
                                    AND teacher_name = :teacherName;");
        $statement->bindParam(':studentName', $newName);
        $statement->bindParam(':studentID', $studentID);
        $statement->bindParam(':teacherName', $teacherName);

        if ($statement->execute()) {
            return true;
        }

        return false;
    }

    /**
     * Deletes a student from the database, utilises the teacher name to prevent a teacher deleting other instances
     * of the student from other classes.
     * @param $studentID
     * @param $teacherName
     * @return bool
     */
    public function deleteStudent($studentID, $teacherName)
    {
        $db = Database::getInstance();

        $statement = $db->prepare("DELETE FROM student WHERE student_id = :studentID
                                    AND teacher_name = :teacherName;");
        $statement->bindParam(':studentID', $studentID);
        $statement->bindParam(':teacherName', $teacherName);

        if ($statement->execute()) {
            return true;
        }

        return false;
    }

    /**
     * Inserts a student record into the database
     * @param $studentName
     * @param $class
     * @param $teacherName
     * @return bool
     */
    public function addStudent($studentName, $class, $teacherName)
    {
        $db = Database::getInstance();

        $statement = $db->prepare("INSERT INTO student (student_name, class_name, teacher_name)
                                    VALUES (:studentName, :className, :teacherName);");
        $statement->bindParam(':studentName', $studentName);
        $statement->bindParam(':className', $class);
        $statement->bindParam(':teacherName', $teacherName);

        if ($statement->execute()) {
            return true;
        }

        return false;
    }

}