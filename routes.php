<?php
    include_once "config.php";
    include_once "http\Request.php";
    include_once "http\Router.php";
    use http\Request;
    use http\Router;

    $router = new Router(new Request());

    $router->get("/home", function(){
        require(VIEWS."/home.php");
    });

    $router->get("/", function(){
        require(VIEWS."/home.php");
    });

    $router->get("/contact", function (){
       require(VIEWS."/contact.php");
    });

    $router->get("/about-us", function (){
        require(VIEWS."/about.php");
    });

    //admin
    $router->get("/admin", function (){
       require(ROOT."/cms/sign-in.php");
    });

    $router->get("/gallery", function (){
        require(ROOT."/cms/gallery.php");
    });

    $router->post("/admin", function (){
        require(ROOT."/cms/sign-in.php");
    });

    //TODO finish routing admin