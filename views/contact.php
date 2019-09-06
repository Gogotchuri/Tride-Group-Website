<?php include(LOCALE."/exportTranslator.php");?>
<!DOCTYPE html>
<html lang="en">
  <?php include(VIEWS."/partials/head.php") ?>
  <body>
    <!-- Static navbar -->
    <?php include(VIEWS."/partials/navbar.php") ?>
    <div id="top"></div>
    <!-- Contact us -->
    <section id="contact-us" class="contact-us">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-5">
                        <h2 class="header-y contact-us-header"><?=$translator->translate("კონტაქტი")?></h2>
                        <p class="contact-us-info">
                            <?=$translator->translate("ტელეფონი")?> : (+995) 599675675; 2 309090; 2 239091
                            <br>
                            <?=$translator->translate("სათავო ოფისი")?> : <?=$translator->translate("ლუბლიანას ქ. 11")?>
                            <br>
                            <?=$translator->translate("ელ-ფოსტა")?> : info@tridegroup.ge
                        </p>
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
                            <form method="post" class="contact-us-form">
                                <div>
                                    <input type="text" name="subject" placeholder="<?= $translator->translate("სახელი")?>" required>
                                </div>
                                <div>
                                    <input type="email" name="email" placeholder="<?= $translator->translate("ელ-ფოსტა")?>" required>
                                </div>
                                <div>
                                    <textarea name="comment" <?= $translator->translate("შეტყობინება")?> required></textarea>
                                </div>
                                <span id="mail-status"><?= $translator->translate("ყველა ველის შევსება აუცილებელია")?>!</span>
                                <button type="submit" ><?= $translator->translate("გაგზავნა")?></button>
                            </form>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="col-md-7">
                        <div id="mapcont" class="map">
                            <div id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvkK_S9xUxn4AkfIl3GswOmFjaJz49sqw&callback=initMap"></script>
    <script src="../js/gmap.js"></script>
  </body>
</html>
