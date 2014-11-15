<?php
/*
 * Final Year Project - Assessment Database
 * @author Michael Leah
 */
require '../core/Config.php';

class Database {
    
    private static $instance;
    
    // Returns an instance of the Database through PDO.
    public static function getInstance()
    {
        if (self::$instance == null){
            self::$instance = new PDO(Config::$databaseDetails);
        }
        
        return self::$instance;
        
    }
}

