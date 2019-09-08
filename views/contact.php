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
                            <div class="contact-us-form">
                                <div>
                                    <input type="text" id="contact_name" placeholder="<?= $translator->translate("სახელი")?>" required>
                                </div>
                                <div>
                                    <input type="email" id="contact_email" placeholder="<?= $translator->translate("ელ-ფოსტა")?>" required>
                                </div>
                                <div>
                                    <textarea name="comment" id="contact_message" minlength="10" placeholder="<?= $translator->translate("შეტყობინება")?>" required></textarea>
                                </div>
                                <span id="mail-status"><?= $translator->translate("ყველა ველის შევსება აუცილებელია")?>!</span>
                                <button onclick="sendContact()" ><?= $translator->translate("გაგზავნა")?><img src="../img/icons/arrow-left.svg"></button>
                            </div>

                            <div class="contact-us-call">
                                <h3 class="header-y"><?= $translator->translate("შეუკვეთე ზარი")?></h3>
                                <div>
                                    <input id="contact_call_name" placeholder="<?= $translator->translate("სახელი")?>" required>
                                </div>
                                <div>
                                    <input type="tel" id="contact_call_phone_number" placeholder="<?= $translator->translate("ტელეფონი")?>" required>
                                </div>
                                <button onclick="requestCall('contact_call_name','contact_call_phone_number')" ><?= $translator->translate("შეუკვეთე ზარი")?><img src="../img/icons/arrow-right-circle.svg"></button>
                            </div>
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
<!--    TODO fix maps-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvkK_S9xUxn4AkfIl3GswOmFjaJz49sqw&callback=initMap"></script>
    <script src="<?= BASE_URL ?>js/gmap.js"></script>
    <script>
        function sendContact() {
            //TODO translate
            let name = document.getElementById("contact_name").value;
            let email = document.getElementById("contact_email").value;
            let message = document.getElementById("contact_message").value;
            if(email === ''|| name === '' ||message.length < 10){
                let message = '<?= $translator->translate("გთხოვთ შეიყვანოთ სახელი, მეილი და შეტყობინება სწორად.") ?>';
                window.alert(message);
                return;
            }

            jQuery.ajax({
                type: "POST",
                url: '/contact',
                dataType: 'json',
                accept: "application/json",
                data: {
                    name : name,
                    email : email,
                    text : message
                },

                success : data => {
                    if(data['success']){
                        window.alert('<?= $translator->translate("შეტყობინება წარმატებით გაიგზავნა!")?>');
                    }else{
                        window.alert('<?= $translator->translate("შეტყობინება ვერ გაიგზავნა... სცადეთ მოგვიანებით.")?>');
                    }
                },
                error: () => {
                    window.alert('<?= $translator->translate("შეტყობინება ვერ გაიგზავნა... სცადეთ მოგვიანებით.")?>');
                }
            });

        }
    </script>
  </body>
</html>
