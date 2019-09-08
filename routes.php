<?php
    include_once ("config.php");
    include_once (HTTP."/Request.php");
    include_once (HTTP."/Router.php");
    include_once(HTTP . "/controllers/MailingController.php");

    use http\Request;
    use http\Router;
    use controller\MailingController;

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

    $router->post("/contact", function(Request $request){
        MailingController::contactMessage($request);
    });

    $router->post("/request-call", function(Request $request){
        MailingController::requestCall($request);
    });

    $router->post("/schedule-meeting", function(Request $request){
        MailingController::scheduleMeeting($request);
    });

    ##################### Admin ##############################

    $router->get("/admin", function (){
       require(CMS."/sign-in.php");
    });

    $router->post("/admin", function (){
       require(CMS."/sign-in.php");
    });

    $router->get("/admin/gallery", function (){
        require(CMS."/gallery.php");
    });

    $router->get("/sign-out", function (){
        require(CMS."/sign-out.php");
    });

    $router->get("/admin/updates", function(){
       require(CMS."/updates.php");
    });
    ##### For sake of backwards compatibility #####
    //methods TODO think about refactoring
    $router->get("/admin/methods", function(){
        require(CMS."/method_list.php");
    });
    $router->post("/admin/methods", function(){
        require(CMS."/method_list.php");
    });

    $router->get("/admin/uploadAlbum", function(){
        require(CMS."/uploadAlbum.php");
    });
    $router->post("/admin/uploadAlbum", function(){
        require(CMS."/uploadAlbum.php");
    });

    $router->get("/admin/uploadNews", function(){
        require(CMS."/uploadNews.php");
    });
    $router->post("/admin/uploadNews", function(){
        require(CMS."/uploadNews.php");
    });

    ###################################################