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
<section id="landing" class="landing">
    <div class="row">
        <div class="main-landing col-xs-12 col-sm-12 col-md-8">
            <a href="/project?ID=9">
                <div class="landing-photo" style="background-image: url(<?=$project_thumbnail?>)">
                    <div class="landing-photo-thumbnail">
                        <span><?=$project_name?></span>
                        <?=$project_desc?>
                    </div>
                </div>
            </a>
        </div>
        <div class="gallery-landing col-xs-12 col-sm-12 col-md-4">
            <div class="row" style="justify-content: space-around">
                <?php for($i = 1; $i < count($albums) && $i < 5; $i++) {
                    $album_thumbnail = BASE_URL . $albums[$i]["defaultImage"];
                    $album_link = BASE_URL."album?ID=".$albums[$i]["ID"]; ?>
                    <div class="col-md-12 col-xs-3 col-sm-3 hui" style="padding-left: 2px;padding-right: 2px;">
                        <a href="<?=$album_link?>">
                            <div class="landing-gallery-photo" style="background-image: url(<?=$album_thumbnail?>)">
                            </div>
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="hide-on-mobile col-xs-12 col-sm-12 col-md-12"></div>
        <div class="news-landing col-xs-12 col-sm-12">
            <div class="row">
            <?php  for($i = 2; $i < count($news) && $i < 4; $i++){
                $row = $news[$i];
                $news_title = $row["header".$lang];
                $news_thumbnail = BASE_URL.$row["image"];
                $news_description = substr($row["html".$lang], 0, 50)."..."; //cut to fit ?>
                 <div class="col-xs-12 col-sm-12 col-md-5" style="padding: 0" >
                        <div class="row">
                            <a href="/updates">
                                <div class="landing-news-photo col-sm-12 col-xs-12 col-md-5" style="background-image: url(<?=$news_thumbnail?>)"></div>
                            </a>
                            <div class="landing-newsbot col-sm-12 col-xs-12 col-md-7">
                                <a href="/updates">
                                    <span class="landing-news-title"><?=$news_title?></span>
                                </a>
                                <div class="landing-news-body"><?=$news_description?></div>
                            </div>
                        </div>
                 </div>
            <?php } ?>
                <div class="col-xs-12 col-sm-12 col-md-2" style="position: relative; height: 120px">
                    <a href="/updates" class="header-y">
                        <?= $translator->translate("ყველა სიახლე") ?><img src="../img/icons/arrow-left.svg" style="margin-left: 10px">
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>