<?php
    include(LOCALE."/exportTranslator.php");
    include_once(MANAGERS."/ProjectsManager.php");
    use manager\ProjectsManager;

    if(!isset($_GET["ID"]))
       header("Location: projects");

    $ID = intval($_GET["ID"]);

    $floors = ProjectsManager::getFloorsWithProjectId($ID);
    $project = ProjectsManager::getProjectWithId($ID);

    if($floors == null || $project == null){
        require(VIEWS."/errors/404.shtml");
        exit();
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<?php include(VIEWS."/partials/head.php") ?>
<body>
    <!-- Static navbar -->
    <?php include(VIEWS."/partials/navbar.php") ?>
    <div id="top"></div>
    <!-- About -->
    <section id="about" class="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="header-y"><?=$project["name" . $lang]?></h2>
            <hr class="small">
            <div class="row">
              <div class="col-md-12 about-content">
                <div class="col-md-5">
                  <div id="wrap">
                    <span class="floor_num">№ </span>
                    <img src="<?=BASE_URL.$project["picture"]?>" class="img-responsive mapimage" id="panorama3" usemap="#panorama3map" />
                    <?=$project["map"]?>
                    <span class="small small-info"><?= $translator->translate("კონკრეტული სართულის სქემის სანახავად დააჭირეთ შესაბამის სართულს ფოტოზე.")?></span>
                  </div>
                </div>
                <div class="col-md-7 about-project">
                  <?=$project["descriptionLarge" . $lang]?>
                </div>
              </div>
            </div>
            <!-- /.row (nested) -->
          </div>
          <!-- /.col-lg-8 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <!-- Footer -->
    <!-- modal კონკრეტული სართულის სქემა -->
    <div class="modal fade floor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="floorTitle"></h4>
          </div>
          <div class="modal-body">
            <a id="goto" href="floor"><img id="floorImage" src="img/projects/panorama3/fl2.png" class="img-responsive modal-floor-img"></a>
          </div>
          <div class="modal-footer">
            <a class="btn btn-dark" data-dismiss="modal"><?= $translator->translate("უკან")?></a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
    </div>
    <div class="ft-wkr"></div>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>
    <script type="text/javascript" src="../js/jquery.rwdImageMaps.js"></script>
    <script type="text/javascript" src="../js/jquery.maphilight.js"></script>
    <script type="text/javascript" src="../js/project.js"></script>
    <script>
      data =<?= json_encode($floors) ?>;
      $("area").on("click", function(e){
        var ID = $(e.target).prop("id");
        openModal(ID);
      });
      function openModal(ID){
        if(ID in data){
          $("#floorImage").attr("src", data[ID].image);
          $("#floorTitle").html(data[ID].description<?=$lang?>);
          $(".floor").modal("show");
          $("#goto").attr("href", "floor?projectID=<?=$_GET["ID"]?>&ID="+ID);
        }
      }
    </script>
    <script type="text/javascript" src="../js/map-resizer.js"></script>
  </body>
</html>