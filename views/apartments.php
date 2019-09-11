<?php
    include(LOCALE."/exportTranslator.php");
    include_once(MANAGERS."/ProjectsManager.php");
    use manager\ProjectsManager;

    if(!isset($_GET["projectID"]) || intval($_GET["projectID"]) !== 9) header("Location: projects");
    $project_id = intval($_GET["projectID"]);

    $project = ProjectsManager::getProjectWithId($project_id);
    if(!$project) header("Location: projects");

    $floors = ProjectsManager::getFloorsWithProjectId($project_id);
    if($floors == null ) header("Location: projects");
    $floor_images = [];
    $floor_maps = [];
    foreach ($floors as $num => $floor){
        $floor_images[$num] = $floor["image"];
        $floor_maps[$num] = str_replace("\n", "", addslashes(addslashes($floor["map"])));
    }

    $available_apartments = ProjectsManager::getAvailableApartmentCountOnTheFloors($project_id);
  ?>
<!DOCTYPE html>
<html lang="en">
<?php include(VIEWS."/partials/head.php") ?>
<body>
    <!-- Static navbar -->
    <?php include(VIEWS."/partials/navbar.php") ?>
    <div id="top"></div>
    <!-- About -->
    <section id="about" class="about" style="padding-top: 40px">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-md-7 col-sm-12 about-content" id="about_cont" style="background-color: transparent;position: relative">
                <a id="back-button" style="cursor: pointer; display: none" onclick="showBuilding()" class="btn btn-yellow return" ><img src="../img/icons/arrow-left-r.svg"></a><br>
                <div class="col-md-12">
                  <div id="building-wrap">
                      <img src="<?=BASE_URL."/img/projects/new23/1.png"?>" class="img-responsive mapimage" id="map_image" usemap="#image_map" style="opacity: 0;">
                      <?=$project["map"]?>
                  </div>
                  <div id="floor-wrap" style="display: none">
                      <img id="floor_image" src="/img/projects/new23/fl5.png" class="img-responsive mapimage">
                  </div>
                </div>
              </div>
              <div class="col-md-5 col-sm-12 about-nav">
                <div class="appartment-header">
                    <?=$project["name".$lang]?>
                </div>
                  <div class="free-apps">
                      <p>
                          <?= $translator->translate("სართული")?>
                          <br>
                          <span id="floor_num"> -- </span>
                      </p>
                      <p>
                          <?= $translator->translate("თავისუფალი ბინები სართულზე")?>
                          <br>
                          <span id="available_floors"> -- </span>
                      </p>
                  </div>
                  <div class="find-appartament">
                      <h3><?= $translator->translate("ძიება პარამეტრებით")?> </h3>
                      <div class="find-parameters">
                          <label for="floor"><?= $translator->translate("სართული")?></label>
                          <input type="text" class="js-range-slider" name="floors" id="floors" value=""
                                 data-type="double"
                                 data-min="0"
                                 data-max="23"
                                 data-from="10"
                                 data-to="15"
                                 data-grid="true"
                          />
                          <label for="area"><?= $translator->translate("ფართობი")?></label>
                          <input type="text" class="js-range-slider" name="area" id="area" value=""
                                 data-type="double"
                                 data-min="30"
                                 data-max="150"
                                 data-from="40"
                                 data-to="120"
                                 data-grid="true"
                          />
                          <label for="bedrooms"><?= $translator->translate("საძინებლები")?></label>
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

              </div>
            </div>
            <!-- /.row (nested) -->
              <div id="apartments">
              </div>
          </div>
          <!-- /.col-lg-8 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <div class="ft-wkr"></div>
    <script type="text/javascript" src="<?=BASE_URL?>js/jquery.rwdImageMaps.js"></script>
    <script type="text/javascript" src="<?=BASE_URL?>js/jquery.maphilight.js"></script>
    <script src="../js/ekko-lightbox.min.js"></script>
    <!--Plugin CSS file with desired skin-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/css/ion.rangeSlider.min.css"/>

    <!--Plugin JavaScript file-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.0/js/ion.rangeSlider.min.js"></script>
    <script>
        const availableApps = JSON.parse('<?=json_encode($available_apartments)?>');
        const floor_images = JSON.parse('<?=json_encode($floor_images)?>');
        const areas = $("map > area");
        let curr_floor = 0;

        const buildingWrap = document.getElementById("building-wrap");
        const floorWrap = document.getElementById("floor-wrap");

        function showBuilding(){
            floorWrap.style["display"] = "none";
            buildingWrap.style["display"] = "block";
            document.getElementById("back-button").style["display"] = "none";
            console.log("showing building!");

        }

        function showFloorPlan(ID) {
            buildingWrap.style["display"] = "none";
            floorWrap.style["display"] = "block";
            document.getElementById("floor_image").setAttribute("src", floor_images[ID]);
            document.getElementById("back-button").style["display"] = "";
            console.log("showing flooR");
        }

        //Floor click listener
      areas.on("click", function(e){
        const ID = $(e.target).prop("id");
        curr_floor = ID;
        showFloorPlan(ID);
        fetchApartments(ID);
      });

      areas.on("mouseover", e => {
          const id = $(e.target).prop("id");
          document.getElementById("floor_num").innerHTML = id;
          document.getElementById("available_floors").innerHTML = ""+availableApps[id];
      });

      areas.on("mouseleave", () => {
          let floor_chosen = curr_floor != 0;
          document.getElementById("floor_num").innerHTML = "" + ((floor_chosen) ? curr_floor : "--");
          document.getElementById("available_floors").innerHTML = "" + (floor_chosen? availableApps[curr_floor] : "--");
      });

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
              ap.available = ap.available ? "<?= $translator->translate("თავისუფალი")?>" : "<?= $translator->translate("გაყიდული")?>";
              ap.image = base_url+"/"+ap.image;
              apartmentsDiv.innerHTML += '<div class='+'"'+'appartament-explore col-lg-4 col-sm-12 col-xs-12'+'"'+'> ' +
                      '<a href='+'"'+ap.image+'"'+ 'data-toggle='+'"'+'lightbox' + '"' + 'data-gallery='+'"'+'example-gallery'+'"'+'>'+
                  '<img style="width: 30%" src="'+ap.image +'"></a>' +
                  '<div><p><?= $translator->translate("ფართობი")?>: '+ap.area+'</p>' +
                  '<p><?= $translator->translate("საძინებლები")?>: '+ap.bedrooms+'</p>' +
                  '<p><?= $translator->translate("სართული")?>: '+ap.floor+'</p>' +
                  '<p><?= $translator->translate("სტატუსი")?>: '+ ap.available +'</p>'
                  + '</div></div>';
          })
      }

      function fetchApartments(floor = null){
          const area = $("#area").data("ionRangeSlider").result;
          const floors = $("#floors").data("ionRangeSlider").result;
          const bedrooms = $("#bedrooms").data("ionRangeSlider").result;

          if(floor != null && floor >= floors.min && floor <= floors.max)
              updateSliders(floor);

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
              data: { area_from, area_to, floors_from, floors_to, bedrooms_from, bedrooms_to},
              success : apartments => {
                  console.log(apartments);
                  updateApartments(apartments);
              },
              error: () => {
                  console.error("error!");
              }
          });
      }

      //Updates sliders, sets everything to the edge and fixes one floor
      function updateSliders(floor){
          const area = $("#area").data("ionRangeSlider");
          const floors = $("#floors").data("ionRangeSlider");
          const bedrooms = $("#bedrooms").data("ionRangeSlider");

          floors.update({
              from : floor,
              to : floor
          });

          area.update({
              from : area.result.min,
              to : area.result.max
          });

          bedrooms.update({
              from : bedrooms.result.min,
              to : bedrooms.result.max
          });
      }

      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
          event.preventDefault();
          $(this).ekkoLightbox();
      });
    </script>
    <script type="text/javascript" src="../js/map-resizer.js"></script>
  </body>
</html>