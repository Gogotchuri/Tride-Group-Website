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
            <h2><?=$translator->translate("ფოტო ალბომები")?></h2>
            <hr class="small">
            <div class="row">
              <?php
                foreach($albums as $row){ ?>
              <div class="col-lg-4 col-md-4 col-xs-6">
                <div class="portfolio-item">
                  <a href="<?="album?ID=".$row["ID"]?>">
                    <img class="img-portfolio img-responsive" src="<?=$row["defaultImage"]?> " alt="პანორამა 3">
                    <div class="gallery-descr"><span><?=$row["name" . $lang]?></span></div>
                  </a>
                </div>
              </div>
              <?php } ?>
            </div>
            <!-- /.row (nested) -->
            <div class="row">
              <h2><?=$translator->translate("ვიდეოები")?></h2>
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
    <!-- Footer -->
    <?php include(VIEWS."/partials/footer.php") ?>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>
  </body>
</html>