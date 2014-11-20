<?php
/**
 * Final Year Project: Assessment Database
 * Created by: Michael Leah (L1048345)
 * Created on: 19/11/2014
 */

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
     * Getters/Setters for the User Class
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