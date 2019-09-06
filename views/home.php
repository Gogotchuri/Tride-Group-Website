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