<?php
    include(LOCALE."/exportTranslator.php");
    include_once(MANAGERS."/GalleryManager.php");

    use manager\GalleryManager;

    $albums = GalleryManager::getAllAlbums();

    $videos = GalleryManager::getAllVideos();
 ?>
<!DOCTYPE html>
<html lang="en">
<?php include(VIEWS."/partials/head.php") ?>
<body>
    <!-- Static navbar -->
    <?php include(VIEWS."/partials/navbar.php") ?>
    <div id="top"></div>
    <!-- Portfolio -->
    <section id="gallery" class="gallery">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="header-y"><?=$translator->translate("ფოტო ალბომები")?></h2>
            <div class="row">
              <?php
                foreach($albums as $row){
                    //Skipping instagram
                    if($row["ID"] == 1) continue; ?>
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="portfolio-item" style="text-align: center">
                  <a href="<?="album?ID=".$row["ID"]?>" class="sel">
                      <div class="gallery-link" style="background-image: url(<?=$row["defaultImage"]?>);left: 50%;transform: translateX(-50%);"></div>
                      <div class="gallery-link" style="position: relative;margin: 0"></div>
                    <div class="gallery-descr"><span><?=$row["name" . $lang]?></span></div>
                      <div class="on-hov"></div>
                  </a>
                </div>
              </div>
              <?php } ?>
            </div>
            <!-- /.row (nested) -->
            <div class="row">
              <h2 class="header-y videos"><?=$translator->translate("ვიდეოები")?></h2>
              <hr class="small">
                
              <?php
                foreach ($videos as $row){ ?>
                  <div class="col-lg-6 col-md-6 col-xs-12">
                    <div class="portfolio-item">
                      <a href="#">
                      <iframe width="100%" height="315" src="<?=$row["URL"]?>" frameborder="0" allowfullscreen></iframe>
                      </a>
                    </div>
                  </div>
              <?php } ?>
                
            </div>
            <!-- /.row (nested) -->
          </div>
          <!-- /.row -->
        </div>
      </div>
      <!-- /.container -->
    </section>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>
  </body>
</html>