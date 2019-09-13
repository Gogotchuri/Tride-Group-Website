<?php
    include(LOCALE."/exportTranslator.php");
    include_once(MANAGERS."/ProjectsManager.php");
    use manager\ProjectsManager;

    if(!isset($_GET["ID"]))
       header("Location: projects");

    $ID = intval($_GET["ID"]);

    $project = ProjectsManager::getProjectWithId($ID);

    if($project == null){
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
      <div class="navContainer">
        <div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-md-12 col-xs-12 col-sm-12 about-content about-content-project" style="background-color: transparent">
                <div class="col-md-5">
                  <div id="wrap">
                    <img src="<?=BASE_URL.$project["picture"]?>" class="img-responsive mapimage" id="panorama3" usemap="#panorama3map" />
                  </div>
                    <div style="text-align: center" class="under-photo-project">
                        <?php if($project["status"]){?>
                            <a href="/apartments?projectID=9"><?= $translator->translate("ბინის არჩევა") ?></a>
                        <?php }?>
                    </div>
                </div>
                <div class="col-md-7 col-xs-12 col-sm-12 about-project">
                    <h2 class="about-project-header"><?=$project["name" . $lang]?></h2>
                    <div>
                        <?=(strlen($project["descriptionLarge" . $lang]) < 10)? $project["descriptionLargeKA"] : $project["descriptionLarge" . $lang]?>
                        <?php if($project["status"]){?>
                            <a href="/apartments?projectID=9"><?= $translator->translate("ბინის არჩევა") ?></a>
                        <?php }?>
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
  </body>
</html>