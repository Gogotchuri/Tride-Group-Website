<?php


namespace manager;

include_once(CLASSES."/database/DatabaseAccessObject.php");
use http\DatabaseAccessObject;

class GalleryManager
{
    private static $DAO = null;

    private static function getDAO(){
        if(self::$DAO == null)
            self::$DAO = DatabaseAccessObject::getInstance();
    }

    public static function getAllVideos(){
        self::getDAO();
        if(self::$DAO == null) return null;
        $videos_raw = self::$DAO->executeQuery("SELECT * FROM videos order by ID");
        if($videos_raw == null) return null;
        $videos = [];
        while($row = $videos_raw->fetch_array())
            $videos[] = $row;
        return $videos;

    }

    public static function getAlbumById(int $id){
        self::getDAO();
        if(self::$DAO == null) return null;
        $album_raw = self::$DAO->executeQuery("SELECT * FROM album where ID = ".$id);
        if($album_raw == null) return null;
        $album = $album_raw->fetch_array();
        return $album;
    }

    public static function getAllAlbums(){
        self::getDAO();
        if(self::$DAO == null) return null;
        $albums_raw = self::$DAO->executeQuery("SELECT * FROM album order by ID");
        if($albums_raw == null) return null;
        $albums = [];
        while($row = $albums_raw->fetch_array())
            $albums[] = $row;

        return $albums;
    }


}