<?php

namespace middleware;
require_once (CMS."/user/user.php");
use User;

class Authenticated
{
    public static function isAuthenticated() : bool {
        if(!isset($_SESSION))
            session_start();

        if(!isset($_SESSION['login'])){
            User::logout();
            return false;
        }

        return true;
    }
}