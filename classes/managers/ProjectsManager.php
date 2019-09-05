<?php


namespace manager;

include_once(CLASSES."/database/DatabaseAccessObject.php");
use http\DatabaseAccessObject;

class ProjectsManager
{
    private static $DAO = null;

    private static function getDAO(){
        if(self::$DAO == null)
            self::$DAO = DatabaseAccessObject::getInstance();
    }

    public static function allProjectsWithStatus(int $status){
        self::getDAO();
        if(self::$DAO == null) return null;
        $projects = self::$DAO->executeQuery("SELECT * FROM projects WHERE status = ".$status);
        if($projects == null) return null;
        $result = [];
        while($row = $projects->fetch_array())
            $result[] = $row;
        return $result;
    }

    public static function getProjectWithId(int $id){
        self::getDAO();
        if(self::$DAO == null) return null;
        $project_raw = self::$DAO->executeQuery("SELECT * FROM projects where ID = " . $id);
        if(!$project_raw) return null;
        return $project_raw->fetch_array();
    }

    public static function getFloorsWithProjectId(int $id, String $lang){
        self::getDAO();
        if(self::$DAO == null) return null;
        $floors_raw = self::$DAO->executeQuery("SELECT ID, description".$lang.", image, floor FROM floors where projectID = ".$id);

        if(!$floors_raw) return null;
        $floors = [];
        while ($row = $floors_raw->fetch_array(MYSQLI_ASSOC)){
            $floors[$row["floor"]] = $row;
        }

        $floors_raw->close();

        return $floors;
    }
}