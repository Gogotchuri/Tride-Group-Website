<?php
if(!isset($_SESSION)) {
    session_start();
}
class User {

    Private static $_ADMIN_MAIL = 'tsitsi@tridegroup.ge';
    Private static $_ADMIN_PWD = 'tride_@tsitsi';

    public static function login($email, $pwd) {
        
        if($email == self::$_ADMIN_MAIL && $pwd == self::$_ADMIN_PWD){
            
            $_SESSION['login'] = True;
            $_SESSION['user']['admin'] = True;
            $_SESSION['user']['username'] = "Admin";
            
            header('Location: admin/gallery');
            die();
        }else{
            header('Location: admin');
            die();
        }

    }

    public static function logout(){
        session_destroy();
        header("Location: admin");
        die();
    }
}