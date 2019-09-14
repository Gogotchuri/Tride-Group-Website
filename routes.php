<?php
    include_once ("config.php");
    include_once (HTTP."/Request.php");
    include_once (HTTP."/Router.php");
    include_once(HTTP."/controllers/MailingController.php");
    include_once(HTTP."/controllers/ApartmentController.php");

    use controller\ApartmentController;
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

    $router->get("/apartments", function (){
        require(VIEWS . "/apartments.php");
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

    ######################### API ###########################
    $router->post("/contact", function(Request $request){
        return MailingController::contactMessage($request);
    });

    $router->post("/request-call", function(Request $request){
        return MailingController::requestCall($request);
    });

    $router->post("/schedule-meeting", function(Request $request){
        return MailingController::scheduleMeeting($request);
    });

    //get apartments with json
    $router->post("/get-apartments", function(Request $request){
        return ApartmentController::getApartments($request);
    });

    ##################### Admin ##############################

    $router->get("/admin", function (){
       echo '
            <script> location.href = "/cms/sign-in.php"</script>
       ';
    });

    ###################################################