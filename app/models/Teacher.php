<?php
/*
 * Final Year Project - Assessment Database
 * @author Michael Leah
 */

class Teacher {
    
    protected $id;
    protected $teacherName;
    protected $password;
    protected $email;
    
    // Creates a new user from the database row.
    public static function fromDatabase($row) 
    {
        $teacherInstance = new Teacher();
        
        $teacherInstance->setId($row['ID']);
        $teacherInstance->setTeacherName($row['TEACHER_NAME']);
        $teacherInstance->setPassword($row['PASSWORD']);
        $teacherInstance->setEmail($row['EMAIL']);
        
        return $userInstance;
    }
    
    
    // Setters and Getters for the Teacher Class
    public function setId($id) {
        $this->id = $id;
    }
    
    public function setTeacherName($teacher) {
        $this->teacher = $teacher;
    }
    
    public function setEmail($email) {
        $this->email = $email;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function getTeacherName()
    {
        return $this->teacher;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
    
    public function getPassword()
    {
        return $this->password;
    }
    
}
