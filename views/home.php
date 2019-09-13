<?php
    include_once(LOCALE."/exportTranslator.php");
    include_once(MANAGERS."/ProjectsManager.php");
    include_once(MANAGERS."/NewsManager.php");
    include_once(MANAGERS."/GalleryManager.php");

    use manager\NewsManager;
    use manager\ProjectsManager;
    use manager\GalleryManager;
    //Project
    $main_project = ProjectsManager::getProjectWithId(9);
    $project_thumbnail = BASE_URL."/".$main_project["picture"];
    $project_name = $main_project["name".$lang];
    $project_desc = $main_project["description".$lang];
    //News
    $news = NewsManager::getAllNews();
    //gallery
    $albums = GalleryManager::getAllAlbums();
    ?>
<!DOCTYPE html>
<html lang="en">
<?php include(VIEWS."/partials/head.php")?>
<body>
<!-- Navigation Menu -->
<?php include(VIEWS."/partials/navbar.php"); ?>

<!-- Landing -->
<section id="landing" class="container-my landing">
    <div class="row">
        <div class="main-landing col-xs-12 col-sm-12 col-md-8">
            <a href="/project?ID=9">
                <div class="landing-photo" style="background-image: url(<?=$project_thumbnail?>)">
                    <div id="timer">
                        <div id="days"></div>
                        <span class="two-dots">:</span>
                        <div id="hours"></div>
                        <span class="two-dots">:</span>
                        <div id="minutes"></div>
                        <span class="two-dots">:</span>
                        <div id="seconds"></div>
                    </div>
                    <div class="landing-photo-thumbnail">
                        <span><?=$project_name?></span>
                        <?=$project_desc?>
                    </div>
                </div>
            </a>
        </div>
        <div class="gallery-landing col-xs-12 col-sm-12 col-md-4">
            <div class="row" style="justify-content: space-around;width: 100%">
                <?php for($i = 1; $i < count($albums) && $i < 5; $i++) {
                    $album_thumbnail = BASE_URL . $albums[$i]["defaultImage"];
                    $album_link = BASE_URL."album?ID=".$albums[$i]["ID"]; ?>
                    <div class="col-md-12 col-xs-3 col-sm-3 hui" style="padding:  0px;text-align: center">
                        <a href="<?=$album_link?>">
                            <div class="landing-gallery-photo" style="margin: auto;background-image: url(<?=$album_thumbnail?>)">
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="hide-on-mobile col-xs-12 col-sm-12 col-md-12"></div>
    </div>
</section>
<script>
    var countDownDate = new Date("Apr 10, 2020 23:59:59").getTime();
    var x = setInterval(function () {
        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("days").innerHTML = days;
        document.getElementById("hours").innerHTML = hours;
        document.getElementById("minutes").innerHTML = minutes;
        document.getElementById("seconds").innerHTML = seconds;

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            document.getElementById("timer").innerHTML = "EXPIRED";
        }
    },1000)
</script>
</body>
</html>