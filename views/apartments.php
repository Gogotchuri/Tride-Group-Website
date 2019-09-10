<?php
    include(LOCALE."/exportTranslator.php");
    include_once(MANAGERS."/ProjectsManager.php");
    use manager\ProjectsManager;

    if(!isset($_GET["ID"]) || !isset($_GET["projectID"]) || intval($_GET["projectID"]) !== 9) header("Location: projects");
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
              <div class="col-md-8 col-sm-12 about-content" id="about_cont">
                <a href="javascript:history.back()" class="btn btn-yellow"><i class="fa fa-angle-left"></i> <?= $translator->translate("უკან")?></a><br>
                <div class="col-md-12">
                  <div id="wrap">
                    <img src="<?= $floors[$floor_id]["image"]?>" class="img-responsive center" id="panorama3" usemap="#panorama3map" />
                    <?= $floors[$floor_id]["map"] ?>
                    <span class="small small-info"><?= $translator->translate("კონკრეტული ბინის მონაცემების სანახავად დააჭირეთ შესაბამის ბინის ნომერს ფოტოზე.")?></span>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-sm-12 about-nav">
                  <div class="find-appartament">
                      <!--                      TODO translate-->
                      <h3>ძიება პარამეტრებით</h3>
                      <div class="find-parameters">
                          <label for="floor">სართული</label>
                          <input type="text" class="js-range-slider" name="floors" id="floors" value=""
                                 data-type="double"
                                 data-min="0"
                                 data-max="23"
                                 data-from="10"
                                 data-to="15"
                                 data-grid="true"
                          />
                          <label for="">ფართობი</label>
                          <input type="text" class="js-range-slider" name="area" id="area" value=""
                                 data-type="double"
                                 data-min="30"
                                 data-max="150"
                                 data-from="40"
                                 data-to="120"
                                 data-grid="true"
                          />
                          <label for="">საძინებლები</label>
                          <input type="text" class="js-range-slider" name="bedrooms" id="bedrooms" value=""
                                 data-type="double"
                                 data-min="0"
                                 data-max="4"
                                 data-from="2"
                                 data-to="3"
                                 data-grid="true"
                          />
                          <button onclick="fetchApartments()"><?= $translator->translate("ძებნა")?></button>
                      </div>
                  </div>
                <div class="form-group select-floor">
                  <label><?= $translator->translate("შერჩეულია სართული")?>:</label>
                  <select class="form-control" id="floor">
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

              </div>
            </div>
            <!-- /.row (nested) -->
          </div>
          <!-- /.col-lg-8 -->
        </div>
        <!-- /.row -->
          <div id="apartments">
          </div>
      </div>
      <!-- /.container -->
    </section>
    <div class="ft-wkr"></div>
    <script type="text/javascript" src="<?=BASE_URL?>js/jquery.rwdImageMaps.js"></script>
    <script type="text/javascript" src="<?=BASE_URL?>js/jquery.maphilight.js"></script>
    <!--Plugin CSS file with desired skin-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/css/ion.rangeSlider.min.css"/>

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
      $("#floor").on("change", function(e){
        changeFloor($(e.target).val());
      });
      function changeFloor(floor){
        location = "/apartments?projectID=<?=$_GET["projectID"]?>&ID=" + floor;
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

      //Update apartments div here
      function updateApartments(apartments) {
          let apartmentsDiv = document.getElementById("apartments");
          const base_url = '<?=BASE_URL?>';
          apartmentsDiv.innerHTML = "";
          apartments.forEach(ap => {
              ap.available = ap.available ? "თავისუფალი" : "გაყიდული";
              ap.image = base_url+"/"+ap.image;
              apartmentsDiv.innerHTML += '<div> ' +
                  '<p>ფართობი: '+ap.area+'</p>' +
                  '<p>საძინებელი: '+ap.bedrooms+'</p>' +
                  '<p>სართული: '+ap.floor+'</p>' +
                  '<p>სტატუსი: '+ ap.available +'</p>' +
                  '<img style="width: 30%" src="'+ap.image +'">' +
                  + '</div>';
          })
      }

      function fetchApartments(){
          const area = $("#area").data("ionRangeSlider").result;
          const floors = $("#floors").data("ionRangeSlider").result;
          const bedrooms = $("#bedrooms").data("ionRangeSlider").result;
          let area_from = area.from;
          let area_to = area.to;
          let floors_from = floors.from;
          let floors_to = floors.to;
          let bedrooms_from = bedrooms.from;
          let bedrooms_to = bedrooms.to;

          jQuery.ajax({
              type: "POST",
              url: '/get-apartments',
              dataType: 'json',
              accept: "application/json",
              data: {
                  area_from,
                  area_to,
                  floors_from,
                  floors_to,
                  bedrooms_from,
                  bedrooms_to
              },

              success : apartments => {
                  console.log(apartments);
                  updateApartments(apartments);
              },
              error: () => {
                  console.error("error!");
              }
          });
      }
    </script>
    <script type="text/javascript" src="../js/map-resizer.js"></script>
  </body>
</html>