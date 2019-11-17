<?php
    include(LOCALE."/exportTranslator.php");
    include_once(MANAGERS."/GalleryManager.php");
    use manager\GalleryManager;

    if(!isset($_GET["ID"])) header("Location: gallery");
    $id = intval($_GET["ID"]);
    $album = GalleryManager::getAlbumById($id);
    if($album == null){
        require(VIEWS."/errors/404.shtml");
        exit();
    }

    $root = $album["images"];
    $real_root = ROOT."/".$root;
    try{
        $imgs = scandir($real_root);
        for($i=0;$i<count($imgs);$i++) {
            $imgs[$i] = BASE_URL."/".$root . $imgs[$i];
        }
    }catch(\ErrorException $e){
        $imgs = [];
    }

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
          <div class="col-lg-12 text-center album">
            <h2 class="header-y"><?=$album["name" . $lang]?></h2>
            <div class="row">
              <?php for($i=2;$i<count($imgs);$i++){?>
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="portfolio-item">
                  <a href="<?=$imgs[$i]?>" data-toggle="lightbox" data-gallery="example-gallery">
                      <div class="gallery-link" style="background-image: url(<?=$imgs[$i]?>);left: 50%;transform: translateX(-50%);"></div>
                      <div class="gallery-link" style="position: relative;margin: 0"></div>
                      <div class="on-hov"></div>
                  </a>
                </div>
              </div>
              <?php } ?>
              <!-- /.row (nested) -->
            </div>
            <!-- /.col-lg-10 -->
          </div>
          <!-- /.row -->
        </div>
      </div>
      <!-- /.container -->
    </section>
    <div class="ft-wkr"></div>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>
    <script src="../js/ekko-lightbox.min.js"></script>
    <script>
      $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox();
      });
    </script>
  </body>
</html>