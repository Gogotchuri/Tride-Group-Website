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
  $query = "SELECT * FROM floors where projectID = " .intval($_GET["projectID"]) ." order by floor";
  if(!($floors_ = $database->query($query))){
    printf("Database not configured correctly");
    exit();
  }
  $ID = intval($_GET["ID"]);
  $floors = array();
  while($row = $floors_->fetch_array(MYSQLI_ASSOC)){
    if($row["floor"] == $ID){
      $floor = $row;
    }
    array_push($floors,$row["floor"]);
  }
  $query = "SELECT * FROM appartments where projectID = " .intval($_GET["projectID"]) . " and floor=" . intval($_GET["ID"]);
  if(!($app_ = $database->query($query))){
    printf("Database not configured correctly");
    exit();
  }
  $app = array();
  while ($row = $app_->fetch_array(MYSQLI_ASSOC)){
    $app[$row["number"]] = $row;
  }
  $app_->close();
  
  
  $query = "SELECT * FROM projects where ID = " . intval($_GET["projectID"]);
  if(!($updates = $database->query($query))){
    printf("Database not configured correctly");
    exit();
  }
  $row = $updates->fetch_array(MYSQLI_ASSOC);
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
    <title>tride Group Development</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/stylish-portfolio.css" rel="stylesheet">
    <link href="../css/img-map.css" rel="stylesheet">
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
    <!-- About -->
    <section id="about" class="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="text-center"><?= $translator->translate("სართულის გეგმა")?></h2>
            <hr class="small">
            <div class="row">
              <div class="col-md-9 about-content" id="about_cont">
                <a href="javascript:history.back()" class="btn btn-yellow"><i class="fa fa-angle-left"></i> <?= $translator->translate("უკან")?></a><br>
                <div class="col-md-12">
                  <div id="wrap">
                    <img src="<?= $floor["image"]?>" class="img-responsive center" id="panorama3" usemap="#panorama3map" />
                    <?= $floor["map"] ?>
                    <span class="small small-info"><?= $translator->translate("კონკრეტული ბინის მონაცემების სანახავად დააჭირეთ შესაბამის ბინის ნომერს ფოტოზე.")?></span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 about-nav">
                <div class="form-group select-floor">
                  <label><?= $translator->translate("შერჩეულია სართული")?>:</label>
                  <select class="form-control" id="floors">
                    <?php for($i=0;$i<count($floors);++$i){ 
                      if($floors[$i] != $ID){?>
                    <option value="<?=$floors[$i]?>"><?=$floors[$i]?></option>
                    <?php }else{ ?>
                    <option selected value="<?=$floors[$i]?>"><?=$floors[$i]?></option>
                    <?php } ?>
                    <?php } ?>
                  </select>
                </div>
                <img id="floor_render" class="center img-responsive">
                <ul id="floor_prop">
                </ul>
                <ul class="soc-share">
                  <li><a target="_blank" class="fb_share btn btn-md social btn-fb" href="#"><i class="fa fa-facebook-square"></i> Share</a></li>
                  <li><a target="_blank" class="tw_share btn btn-md social btn-twt" href="#"><i class="fa fa-twitter"></i> Tweet</a></li>
                </ul>
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
    <div class="ft-wkr"></div>
    <?php include "footer.php" ?>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>
    <script type="text/javascript" src="../js/jquery.rwdImageMaps.js"></script>
    <script type="text/javascript" src="../js/jquery.maphilight.js"></script>
    <script>
      apps =<?= json_encode($app) ?>;
      function displayApp(ID){
        if(ID in apps){
          $("#floor_prop").html(apps[ID].description<?=$lang?>);
          $("#floor_render").attr('src', apps[ID].image);
        }
      }
      $("#floors").on("change", function(e){
        changeFloor($(e.target).val());
      });
      function changeFloor(floor){
        //console.log("floor.php?projectID=<?=$_GET["projectID"]?>&ID=" + floor);
        location = "floor.php?projectID=<?=$_GET["projectID"]?>&ID=" + floor;
      }
      $("area").on("click", function(e){
        var ID = $(e.target).prop("id");
        displayApp(ID);
      });
      displayApp(1);
    </script>
    <script type="text/javascript" src="../js/map-resizer.js"></script>
  </body>
</html>