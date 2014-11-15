<?php
/*
 * Final Year Project - Assessment Database
 * @author Michael Leah
 */
require_once '../Database.php';

class TeacherDAO {
    
    public static function get($id)
    {
        $db = Database::getInstance();
        
        $statement = $db->prepare("SELECT * FROM Teacher WHERE ID = :id");
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
