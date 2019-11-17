<?php
//
//namespace http;

class DatabaseAccessObject
{
    private static $DAO = null;
    private $database;

    /**
     * @return mysqli
     */
    public function getDatabase()
    {
        return $this->database;
    }

    //If connection fails returns null
    public static function getInstance(){
        if(self::$DAO == null)
            self::$DAO = new DatabaseAccessObject("", "root", "", "tride");//TODO fetch me from config

        //Check for failure
        if(self::$DAO->getDatabase() == null) return null;

        return self::$DAO;
    }

    protected function __construct($host, $user, $password, $db){

        set_error_handler(function($errno, $errstr, $errfile, $errline, $errcontext) {
            if (0 === error_reporting()) return false;
            throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
        });

        try{
            $this->database = new mysqli($host, $user, $password, $db);
            $this->database->set_charset("utf8");
        }catch (\Exception $e){
            //printf("Failed to connect to MySQL: %s\n", $e->getMessage());
            $this->database = null;
        }
    }

    public function executeQuery(String $query){
        $rs = $this->database->query($query);
        if(!$rs){
            printf("Database not configured correctly");
            return null;
        }
        return $rs;
    }
}