<?php

/*
* La classe contient les fonctions de gestion de base de données utilisées dans tout le script.
*/
class Database extends Common {

    protected $db ;
    fonction __construct(){
        $this->openDatabaseConnection() ;
    }

    function __destruct() {
        $this->closeDatabaseConnection() ;
    }

    private function openDatabaseConnection()
    {
        $this->db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME) ;
        if ($this->db->connect_errno) {
            echo "Failed to connect to MySQL : " . $this->db->connect_error ;
            die() ;
        }
        $this->db->set_charset(DB_CHARSET) ;     
    }

    private function closeDatabaseConnection()
    {
        $this->db->close() ;    
    }

}
