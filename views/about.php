<?php include(LOCALE."/exportTranslator.php"); ?>
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
            <h2 class="header-y"><?=$translator->translate("ჩვენ შესახებ")?></h2>
              <hr class="small">
            <div class="row">
              <div class="col-md-4 about-nav">
                <ul class="nav nav-pills nav-stacked">
                  <li class="active"><a href="#" onclick="$('#about_cont').empty().load(tridegroup);"><?=$translator->translate("ტრიდე ჯგუფი")?></a></li>
                  <li><a href="#" onclick="$('#about_cont').empty().load(contactinfo);"><?=$translator->translate("საკონტაქტო ინფორმაცია")?></a></li>
                  <li><a href="#" onclick="$('#about_cont').empty().load(services);"><?=$translator->translate("ჩვენი სერვისები")?></a></li>
                  <li><a href="#" onclick="$('#about_cont').empty().load(infra);"><?=$translator->translate("მდებარეობა და ინფრასტრუქტურა")?></a></li>
                  <li><a href="#" onclick="$('#about_cont').empty().load(materials);"><?=$translator->translate("სამშენებლო მასალები და ტექნოლოგიები")?></a></li>
                  <li><a href="#" onclick="$('#about_cont').empty().load(FAQ);"><?=$translator->translate("ხშირად დასმული შეკითხვები")?></a></li>
                  <li><a href="#" onclick="$('#about_cont').empty().load(suggestions);"><?=$translator->translate("რჩევები მყიდველს")?></a></li>
                </ul>
              </div>
              <div class="col-md-8 about-content" id="about_cont">
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
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>
    <script>
      $(document).ready(function() {
          $("#about_cont").empty().load(tridegroup);
      });
        $('.nav-stacked li').click(function() {
      $('.nav-stacked li').removeClass('active');
        $(this).addClass('active');
      });
      var tridegroup = "about/<?=$lang?>/tridegroup.html";
      var contactinfo = "about/<?=$lang?>/contactinfo.html";
      var services = "about/<?=$lang?>/services.html";
      var infra = "about/<?=$lang?>/infra.html";
      var materials = "about/<?=$lang?>/materials.html";
      var FAQ = "about/<?=$lang?>/faq.html";
      var suggestions = "about/<?=$lang?>/suggestion.html";
    </script>
  </body>
</html>