<?php
  include 'database.php';
  include 'texts.php';
  
  if(!isset($_GET["ID"])){
    header("Location: gallery.php");
  }
  $database = new mysqli($host, $user, $password, $db);
  if ($database->connect_errno)
  {
    printf ("Failed to connect to MySQL: %s\n" , $database->connect_error);
    exit();
  }
  $database->set_charset("utf8mb4");
  $query = "SELECT * FROM album where ID = " . intval($_GET["ID"]);
  if(!($updates = $database->query($query))){
    printf("Database not configured correctly");
    exit();
  }
  $row = $updates->fetch_array();
  $root = $row["images"];
  if(strlen($root) > 0){
      $dirs = scandir($root);
      for($i=0;$i<count($dirs);$i++){
       $dirs[$i] =  $root . $dirs[$i];
      }
  }else{
      $dirs = array();
  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-50741180-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      
      gtag('config', 'UA-50741180-3');
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>tride Group - <?=$row["name" . $lang]?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stylish-portfolio.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/ekko-lightbox.min.css" rel="stylesheet">
    <link href="img/icons/favicon.png" rel="shortcut icon">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- Static navbar -->
    <?php include "navigation.php" ?>
    <div id="top"></div>
    <!-- Portfolio -->
    <section id="gallery" class="gallery">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center album">
            <h2><?=$row["name" . $lang]?></h2>
            <hr class="small">
            <div class="row">
              <?php for($i=2;$i<count($dirs);$i++){?>
              <div class="col-lg-4 col-md-4 col-xs-6">
                <div class="portfolio-item">
                  <a href="<?=$dirs[$i]?>" data-toggle="lightbox" data-gallery="example-gallery">
                  <img class="img-portfolio img-responsive" src="<?=$dirs[$i]?>">
                  </a>
                </div>
              </div>
              <?php } ?>
              <!-- /.row (nested) -->
            </div>
            <!-- /.col-lg-10 -->
          </div>
          <!-- /.row -->
        </div>
      </div>
      <!-- /.container -->
    </section>
    <div class="ft-wkr"></div>
    <!-- Footer -->
    <?php include "footer.php" ?>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/ekko-lightbox.min.js"></script>
    <script>
      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox();
      });
    </script>
  </body>
</html>