<?php
  include 'database.php';
  include 'texts.php';
  
  $database = new mysqli($host, $user, $password, $db);
  if ($database->connect_errno)
  {
    printf ("Failed to connect to MySQL: %s\n" , $database->connect_error);
    exit();
  }
  if(!isset($_GET["ID"])){
    header("Location: projects.php");
  }
  $database->set_charset("utf8");
  $query = "SELECT ID, description" . $lang . ", image, floor FROM floors where projectID = " .intval($_GET["ID"]);
  if(!($floors_ = $database->query($query))){
    printf("Database not configured correctly");
    exit();
  }
  $floors = array();
  while ($row = $floors_->fetch_array(MYSQLI_ASSOC)){
    $floors[$row["floor"]] = $row;
  }
  $floors_->close();
  
  
  $query = "SELECT * FROM projects where ID = " . intval($_GET["ID"]);
  if(!($updates = $database->query($query))){
    printf("Database not configured correctly");
    exit();
  }
  $row = $updates->fetch_array();
  
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
    <title>tride Group - პროექტის სათაური</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stylish-portfolio.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="css/img-map.css" rel="stylesheet">
    <link href="img/icons/favicon.png" rel="shortcut icon">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/img-map.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->	
  </head>
  <body>
    <!-- Static navbar -->
    <?php include "navigation.php" ?>
    <div id="top"></div>
    <!-- About -->
    <section id="about" class="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="text-center"><?=$row["name" . $lang]?></h2>
            <hr class="small">
            <div class="row">
              <div class="col-md-12 about-content">
                <div class="col-md-5">
                  <div id="wrap">
                    <span class="floor_num">№ </span>
                    <img src="<?=$row["picture"]?>" class="img-responsive mapimage" id="panorama3" usemap="#panorama3map" />
                    <?=$row["map"]?>
                    <span class="small small-info"><?= $translator->translate("კონკრეტული სართულის სქემის სანახავად დააჭირეთ შესაბამის სართულს ფოტოზე.")?></span>
                  </div>
                </div>
                <div class="col-md-7 about-project">
                  <?=$row["descriptionLarge" . $lang]?>
                </div>
              </div>
            </div>
            <!-- /.row (nested) -->
          </div>
          <!-- /.col-lg-8 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- Footer -->
    <!-- modal კონკრეტული სართულის სქემა -->
    <div class="modal fade floor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="floorTitle"></h4>
          </div>
          <div class="modal-body">
            <a id="goto" href="floor.php"><img id="floorImage" src="img/projects/panorama3/fl2.png" class="img-responsive modal-floor-img"></a>
          </div>
          <div class="modal-footer">
            <a class="btn btn-dark" data-dismiss="modal"><?= $translator->translate("უკან")?></a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
    </div>
    <div class="ft-wkr"></div>
    <?php include "footer.php" ?>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script type="text/javascript" src="js/jquery.rwdImageMaps.js"></script>
    <script type="text/javascript" src="js/jquery.maphilight.js"></script>
    <script type="text/javascript" src="js/project.js"></script>
    <script>
      data =<?= json_encode($floors) ?>;
      $("area").on("click", function(e){
        var ID = $(e.target).prop("id");
        openModal(ID);
      });
      function openModal(ID){
        if(ID in data){
          $("#floorImage").attr("src", data[ID].image);
          $("#floorTitle").html(data[ID].description<?=$lang?>);
          $(".floor").modal("show");
          $("#goto").attr("href", "floor.php?projectID=<?=$_GET["ID"]?>&ID="+ID);
        }
      }
    </script>
    <script type="text/javascript" src="js/map-resizer.js"></script>
  </body>
</html>