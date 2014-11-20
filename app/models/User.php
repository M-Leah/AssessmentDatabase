<?php
/**
 * Final Year Project: Assessment Database
 * Created by: Michael Leah (L1048345)
 * Created on: 19/11/2014
 */

require '../app/core/Database.php';

class User {
    protected $id;
    protected $username;
    protected $password;
    protected $email;

    /**
     * Creates a user instance from a database row
     * @param $row
     * @return \User
     */
    public static function fromDatabase($row)
    {
        $userInstance = new User();

        $userInstance->setID($row['user_id']);
        $userInstance->setUsername($row['username']);
        $userInstance->setPassword($row['password']);
        $userInstance->setEmail($row['email']);

        return $userInstance;
    }




    /**
     * Return a user object from the database if they exist
     * @param $id
     * @return null|User
     */
    public static function get($id){

        $db = Database::getInstance();

        $statement = $db->prepare("SELECT * FROM User WHERE user_id = :id");
        $statement->bindParam(":id", $id);

        $statement->execute();

        $result = $statement->fetchAll();

        if(sizeof($result) > 0)
        {
            return User::fromDatabase($result[0]);
        }

        return null;
    }





    /**
     * Getters/Setters for the individual User Class aspects
     */
    public function setId($id) {
        $this->id = $id;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getEmail() {
        return $this->email;
    }

}