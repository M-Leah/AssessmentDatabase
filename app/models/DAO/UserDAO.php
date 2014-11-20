<?php
/**
 * Final Year Project: Assessment Database
 * Created by: Michael Leah (L1048345)
 * Created on: 20/11/2014
 */

require '../app/models/User.php';
require '../app/core/Database.php';

class UserDAO {

    /**
     * Return a user object from the database if they exist
     * @param $id
     * @return null|User
     */
    public static function get($id){

        $db = Database::getInstance();

        $statement = $db->prepare("SELECT * FROM User WHERE ID = :id");
        $statement->bindParam(":id", $id);

        $statement->execute();

        $result = $statement->fetchAll();

        if(sizeof($result) > 0)
        {
            return User::fromDatabase($result[0]);
        }

        return null;
    }

}