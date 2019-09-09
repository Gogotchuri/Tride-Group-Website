<?php
    include(LOCALE."/exportTranslator.php");
    include_once(MANAGERS."/ProjectsManager.php");
    use manager\ProjectsManager;
  
    if(!(isset($_GET["ID"]) && isset($_GET["projectID"]))) header("Location: projects");
    $floor_id = intval($_GET["ID"]);
    $project_id = intval($_GET["projectID"]);

    $floors = ProjectsManager::getFloorsWithProjectId($project_id);
    if($floors == null ) header("Location: projects");

    $floor_ids = [];
    foreach($floors as $id => $value)
        $floor_ids[] = $id;

    $apartments = ProjectsManager::getApartmentsWithProjectAndFloorId($project_id, $floor_id);
    if(!$apartments) header("Location: projects");

    $project = ProjectsManager::getProjectWithId($project_id);
    if(!$project) header("Location: projects");

  ?>
<!DOCTYPE html>
<html lang="en">
<?php include(VIEWS."/partials/head.php") ?>
<body>
    <!-- Static navbar -->
    <?php include(VIEWS."/partials/navbar.php") ?>
    <div id="top"></div>
    <!-- About -->
    <section id="about" class="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="text-center header-y"><?= $translator->translate("სართულის გეგმა")?></h2>
            <hr class="small">
            <div class="row">
              <div class="col-md-9 about-content" id="about_cont">
                <a href="javascript:history.back()" class="btn btn-yellow"><i class="fa fa-angle-left"></i> <?= $translator->translate("უკან")?></a><br>
                <div class="col-md-12">
                  <div id="wrap">
                    <img src="<?= $floors[$floor_id]["image"]?>" class="img-responsive center" id="panorama3" usemap="#panorama3map" />
                    <?= $floors[$floor_id]["map"] ?>
                    <span class="small small-info"><?= $translator->translate("კონკრეტული ბინის მონაცემების სანახავად დააჭირეთ შესაბამის ბინის ნომერს ფოტოზე.")?></span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 about-nav">
                <div class="form-group select-floor">
                  <label><?= $translator->translate("შერჩეულია სართული")?>:</label>
                  <select class="form-control" id="floors">
                    <?php for($i=0;$i<count($floors);++$i){
                        if($floor_ids[$i] != $floor_id){?>
                    <option value="<?=$floor_ids[$i]?>"><?=$floor_ids[$i]?></option>
                    <?php }else{ ?>
                    <option selected value="<?=$floor_ids[$i]?>"><?=$floor_ids[$i]?></option>
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
                  <form>
                      <input type="text" class="js-range-slider" name="floor" value=""
                             data-type="double"
                             data-min="0"
                             data-max="1000"
                             data-from="200"
                             data-to="500"
                             data-grid="true"
                      />
                      <input type="text" class="js-range-slider" name="area" value=""
                             data-type="double"
                             data-min="0"
                             data-max="1000"
                             data-from="200"
                             data-to="500"
                             data-grid="true"
                      />
                      <input type="text" class="js-range-slider" name="rooms" value=""
                             data-type="double"
                             data-min="0"
                             data-max="1000"
                             data-from="200"
                             data-to="500"გი
                             data-grid="true"
                      />
                      <button><?= $translator->translate("ძებნა")?></button>
                  </form>
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
    <div class="ft-wkr"></div>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>
    <script type="text/javascript" src="../js/jquery.rwdImageMaps.js"></script>
    <script type="text/javascript" src="../js/jquery.maphilight.js"></script>
    <!--Plugin CSS file with desired skin-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/css/ion.rangeSlider.min.css"/>

    <!--jQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!--Plugin JavaScript file-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js"></script>
    <script>
      apps =<?= json_encode($apartments) ?>;
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
        location = "floor?projectID=<?=$_GET["projectID"]?>&ID=" + floor;
      }
      $("area").on("click", function(e){
        var ID = $(e.target).prop("id");
        displayApp(ID);
      });
      displayApp(1);
      $(".js-range-slider").ionRangeSlider({
          type: "double",
          min: 0,
          max: 1000,
          from: 200,
          to: 500,
          grid: true
      });
      $(".js-range-slider").ionRangeSlider();
    </script>
    <script type="text/javascript" src="../js/map-resizer.js"></script>
  </body>
</html>