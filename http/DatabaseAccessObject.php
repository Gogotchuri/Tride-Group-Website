<?php

//TODO finish me
namespace http;
include_once(ROOT."/config.php");
use mysqli;

class DatabaseAccessObject
{
    private static $DAO = null;
    private $database;

    public static function getInstance(){
        if(self::$DAO == null)
//            $DAO = new DatabaseAccessObject($database[])
        return self::$DAO;
    }

    protected function __construct($host, $user, $password, $db){
        $this->database = new mysqli($host, $user, $password, $db);
    }

    public function executeQuery(String $query){

    }
}