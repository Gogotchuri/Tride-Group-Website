<?php
    include_once ("config.php");
    include_once (HTTP."/Request.php");
    include_once (HTTP."/Router.php");

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

    $router->get("/projects", function (){
        require(VIEWS."/projects.php");
    });

    $router->get("/project", function (){
        require(VIEWS."/project.php");
    });

    $router->get("/floor", function (){
        require(VIEWS."/floor.php");
    });

    $router->get("/gallery", function (){
        require(VIEWS."/gallery.php");
    });

    $router->get("/album", function (){
        require(VIEWS."/album.php");
    });

    $router->get("/updates", function (){
        require(VIEWS."/updates.php");
    });

    //admin
    $router->get("/admin", function (){
       require(CMS."/sign-in.php");
    });

    $router->post("/admin", function (){
       require(CMS."/sign-in.php");
    });

    $router->get("/admin/gallery", function (){
        require(CMS."/gallery.php");
    });

    $router->get("sign-out", function (){
        require(CMS."/sign-out.php");
    });

    ##### For sake of backwards compatibility #####
    //methods TODO think about refactoring
    $router->get("method_list.php", function(){
        require(CMS."/method_list.php");
    });
    $router->post("method_list.php", function(){
        require(CMS."/method_list.php");
    });

    $router->get("uploadAlbum.php", function(){
        require(CMS."/uploadAlbum.php");
    });
    $router->post("uploadAlbum.php", function(){
        require(CMS."/uploadAlbum.php");
    });

    $router->get("uploadNews.php", function(){
        require(CMS."/uploadNews.php");
    });
    $router->post("uploadNews.php", function(){
        require(CMS."/uploadNews.php");
    });

    $router->get("method_list.php", function(){
        require(CMS."/method_list.php");
    });
    $router->post("method_list.php", function(){
        require(CMS."/method_list.php");
    });

    ###################################################