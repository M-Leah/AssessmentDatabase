<?php
/**
 * Final Year Project: Assessment Database
 * Created by: Michael Leah (L1048345)
 * Created on: 25/11/2014
 */

class Hash {

    private $hash;

    /**
     * @return string
     */
    public static function createHash()
    {
        return $rand = md5(sha1(rand(1000,10000)));
    }

    /**
     * @param $email
     * @return null
     */
    public static function setRecoveryHash($email)
    {
        $db = Database::getInstance();

        /* Check the User exists within the database */
        $statement = $db->prepare("SELECT * FROM User WHERE email = :email;");
        $statement->bindParam(':email', $email);
        $statement->execute();

        $result = $statement->fetchAll();
        if (sizeof($result) > 0) {
            $user = User::fromDatabase($result[0]);
            $hash = self::createHash();

            /* Create a hash and store it into the database linking it to the user through their ID */
            $statement = $db->prepare("INSERT INTO Recovery (user_id, hash) VALUES (:user_id, :hash);");
            $statement->bindParam(':user_id', $user->getId());
            $statement->bindParam(':hash', $hash);

            if ($statement->execute()) {
                return true;
            }

            return false;

        }

        return null;

    }

    /**
     * @param $id
     * @return null
     */
    public static function getRecoveryHash($id)
    {
        $db = Database::getInstance();

        $statement = $db->prepare("SELECT * FROM Recovery WHERE user_id = :id;");
        $statement->bindParam(':id', $id);
        $statement->execute();

        $result = $statement->fetchAll();
        if (sizeof($result) > 0) {
            // hash exists
            return $result[0]['hash'];
        }

        return null;
    }

    /**
     * @param $id
     * @return bool
     */
    public static function deleteRecoveryHash($id)
    {
        $db = Database::getInstance();

        $statement = $db->prepare("DELETE FROM `recovery` WHERE user_id = :id;");
        $statement->bindParam(':id', $id);
        if ($statement->execute()) {
            return true;
        }

        return false;

    }




}