<?php
    include(ROOT.'/database.php');
    include(LOCALE."/exportTranslator.php");
?>
<!DOCTYPE html>
<html lang="en">
<?php include(VIEWS."/partials/head.php")?>
<body>
<!-- Navigation Menu -->
<?php include(VIEWS."/partials/navbar.php"); ?>


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