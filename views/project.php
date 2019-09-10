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
    <section id="about" class="about" style="padding-top: 30px">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-md-12 col-xs-12 col-sm-12 about-contento">
                <div class="col-md-5">
                  <div id="wrap">
                    <img src="<?=BASE_URL.$project["thumb"]?>" class="img-responsive mapimage" id="panorama3" usemap="#panorama3map" />
                  </div>
                </div>
                <div class="col-md-7 col-xs-12 col-sm-12 about-project">
                    <h2 class="about-project-header"><?=$project["name" . $lang]?></h2>
                    <div><?=$project["descriptionLarge" . $lang]?><!--                  TODO  -->
                        <a href=""><?= $translator->translate("ბინის არჩევა") ?></a>
                    </div>
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
        <div class="modal-contento">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="floorTitle"></h4>
          </div>
          <div class="modal-body">
            <a id="goto" href="/apartments"><img id="floorImage" src="img/projects/panorama3/fl2.png" class="img-responsive modal-floor-img"></a>
          </div>
          <div class="modal-footer">
            <a class="btn btn-dark" data-dismiss="modal"><?= $translator->translate("უკან")?></a>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
    </div>
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
          $("#goto").attr("href", "/apartments?projectID=<?=$_GET["ID"]?>&ID="+ID);
        }
      }
    </script>
    <script type="text/javascript" src="../js/map-resizer.js"></script>
  </body>
</html>