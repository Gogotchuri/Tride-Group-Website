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
    $floor_maps[$num] = $floor["map"];
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
                            <div id="floor-wrap" class="hidden-floor">
                                <img id="floor_image" src="/img/projects/new23/floor3-15.png" class="img-responsive mapimage" usemap="#floor_map" style="opacity: 0;">
                                <map name="floor_map" id="floor_map">
                                    <area id="a1"  alt="ბინა 1" title="ბინა 1" coords="426,197,751,201,755,361,737,365,780,633,426,629" shape="poly">
                                    <area id="a2"  alt="ბინა 2" title="ბინა 2" coords="76,201,426,197,423,633,337,633,337,608,312,608,305,619,80,619,101,411,98,211" shape="poly">
                                    <area id="a3"  alt="ბინა 3" title="ბინა 3" coords="80,619,308,619,316,636,333,633,337,740,380,740,383,1029,109,1033,105,911,98,915" shape="poly">
                                    <area id="a4"  alt="ბინა 4" title="ბინა 4" coords="109,1029,383,1026,383,1304,144,1304,144,1311,87,1311,94,1151,105,1144" shape="poly">
                                    <area id="a5"  alt="ბინა 5" title="ბინა 5" coords="80,1311,162,1311,169,1304,383,1304,383,1422,780,1426,758,1586,715,1586,715,1694,55,1697,80,1686" shape="poly">
                                    <area id="a6"  alt="ბინა 6" title="ბინა 6" coords="740,1029,608,1029,605,1126,458,1129,458,1311,783,1315" shape="poly">
                                    <area id="a7"  alt="ბინა 7" title="ბინა 7" coords="455,736,783,744,744,1029,612,1026,608,897,458,901" shape="poly">
                                    <area id="a8"  alt="ბინა 8" title="ბინა 8" coords="676,1715,676,1951,976,1958,973,1715" shape="poly">
                                    <area id="a9"  alt="ბინა 9" title="ბინა 9" coords="312,1711,676,1715,676,1958,640,1954,644,2051,608,2047,608,2083,316,2083" shape="poly">
                                    <area id="a10" alt="ბინა 10" title="ბინა 10" coords="316,2086,608,2079,612,2051,876,2051,880,2194,944,2194,944,2351,319,2315,301,2311,301,2301,316,2304" shape="poly">
                                    <area id="a11" alt="ბინა 11" title="ბინა 11" coords="944,2190,1083,2186,1076,1647,1372,1690,1362,2358,1105,2354,948,2351" shape="poly">
                                    <area id="a12" alt="ბინა 12" title="ბინა 12" coords="1369,1690,1662,1647,1665,2190,1790,2190,1794,2351,1515,2358,1372,2354" shape="poly">
                                    <area id="a13" alt="ბინა 13" title="ბინა 13" coords="1790,2190,1865,2186,1865,2047,2136,2051,2129,1951,2322,1951,2326,2072,2376,2083,2376,2251,2383,2254,2386,2283,2336,2294,2333,2290,1787,2351" shape="poly">
                                    <area id="a14" alt="ბინა 14" title="ბინა 14" coords="2054,1669,2479,1647,2483,2083,2376,2083,2326,2076,2322,1929,2319,1951,2133,1958,2054,1954" shape="poly">
                                    <area id="a15" alt="ბინა 15" title="ბინა 15" coords="1758,1715,1901,1715,1901,1647,2058,1676,2054,1961,1758,1958" shape="poly">
                                </map>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12 about-nav">
                        <div class="appartment-header">
                            <?=$project["name".$lang]?>
                        </div>
                        <div id="free-apps" class="free-apps">
                            <p style="display: inline-block">
                                <?= $translator->translate("სართული")?>
                                <br>
                                <span id="floor_num"> -- </span>
                            </p>
                            <p style="display: inline-block">
                                <?= $translator->translate("თავისუფალი ბინები სართულზე")?>
                                <br>
                                <span id="available_floors"> -- </span>
                            </p>
                        </div>
                        <div id="app-preview" class="free-apps appartament-explore" style="display: none">
                            <a id="ap-image-link" data-toggle="lightbox" data-gallery="example-gallery">
                                <img src="" style="width: 200px" alt="apartment preview" id="ap-preview-image">
                            </a>
                            <div>
                                <p>
                                    <?= $translator->translate("ფართობი") ?>:
                                    <span id="prev-area"></span>
                                </p>
                                <p>
                                    <?= $translator->translate("საძინებლები") ?>:
                                    <span id="prev-bedrooms"></span>
                                </p>
                                <p>
                                    <?= $translator->translate("სართული") ?>:
                                    <span id="prev-floor"></span>
                                </p>
                                <p>
                                    <?= $translator->translate("სტატუსი") ?>:
                                    <span id="prev-status"></span>
                                </p>
                            </div>
                        </div>
                        <div class="find-appartament">
                            <h3><?= $translator->translate("ძიება პარამეტრებით")?> </h3>
                            <div class="find-parameters">
                                <label for="floor"><?= $translator->translate("აირჩიე სართული")?></label>
                                <input type="text" class="js-range-slider" name="floors" id="floors" value=""
                                       data-type="double"
                                       data-min="0"
                                       data-max="23"
                                       data-from="10"
                                       data-to="15"
                                       data-grid="true"
                                />
                                <label for="area"><?= $translator->translate("აირჩიეთ კვადრატულობა")?></label>
                                <input type="text" class="js-range-slider" name="area" id="area" value=""
                                       data-type="double"
                                       data-min="30"
                                       data-max="150"
                                       data-from="40"
                                       data-to="120"
                                       data-grid="true"
                                />
                                <label for="bedrooms"><?= $translator->translate("აირჩიეთ საძინებლების რაოდენობა")?></label>
                                <input type="text" class="js-range-slider" name="bedrooms" id="bedrooms" value=""
                                       data-type="double"
                                       data-min="0"
                                       data-max="4"
                                       data-from="2"
                                       data-to="3"
                                       data-grid="true"
                                />
                                <div style="width: 100%;text-align: center">
                                    <button onclick="fetchApartments()"><?= $translator->translate("ძებნა")?></button>
                                </div>
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
<script type="text/javascript" src="../js/map-resizer.js"></script>
<script>
    let preview_ap_id = 0;
    let floor_apartments = null;
    const availableApps = JSON.parse('<?=json_encode($available_apartments)?>');
    const floor_images = JSON.parse('<?=json_encode($floor_images)?>');
    const buildingAreas = $("#building-wrap area");
    const floorAreas = $("#floor-wrap area");
    let curr_floor = 0;

    const buildingWrap = document.getElementById("building-wrap");
    const floorWrap = document.getElementById("floor-wrap");

    const ap_preview_elem = document.getElementById("app-preview");
    const available_apartments_elem = document.getElementById("free-apps");

    $(document).ready(() => {
        setTimeout(() => {
            floorWrap.style["display"] = "none";
            floorWrap.classList = [];
        }, 1000);
    });



    function switchApartment(ID){
        if(ID <= 0){
            preview_ap_id = 0;
            ap_preview_elem.style["display"] = "none";
            available_apartments_elem.style["display"] = "flex";
        }else{
            let apartment = floor_apartments[ID-1];
            if(curr_floor == 17 && ID > 1)
                apartment = floor_apartments[ID-2];
            document.getElementById("ap-preview-image").setAttribute("src", apartment.image);
            document.getElementById("ap-image-link").setAttribute("href", apartment.image);
            document.getElementById("prev-area").innerText = apartment.area;
            document.getElementById("prev-status").innerText = apartment.available;
            document.getElementById("prev-floor").innerText = apartment.floor;
            document.getElementById("prev-bedrooms").innerText = apartment.bedrooms;
            available_apartments_elem.style["display"] = "none";
            ap_preview_elem.style["display"] = "block";
        }
    }

    function showBuilding(){
        floorWrap.style["display"] = "none";
        buildingWrap.style["display"] = "block";
        switchApartment(0);
        document.getElementById("back-button").style["display"] = "none";
    }

    function showFloorPlan(ID) {
        document.getElementById("floor_image").setAttribute("src", floor_images[ID]);
        $("#floor-wrap > div")[0].style.background = 'url("' + floor_images[ID] + '")';
        buildingWrap.style["display"] = "none";
        floorWrap.style["display"] = "block";
        document.getElementById("back-button").style["display"] = "";
        //Change map layout to match floor 17
        const def_a1 = "90,41,158,42,159,76,155,77,165,133,90,132";
        const def_a2 = "16,42,90,41,89,133,71,133,71,128,66,128,64,130,16,130,21,86,20,44";
        const f17_a1 = "16,42,90,41,89,133,71,133,71,128,66,128,64,130,16,130,21,86,20,44,90,41,158,42,159,76,155,77,165,133,90,132";
        if(ID == 17){
            $("#a1")[0].coords = f17_a1;
            $("#a2")[0].coords = "";
        }else{
            $("#a1")[0].coords = def_a1;
            $("#a2")[0].coords = def_a2;
        }
    }

    //Floor click listener
    buildingAreas.on("click", function(e){
        const ID = $(e.target).prop("id");
        curr_floor = ID;
        showFloorPlan(ID);
        fetchApartments(ID);
    });

    buildingAreas.on("mouseover", e => {
        const id = $(e.target).prop("id");
        document.getElementById("floor_num").innerHTML = id;
        if(availableApps[id])
            document.getElementById("available_floors").innerHTML = ""+availableApps[id];
        else
            document.getElementById("available_floors").innerHTML = "0";

    });

    buildingAreas.on("mouseleave", () => {
        let floor_chosen = curr_floor != 0;
        document.getElementById("floor_num").innerHTML = "" + ((floor_chosen) ? curr_floor : "--");
        if(availableApps[curr_floor])
            document.getElementById("available_floors").innerHTML = "" + (floor_chosen? availableApps[curr_floor] : "--");
        else
            document.getElementById("available_floors").innerHTML = "" + (floor_chosen? "0" : "--");
    });

    //Apartment click listener
    floorAreas.on("click", function(e){
        let ID = $(e.target).prop("id");
        ID = ID.substr(1);
        preview_ap_id = ID;
        switchApartment(ID);
    });

    floorAreas.on("mouseover", e => {
        let ID = $(e.target).prop("id");
        ID = ID.substr(1);
        switchApartment(ID);
    });

    floorAreas.on("mouseleave", () => {
        if(preview_ap_id <= 0)
            switchApartment(0);
        else
            switchApartment(preview_ap_id);
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
    function updateApartments(apartments, fromFilter) {
        let apartmentsDiv = document.getElementById("apartments");
        const base_url = '<?=BASE_URL?>';
        apartmentsDiv.innerHTML = "";
        apartments.forEach(ap => {
            ap.available = (ap.available == "1") ? "<?= $translator->translate("თავისუფალი")?>" : "<?= $translator->translate("გაყიდული")?>";
            ap.image = base_url+"/"+ap.image;
            apartmentsDiv.innerHTML += '<div class='+'"'+'appartament-explore col-lg-4 col-sm-6 col-xs-12'+'"'+'> ' +
                '<a href='+'"'+ap.image+'"'+ 'data-toggle='+'"'+'lightbox' + '"' + 'data-gallery='+'"'+'example-gallery'+'"'+'>'+
                '<img style="width: 30%" src="'+ap.image +'"></a>' +
                '<div><p><?= $translator->translate("ფართობი")?>: '+ap.area+'</p>' +
                '<p><?= $translator->translate("საძინებლები")?>: '+ap.bedrooms+'</p>' +
                '<p><?= $translator->translate("სართული")?>: '+ap.floor+'</p>' +
                '<p><?= $translator->translate("სტატუსი")?>: '+ ap.available +'</p>'
                + '</div></div>';
        });
        if(fromFilter) apartmentsDiv.scrollIntoView({behavior: "smooth"});
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
                floor_apartments = apartments;
                updateApartments(apartments, floor == null);
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
</body>
</html>