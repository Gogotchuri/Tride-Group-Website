<?php
  include 'database.php';
  include 'texts.php';
  
  $database = new mysqli($host, $user, $password, $db);
  if ($database->connect_errno)
  {
    printf ("Failed to connect to MySQL: %s\n" , $database->connect_error);
    exit();
  }
  $database->set_charset("utf8mb4");
  $query = "SELECT * FROM album order by ID";
  if(!($updates = $database->query($query))){
    printf("Database not configured correctly");
    exit();
  }


$query = "SELECT * FROM videos order by ID";
  if(!($videos = $database->query($query))){
    printf("Database not configured correctly");
    exit();
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
    <title>tride Group - <?= $translator->translate("გალერეა") ?></title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/stylish-portfolio.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">
    <link href="../img/icons/favicon.png" rel="shortcut icon">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
          <div class="col-lg-12 text-center">
            <h2><?=$translator->translate("ფოტო ალბომები")?></h2>
            <hr class="small">
            <div class="row">
              <?php
                while($row = $updates->fetch_array()){ ?>
              <div class="col-lg-4 col-md-4 col-xs-6">
                <div class="portfolio-item">
                  <a href="<?=$row["link"]?>">
                    <img class="img-portfolio img-responsive" src="<?=$row["defaultImage"]?> " alt="პანორამა 3">
                    <div class="gallery-descr"><span><?=$row["name" . $lang]?></span></div>
                  </a>
                </div>
              </div>
              <?php } ?>
            </div>
            <!-- /.row (nested) -->
            <div class="row">
              <h2><?=$translator->translate("ვიდეოები")?></h2>
              <hr class="small">
                
              <?php

                while($row = $videos->fetch_array()){ ?>
                  <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="portfolio-item">
                      <a href="#">
                      <iframe width="100%" height="315" src="<?=$row["URL"]?>" frameborder="0" allowfullscreen></iframe>
                      </a>
                    </div>
                  </div>
              <?php } ?>
                
            </div>
            <!-- /.row (nested) -->
          </div>
          <!-- /.row -->
        </div>
      </div>
      <!-- /.container -->
    </section>
    <!-- Footer -->
    <?php include "footer.php" ?>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>
  </body>
</html>