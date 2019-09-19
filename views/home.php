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
<section class="new-landing">
    <a href="/project?ID=9" class="new-landing-main" style="background: url(<?=$project_thumbnail?>)">
        <img src="<?=$project_thumbnail?>" style="opacity: 0">
        <div id="timer">
            <span><?=$translator->translate("დარჩენილია")?></span>
            <div id="days"></div>
            <span class="two-dots">:</span>
            <div id="hours"></div>
            <span class="two-dots">:</span>
            <div id="minutes"></div>
            <span class="two-dots">:</span>
            <div id="seconds"></div>
        </div>
    </a>
    <div class="new-landing-right">
        <div class="new-landing-header">
            <p><?=$project_name?></p>
        </div>
        <div class="new-landing-moto">
            „სახლი ბელიაშვილზე“ - ეს არის უახლესი ტიპის მრავალფუნქციური შენობა თბილისის საქმიან ნაწილში, სადაც წარმატებით ერთიანდება საბინაო და ბიზნეს ფორმატები.
        </div>
        <div class="new-landing-learn-more" >
            <a href="/project?ID=9"><?=$translator->translate("გაიგე მეტი")?></a>
        </div>
        <div class="popular-land">
            <div class="popular-head"><?=$translator->translate("პოპულარული ბინები")?></div>
            <div class="popular-slider slider-container">
                <div class="mySlide fade">
                    <img src="../img/homepage/slider/1.png" style="width: 100%;height: 100%"">
                </div>
                <div class="mySlide fade">
                    <img src="../img/homepage/slider/2.png" style="width: 100%;height: 100%"">
                </div>
                <div class="mySlide fade">
                    <img src="../img/homepage/slider/3.png" style="width: 100%;height: 100%">
                </div>
                <div class="mySlide fade">
                    <img src="../img/homepage/slider/4.png" style="width: 100%;height: 100%">
                </div>

                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
        </div>
    </div>
</section>
<!-- /Landing-->

<script>
    // Countdown timer
    var countDownDate = new Date("Dec 30, 2019 23:59:59").getTime();
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
    },1000);

    //
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("mySlide");
        if (n > slides.length) {slideIndex = 1}
        if (n < 1) {slideIndex = slides.length}
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex-1].style.display = "block";
    }

    setInterval(function () {
        plusSlides(1);
    },5000);
</script>
</body>
</html>