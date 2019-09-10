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
    <section id="about" class="about" style="padding-top: 40px">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-md-7 col-sm-12 about-content" id="about_cont" style="background-color: transparent;position: relative">
                <a href="javascript:history.back()" class="btn btn-yellow return"><img src="../img/icons/arrow-left-r.svg"></a><br>
                <div class="col-md-12">
                  <div id="wrap">
                      <img src="<?=BASE_URL."/img/projects/new23/1.png"?>" class="img-responsive mapimage" id="panorama3" usemap="#panorama3map" style="opacity: 0;">
                      <map name="panorama3map" id="panorama3map">
                          <area id="22" alt="სართული 22" title="სართული 22" coords="427,429,666,265,741,295,824,251,917,292,1092,204,1350,280,1419,246,1518,302,1611,373,1672,433,1740,509,1740,563,1591,470,1509,423,1468,401,1340,343,1090,245,951,311,875,348,746,323,520,448,483,472,417,509" shape="poly">
                          <area id="21" alt="სართული 21" title="სართული 21" coords="389,527,759,319,868,351,1097,239,1482,409,1736,561,1733,614,1510,490,1431,446,1086,314,864,417,751,390,389,578" shape="poly">
                          <area id="20" alt="სართული 20" title="სართული 20" coords="386,578,749,392,864,416,1090,304,1436,453,1519,490,1736,614,1743,673,1522,544,1432,505,1085,373,866,475,756,448,384,629" shape="poly">
                          <area id="19" alt="სართული 19" title="სართული 19" coords="384,628,756,448,866,472,1086,373,1449,514,1517,543,1743,670,1746,726,1639,663,1521,609,1437,565,1236,487,1095,436,866,538,757,509,382,687" shape="poly">
                          <area id="18" alt="სართული 18" title="სართული 18" coords="378,690,757,511,869,539,1096,441,1248,494,1455,577,1605,648,1744,726,1745,775,1603,699,1522,665,1447,633,1096,511,858,604,750,570,377,746" shape="poly">
                          <area id="17" alt="სართული 17" title="სართული 17" coords="377,745,749,572,856,604,1097,511,1275,572,1444,631,1519,663,1605,697,1748,775,1746,828,1605,758,1524,726,1443,690,1349,656,1093,570,861,668,747,645,374,801" shape="poly">
                          <area id="16" alt="სართული 16" title="სართული 16" coords="335,818,751,645,861,667,1091,573,1351,658,1458,697,1609,762,1750,831,1750,889,1609,818,1529,787,1448,758,1349,719,1107,641,859,734,742,707,332,870" shape="poly">
                          <area id="15" alt="სართული 15" title="სართული 15" coords="330,868,739,709,861,733,1093,646,1346,719,1456,762,1531,784,1609,819,1753,889,1751,941,1614,877,1529,841,1443,816,1353,789,1097,712,854,799,747,768,327,929" shape="poly">
                          <area id="14" alt="სართული 14" title="სართული 14" coords="328,929,745,772,856,801,1090,711,1454,819,1532,841,1617,875,1755,938,1756,1001,1617,936,1529,907,1454,885,1091,792,857,863,739,841,323,992" shape="poly">
                          <area id="13" alt="სართული 13" title="სართული 13" coords="323,992,739,841,859,862,1091,790,1456,885,1531,906,1617,936,1761,997,1764,1057,1614,997,1538,970,1443,945,1351,921,1082,862,853,933,743,911,322,1049" shape="poly">
                          <area id="12" alt="სართული 12" title="სართული 12" coords="320,1050,741,911,858,935,1083,864,1350,923,1467,950,1535,965,1616,999,1762,1057,1762,1115,1619,1060,1536,1033,1452,1011,1351,989,1087,938,855,996,739,979,573,1026,319,1101" shape="poly">
                          <area id="11" alt="სართული 11" title="სართული 11" coords="315,1101,736,979,856,998,1085,938,1355,993,1470,1016,1530,1033,1619,1060,1760,1115,1764,1171,1621,1121,1540,1101,1460,1082,1362,1060,1090,1010,851,1066,729,1054,310,1162" shape="poly">
                          <area id="10" alt="სართული 10" title="სართული 10" coords="308,1160,736,1054,849,1064,1087,1008,1353,1059,1470,1082,1630,1121,1762,1171,1764,1225,1547,1166,1462,1152,1358,1128,1089,1084,848,1135,734,1121,303,1227" shape="poly">
                          <area id="9" alt="სართული 9" title="სართული 9" coords="303,1225,729,1121,853,1135,1090,1082,1362,1128,1468,1155,1545,1162,1628,1189,1767,1225,1767,1284,1541,1227,1472,1222,1360,1201,1089,1157,849,1206,729,1196,302,1284" shape="poly">
                          <area id="8" alt="სართული 8" title="სართული 8" coords="300,1284,725,1196,844,1206,1085,1155,1468,1223,1541,1225,1768,1286,1767,1350,1633,1318,1541,1301,1461,1291,1360,1271,1087,1237,844,1279,727,1269,294,1347" shape="poly">
                          <area id="7" alt="სართული 7" title="სართული 7" coords="295,1345,727,1267,851,1279,1089,1237,1365,1271,1474,1291,1543,1305,1636,1322,1769,1349,1774,1406,1641,1379,1550,1366,1462,1359,1365,1344,1089,1315,846,1354,729,1342,291,1410" shape="poly">
                          <area id="6" alt="სართული 6" title="სართული 6" coords="290,1410,724,1339,848,1354,1092,1315,1479,1359,1540,1364,1636,1381,1770,1403,1770,1466,1638,1444,1550,1437,1468,1428,1363,1415,1082,1396,844,1430,719,1418,288,1467" shape="poly">
                          <area id="5" alt="სართული 5" title="სართული 5" coords="288,1464,724,1420,844,1430,1080,1393,1368,1413,1482,1428,1550,1440,1641,1447,1774,1467,1781,1529,1643,1508,1555,1505,1475,1498,1365,1488,1089,1476,843,1500,715,1496,285,1534" shape="poly">
                          <area id="4" alt="სართული 4" title="სართული 4" coords="283,1535,717,1495,841,1500,1083,1474,1368,1488,1482,1500,1558,1503,1641,1508,1779,1523,1787,1571,1692,1573,1689,1585,1560,1576,1367,1566,1089,1561,841,1576,717,1574,276,1598" shape="poly">
                          <area id="3" alt="სართული 3" title="სართული 3" coords="278,1601,722,1574,839,1576,1089,1557,1370,1566,1484,1569,1557,1574,1787,1588,1792,1625,1557,1617,1345,1615,1094,1617,839,1644,715,1649,274,1664" shape="poly">
                          <area id="2" alt="სართული 2" title="სართული 2" coords="274,1666,731,1651,841,1647,1085,1618,1484,1617,1567,1618,1799,1624,1801,1693,1648,1698,1648,1622,1477,1624,1480,1702,1178,1705,1089,1707,831,1732,727,1735,283,1732" shape="poly">
                      </map>
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
                      <!--                      TODO translate-->
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
        const areas = $("map > area");
        let curr_floor = 0;
      //Floor click listener
      areas.on("click", function(e){
        const ID = $(e.target).prop("id");
        curr_floor = ID;
        fetchApartments(ID);
      });

      areas.on("mouseover", e => {
          document.getElementById("floor_num").innerHTML = $(e.target).prop("id");
      });

      areas.on("mouseleave", () => {
          document.getElementById("floor_num").innerHTML = "" + curr_floor != 0 ? curr_floor : "--";
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