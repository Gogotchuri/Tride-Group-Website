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
    $project_thumbnail = BASE_URL."/".$main_project["thumb"];
    $project_name = $main_project["name".$lang];
    $project_desc = $main_project["description".$lang];
    //News
    $news = NewsManager::getAllNews();

    for($i = 0; $i < count($news) && $i < 2; $i++){
        $row = $news[$i];
        $news_title = $row["header".$lang];
        $news_thumbnail = BASE_URL."/".$row["image"];
        $news_description = substr($row["html".$lang], 0, 40); //cut to fit
    }

    //gallery
    $albums = GalleryManager::getAllAlbums();
    for($i = 1; $i < count($albums) && $i < 3; $i++) {
        $album_thumbnail = BASE_URL . "/" . $albums[$i]["defaultImage"];
        $album_link = BASE_URL."/album?ID=".$albums[$i]["ID"];
    }

    ?>
<!DOCTYPE html>
<html lang="en">
<?php include(VIEWS."/partials/head.php")?>
<body>
<!-- Navigation Menu -->
<?php include(VIEWS."/partials/navbar.php"); ?>
</body>
</html>