<?php
  include '../classes/database/database.php';
  include '../texts.php';
  
  $database = new mysqli($host, $user, $password, $db);
  if ($database->connect_errno)
  {
    printf ("Failed to connect to MySQL: %s\n" , $database->connect_error);
    exit();
  }
  $database->set_charset("utf8mb4");
  $query = "SELECT * FROM news ORDER BY pubdate DESC";
  if(!($updates = $database->query($query))){
    printf("Database not configured correctly");
    exit();
  }
  ?>
<!DOCTYPE html>
<html lang="en">
<?php include(VIEWS."/partials/head.php") ?>
<body>
      <!-- fb embed video post -->
      <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0&appId=131438797540054&autoLogAppEvents=1';
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        
    <?php include "navigation.php" ?>
    <div id="top"></div>
    <!-- About -->
    <section id="about" class="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="text-center"><?= $translator->translate("სიახლეები") ?></h2>
            <hr class="small">
            <div class="row">
              <?php
                while($row = $updates->fetch_array()){ ?>
              <div itemscope itemtype="http://schema.org/Article" class="col-md-12 about-content">
                <div class="col-sm-5 col-md-5">
                  <img itemprop="image" class="img-responsive news-thumb" src="<?=$row["image"]?>" alt="<?= $row["header".$lang] ?>">
                </div>
                <div class="col-md-7 about-txt">
                  <h4 itemprop="title"><?= $row["header".$lang] ?></h4>
                  <span class="news-date"><?= date_format(date_create($row["pubdate"]), "d/m/Y") ?></span>
                  <?= $row["html".$lang] ?>
                </div>
              </div>
              <?php  }
                ?>
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
    <?php include("footer.php") ?>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>
    <script>
      var socHTML = "<ul class='soc-share'> <li><a target='_blank' class='fb_share btn btn-md social btn-fb' href='https://www.facebook.com/share.php?u=http://tridegroup.ge/updates.php'><i class='fa fa-facebook-square'></i> Share</a></li><li><a target='_blank' class='tw_share btn btn-md social btn-twt' href='https://twitter.com/intent/tweet?url=http://tridegroup.ge/updates.php'><i class='fa fa-twitter'></i> Tweet</a></li></ul>"
      $(document).ready(function() {
            $('.about-txt').append(socHTML);
        });
    </script>
  </body>
</html>