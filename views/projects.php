<?php
    include(LOCALE."/exportTranslator.php");
    include_once(CLASSES."/managers/ProjectsManager.php");
    use manager\ProjectsManager;

    $ongoing_projects = ProjectsManager::allProjectsWithStatus(1);
    if($ongoing_projects == null){
        require(VIEWS."/errors/500.shtml");
        exit();
    }

    $finished_projects = ProjectsManager::allProjectsWithStatus(0);
    if($finished_projects == null){
        require(VIEWS."/errors/500.shtml");
        exit();
    }

  ?>
<!DOCTYPE html>
<html lang="en">
<?php include(VIEWS."/partials/head.php")?>
  <body>
    <!-- Static navbar -->
    <?php include(VIEWS."/partials/navbar.php"); ?>
    <div id="top"></div>
    <!-- Portfolio -->
    <section id="gallery" class="gallery">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 id="current" class="header-y"><?= $translator->translate("მიმდინარე პროექტები") ?></h2>
            <hr class="small">
            <div class="row">
              <?php
                $ongoing_projects = array_reverse($ongoing_projects);
                foreach($ongoing_projects as $project){ ?>
                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="portfolio-item">
                      <a href="project?ID=<?=$project['ID']?>">
                          <div class="gallery-link" style="background-image: url(<?=$project["thumb"]?>);opacity: 0"></div>
                          <div class="gallery-link" style="position: relative;margin: auto;background-image: url(<?=$project["thumb"]?>)"></div>
                          <div class="gallery-descr proj proj-fix"><span><?=$project["name".$lang]?></span></div>
                      </a>
                      <div class="thumb-descr"><?=$project["description".$lang]?></div>
                    </div>
                  </div>
              <?php } ?>
            </div>
            <!-- /.row (nested) -->
            <h2 id="complete" class="header-y"><?= $translator->translate("განხორციელებული პროექტები") ?></h2>
            <hr class="small">
            <div class="row">
              <?php
                foreach($finished_projects as $project){ ?>
                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                    <div class="portfolio-item">
                      <a href="project?ID=<?=$project['ID']?>">
                          <div class="gallery-link" style="background-image: url(<?=$project["thumb"]?>);opacity: 0"></div>
                          <div class="gallery-link" style="position: relative;margin: auto;background-image: url(<?=$project["thumb"]?>)"></div>
                          <div class="gallery-descr proj proj-fix"><span><?=$project["name".$lang]?></span></div>
                      </a>
                      <div class="thumb-descr"><?=$project["description".$lang]?></div>
                    </div>
                  </div>
              <?php } ?>
            </div>
            <!-- /.row (nested) -->
          </div>
          <!-- /.col-lg-10 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>
    <section id="about" class="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="text-center header-y" id="infra"><?= $translator->translate("ინფრასტრუქტურული პროექტები") ?></h2>
            <div class="row">
              <div class="col-md-12 about-content-infra">
                <div class="col-sm-6" style="padding: 0">
                  <img class="img-responsive news-thumb" src="../img/homepage/featured1.jpg" alt="" style="margin: 0;border: none">
                </div>
                <div class="col-md-6 about-txt-infra" style="margin-top: 0px">
                  <h3><?= $translator->translate("საბავშვო ბაღი")?></h3>
                  <p><?= $translator->translate("თანამედროვე სტანდარტების საბავშვო ბაღი „ტრიდეს“ მორიგი ინფრასტრუქტურული პროექტია,რომელიც „დიღმის პარკში“ცხოვრებას კიდევ უფრო კომფორტულს ხდის. 150 ბავშვზე გათვლილი ბაღი ფუნქციონირებს 2016წლის 1 ოქტომბრიდან. მეტი ინფორმაციისთვის დაუკავშირდით ბაღის ადმინისტრაციას.")?>
                  <ul>
                    <li><?= $translator->translate("ტელეფონი")?>: 599 05 07 08</li>
                    <li><?= $translator->translate("ელ-ფოსტა")?>: wpreschool@yahoo.com</li>
                  </ul>
                  <ul class="soc-share">
                    <li><a id="fb_share" target="_blank" class="btn btn-md social btn-fb" href="https://facebook.com/wpreschooltbilisi"><i class="fa fa-facebook-square"></i> Facebook</a></li>
                    <li><a id="gg_share" target="_blank"  class="btn btn-md social btn-ggl" href="https://goo.gl/lGlZQD"><i class="fa fa-map-marker"></i> <?= $translator->translate("ბელიაშვილის ქ. 22")?></a></li>
                  </ul>
                  </p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 about-content-infra" style="margin-top: 20px">
                <div class="col-md-6 about-txt-infra" style="margin-top: 0px">
                  <h3><?= $translator->translate("ჰაუს მარკეტი")?></h3>
                  <p><?= $translator->translate("\"ტრიდე ჯგუფის\" მიზანი და აუცილებელი პირობა, მომხმარებლისათვის მაქსიმალური კომფორტისა და სასიამოვნო გარემოს შექმნაა. <br>სწორედ მომხმარებლისათვის დამატებითი კომფორტის შესაქმნელად , 2014 წლის დეკემბრიდან ჩვენივე კომპლექსის \"ბ\" კორპუსის პირველ სართულზე გაიხსნა ადგილობრივი ბრენდი - \"ჰაუს მარკეტი\". <br>სუპერმარკეტი 750 კვ.მ ზეა განლაგებული და წარმოდგენილია ათასობით დასახელების პროდუქტი. მომხმარებელს შეუძლია შეიძინოს, როგორც სასურსათო და საოჯახო, ასევე, საკონდიტრო ნაწარმი და მზა პროდუქტები. <br>მომხმარებელს ასევე შეუძლია ისარგებლოს მარკეტში მოქმედი კაფით.")?>
                  <ul>
                    <li><?= $translator->translate("ტელეფონი")?>: 595 02 03 23</li>
                  </ul>
                  <ul class="soc-share">
                    <li><a id="fb_share" target="_blank" class="btn btn-md social btn-fb" href="https://www.facebook.com/pg/ჰაუს-მარკეტი-259137797861394"><i class="fa fa-facebook-square"></i> Facebook</a></li>
                    <li><a id="gg_share" target="_blank"  class="btn btn-md social btn-ggl" href="https://goo.gl/zUUCvY"><i class="fa fa-map-marker"></i> <?= $translator->translate("ლუბლიანას ქ. 11")?></a></li>
                  </ul>
                  </p>
                </div>
                <div class="col-sm-6" >
                  <img class="img-responsive news-thumb" src="img/projects/housemarket.jpg" alt="" style="margin: 0;border: none">
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
    <section class="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="text-center header-y" id="plan"><?= $translator->translate("გენერალური გეგმა") ?></h2>
            <hr class="small">
            <div class="row">
              <div class="col-md-12">
                <img class="img-responsive news-thumb" src="img/projects/majorplan.jpg" alt="">
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
    <!-- Modal tride tbilisi section select -->
    <div id="section-select" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">აირჩიეთ სექცია</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="portfolio-item">
                  <h3 class="text-center">სექცია "ა"</h3>
                  <a href="#">
                  <img class="img-portfolio img-responsive" src="img/projects/thumbs/sectionA.png" alt="sectionA">
                  </a>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="portfolio-item">
                  <h3 class="text-center">სექცია "ბ"</h3>
                  <a href="#">
                  <img class="img-portfolio img-responsive" src="img/projects/thumbs/sectionB.png" alt="sectionB">
                  </a>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="portfolio-item">
                  <h3 class="text-center">სექცია "გ"</h3>
                  <a href="#">
                  <img class="img-portfolio img-responsive" src="img/projects/thumbs/sectionG.png" alt="sectionG">
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal">უკან</button>
          </div>
        </div>
      </div>
    </div>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>
  </body>
</html>