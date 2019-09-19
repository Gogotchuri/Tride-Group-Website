<?php


namespace manager;

include_once(CLASSES."/database/DatabaseAccessObject.php");

use DatabaseAccessObject;

class NewsManager
{
    private static $DAO = null;

    private static function getDAO(){
        if(self::$DAO == null)
            self::$DAO = DatabaseAccessObject::getInstance();
    }

    public static function getAllNews(){
        self::getDAO();
        if(self::$DAO == null) return null;
        $news_raw = self::$DAO->executeQuery("SELECT * FROM news ORDER BY pubdate DESC");
        if($news_raw == null) return null;
        $news = [];
        while($row = $news_raw -> fetch_array()){
            $news[] = $row;
        }
        $news_raw -> close();
        return $news;
    }

    public static function getNewsById(int $id){
        self::getDAO();
        if(self::$DAO == null) return null;
        $news_raw = self::$DAO->executeQuery("SELECT * FROM news where ID = ".$id);
        if($news_raw == null) return null;
        $news = $news_raw->fetch_array();
        return $news;
    }

    public static function deleteNews(int $id){
        self::getDAO();
        if(self::$DAO == null) return null;
        $status = self::$DAO->executeQuery("DELETE FROM `news` WHERE ID='$id'");
        if(!$status) return false;
        return true;
    }
}