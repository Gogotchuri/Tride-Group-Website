<?php
  include ROOT.'/database.php';
  include  ROOT.'/texts.php';

  $database = new mysqli($host, $user, $password, $db);
  if ($database->connect_errno)
  {
    printf ("Failed to connect to MySQL: %s\n" , $database->connect_error);
    exit();
  }
  $database->set_charset("utf8");
  $query = "SELECT * FROM projects WHERE status = 1";
  if(!($updates_current = $database->query($query))){
    printf("Database not configured correctly");
    exit();
  }
  $query = "SELECT * FROM projects WHERE status = 0";
  if(!($updates_ = $database->query($query))){
    printf("Database not configured correctly");
    exit();
  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-50741180-3"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      
      gtag('config', 'UA-50741180-3');
    </script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>tride Group - <?= $translator->translate("პროექტები") ?></title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/stylish-portfolio.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">
    <link href="../img/icons/favicon.png" rel="shortcut icon">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- Static navbar -->
    <?php include "navigation.php" ?>
    <div id="top"></div>
    <!-- Portfolio -->
    <section id="gallery" class="gallery">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 id="current"><?= $translator->translate("მიმდინარე პროექტები") ?></h2>
            <hr class="small">
            <div class="row">
              <?php
                while($row = $updates_current->fetch_array()){ ?>
              <div class="col-lg-4 col-md-4 col-xs-6">
                <div class="portfolio-item">
                  <a href="project.php?ID=<?=$row['id']?>">
                    <img class="img-portfolio img-responsive" src="<?=$row["thumb"]?>" alt="panorama3">
                    <div class="gallery-descr"><span><?=$row["name".$lang]?></span></div>
                  </a>
                  <div class="thumb-descr"><?=$row["description".$lang]?></div>
                </div>
              </div>
              <?php } ?>
            </div>
            <!-- /.row (nested) -->
            <h2 id="complete"><?= $translator->translate("განხორციელებული პროექტები") ?></h2>
            <hr class="small">
            <div class="row">
              <?php
                while($row = $updates_->fetch_array()){ ?>
              <div class="col-lg-4 col-md-4 col-xs-6">
                <div class="portfolio-item">
                  <a href="project.php?ID=<?=$row['id']?>">
                    <img class="img-portfolio img-responsive" src="<?=$row["thumb"]?>" alt="panorama3">
                    <div class="gallery-descr"><span><?=$row["name".$lang]?></span></div>
                  </a>
                  <div class="thumb-descr"><?=$row["description".$lang]?></div>
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
            <h2 class="text-center" id="infra"><?= $translator->translate("ინფრასტრუქტურული პროექტები") ?></h2>
            <hr class="small">
            <div class="row">
              <div class="col-md-12 about-content">
                <div class="col-sm-6">
                  <img class="img-responsive news-thumb" src="../img/homepage/featured1.jpg" alt="">
                </div>
                <div class="col-md-6 about-txt">
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
              <div class="col-md-12 about-content">
                <div class="col-md-6 about-txt">
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
                <div class="col-sm-6">
                  <img class="img-responsive news-thumb" src="img/projects/housemarket.jpg" alt="">
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
            <h2 class="text-center" id="plan"><?= $translator->translate("გენერალური გეგმა") ?></h2>
            <hr class="small">
            <div class="row">
              <div class="col-md-12 about-content">
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
    <!-- Footer -->
    <?php include "footer.php" ?>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>
  </body>
</html>