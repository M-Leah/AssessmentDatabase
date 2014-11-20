<?php
/*
 * Final Year Project - Assessment Database
 * @author Michael Leah
 */

class Database {
    
    private static $instance;
    
    // Returns an instance of the Database through PDO.
    public static function getInstance()
    {

        if (self::$instance == null){
            self::$instance = new PDO('mysql:host=localhost;dbname=assessmentdatabase', 'root', '' );
        }
        
        return self::$instance;
        
    }
}

