<?php
include ROOT.'/database.php';
include ROOT.'/texts.php';
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
    <meta name="description" content="სამშენებლო კომპანია „ტრიდე“ 2007 წელს დაარსდა. სადღეისოდ იგი მზარდ დინამიურ ორგანიზაციას წარმოადგენს, რომელიც სამშენებლო ბაზარზე ფართომასშტაბიან სამუშაოებს ახორციელებს. Founded in 2007 TRIDE building company has grown into a dynamically developing organization that has been implementing large-scale projects in the development market. Строительная компания «Триде» была основана в 2007 году. На сегодняшний день она представляет собой растущую динамичную организацию, которая осуществляет широкомасштабные работы на строительном рынке.">
    <meta name="keywords" content="Building company, tride, TRIDE, tride group, building company in tbilisi, apartments, flats, green house, digmis masivi, digomi, Строительная компания, ТРИД, TRIDE, ТРИД группа, строительная компания в Тбилиси, квартиры, квартиры, зеленый дом, digmis masivi, дигоми, სამშენებლო კომპანია, tride, ტრიდე, tride ჯგუფი, სამშენებლო კომპანია თბილისი, ბინა, ბინები, მწვანე სახლი, დიღმის მასივი, დიღმის მასივი">
    <meta name="author" content="SUPHRA.GE">

    <!-- Facebook -->
    <meta property="og:url" content="http://tridegroup.ge" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="http://tridegroup.ge/img/icons/ogimage.png" />

    <!-- Google -->
    <meta name="copyright" content="tride GROUP">
    <meta name="topic" content="Building">
    <meta name="Classification" content="Business">
    <meta name="url" content="http://tridegroup.ge">
    <meta name="identifier-URL" content="http://tridegroup.ge">
    <meta name="category" content="Building, Real estate">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>tride Group - <?= $translator->translate("სამშენებლო კომპანია")?></title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/stylish-portfolio.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <link href="img/icons/favicon.png" rel="shortcut icon">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="application/ld+json">
        {
            "@context":"http://schema.org",
            "@type":"Organization",
            "name":"tride GROUP",
            "legalName":"tride LTD",
            "url":"http://www.tridegroup.ge",
            "logo":"http://www.tridegroup.ge/img/icons/logo.png",
            "foundingDate":"2007",
            "address":{
                "@type":"PostalAddress",
                "streetAddress":"11 Lubliana Street",
                "addressLocality":"Tbilisi",
                "addressCountry":"Georgia"
            },
            "contactPoint":{
                "@type":"ContactPoint",
                "contactType":"customer support",
                "telephone":"[+995-599-675-675]",
                "email":"info@tridegroup.ge"
            },
            "sameAs":[
                "http://www.facebook.com/trideGROUP",
                "http://instagram.com/tridedevelopment",
                "https://www.youtube.com/channel/UC4EmhoWfCIjmGmY2XhizRgg",
                "https://plus.google.com/113898620613857324061"
            ]
        }
    </script>
</head>
<body>
<div id="preload">
    <img src="img/slider/1.png">
    <img src="img/slider/2.png">
    <img src="img/slider/3.png">
    <img src="img/slider/4.png">
</div>
<!-- Static navbar -->
<?php include VIEWS . "/partials/navbar.php" ?>
<div id="top"></div>
<header class="header">
    <ul id="bullets">
        <li><a id="bullet1" class="active" href="#"></a></li>
        <li><a id="bullet2" href="#"></a></li>
        <li><a id="bullet3" href="#"></a></li>
        <li><a id="bullet4" href="#"></a></li>
    </ul>
    <div class="text-vertical-center">
        <div class="vertical-line"></div>
        <h1 id="intro"><?= $translator->translate("ჩვენ ვქმნით თქვენთვის")?> <br><span id="text-dynamic"></span></h1>
        <br>
        <p id="text-small"><?= $translator->translate("სამშენებლო კომპანია „ტრიდე“ 2007 წელს დაარსდა. სადღეისოდ იგი მზარდ დინამიურ ორგანიზაციას წარმოადგენს, რომელიც სამშენებლო ბაზარზე ფართომასშტაბიან სამუშაოებს ახორციელებს.") ?></p>
        <div class="vertical-line"></div>
        <br>
        <a href="#about" class="btn btn-dark btn-lg"><?= $translator->translate("გაიგეთ მეტი")?> <i class="fa fa-angle-down"></i></a>
    </div>
</header>
<!-- About -->
<section id="about" class="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-lg-offset-1">
                <h2 class="text-center"><?= $translator->translate("ჩვენს შესახებ")?></h2>
                <hr class="small">
                <div class="row">
                    <div class="col-md-12 about-content">
                        <div class="col-md-3">
                            <img class="img-responsive about-img ceo" src="img/icons/logo.png" alt="Company CEO">
                        </div>
                        <div class="col-md-9 about-txt">
                            <p><?= $translator->translate("სამშენებლო კომპანია „ტრიდე“ 2007 წელს დაარსდა. სადღეისოდ იგი მზარდ დინამიურ ორგანიზაციას წარმოადგენს, რომელიც სამშენებლო ბაზარზე ფართომასშტაბიან სამუშაოებს ახორციელებს. შექმნის დღიდან „ტრიდე“ ქმნის ინოვაციურ და ორიგინალურ პროექტებს, რომელშიც თანამედროვე არქიტექტურისა და ბინათმშენებლობის მოთხოვნები შერწმულია მომხმარებლების ყველა სურვილსა და საჭიროებასთან.")?></p>
                            <hr>
                            <a href="about.php" class="btn btn-yellow"><?= $translator->translate("უფრო ვრცლად")?> <i class="fa fa-angle-right"></i></a>
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
<!-- Portfolio -->
<section id="gallery" class="gallery">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2><?= $translator->translate("გალერეა")?></h2>
                <hr class="small">
                <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <div class="portfolio-item">
                            <a href="gallery.php"><img class="img-portfolio img-responsive" src="img/homepage/featured3.jpg"></a>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="portfolio-item">
                            <a href="gallery.php"><img class="img-portfolio img-responsive" src="img/homepage/featured1.jpg"></a>
                        </div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="portfolio-item">
                            <a href="gallery.php"><img class="img-portfolio img-responsive" src="img/homepage/featured2.jpg"></a>
                        </div>
                    </div>
                </div>
                <!-- /.row (nested) -->
                <a href="gallery.php" class="btn btn-dark"><?= $translator->translate("სრულად ნახვა")?> <i class="fa fa-angle-right"></i></a>
            </div>
            <!-- /.col-lg-10 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- contact -->
<section id="contact" class="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2 class="text-center"><?= $translator->translate("კონტაქტი")?></h2>
                <hr class="small">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        //if "email" variable is filled out, send email
                        if (isset($_REQUEST['email']))  {

                            //Email information
                            $admin_email = "tamta@tridegroup.ge";
                            $email = $_REQUEST['email'];
                            $subject = $_REQUEST['subject'];
                            $comment = $_REQUEST['comment'];

                            //send email
                            mail($admin_email, "$subject", $comment, "From:" . $email);

                            //Email response
                            //echo "The message has been sent!";
                            echo "<meta http-equiv='refresh' content='0'>";
                        }

                        //if "email" variable is not filled out, display the form
                        else  {
                            ?>
                            <form method="post" id="contact_form">
                                <div class="form-group">
                                    <label><?= $translator->translate("სახელი")?>:</label>
                                    <input type="text" name="subject" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label><?= $translator->translate("ელ-ფოსტა")?>:</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label><?= $translator->translate("შეტყობინება")?>:</label>
                                    <textarea name="comment" class="form-control" required></textarea>
                                </div>
                                <span id="mail-status"><?= $translator->translate("ყველა ველის შევსება აუცილებელია")?>!</span>
                                <button type="submit" class="btn btn-dark"><?= $translator->translate("გაგზავნა")?></button>
                            </form>
                            <?php
                        }
                        ?>
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
<!-- Map -->
<section id="mapcont" class="map">
    <div id="map"></div>
</section>
<!-- Footer -->
<?php include "footer.php" ?>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/gmap.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvkK_S9xUxn4AkfIl3GswOmFjaJz49sqw&callback=initMap"></script>
<script src="js/gmap.js"></script>
<script src="js/custom.js"></script>
<script src="js/typed.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        Typed.new('#text-dynamic', {
            strings: ["<?= $translator->translate("მყუდრო გარემოს")?>^2000", "<?= $translator->translate("ხარისხიან ინფრასტრუქტურას")?>^4000", "<?= $translator->translate("თანამედროვე დიზაინს")?>^2000", "<?= $translator->translate("ტრიდე ჯგუფი")?>"],
            typeSpeed: 20
        });
    });
</script>
</body>
</html>