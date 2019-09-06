<?php if($lang != "KA"){ ?>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="css/resetfont.css" rel="stylesheet">
<?php } ?>
<!-- Hidden Menu -->
<div id="mainMenu" class="mainMenu">

    <!-- Hide menu content till finally opened  -->
    <div class="hideWithOverlay">
    </div>

    <!-- Inner links -->
    <a href="/updates" class="link"><?=$translator->translate("სიახლეები")?></a>
    <a href="/gallery" class="link"><?=$translator->translate("გალერეა")?></a>
    <a href="/about-us" class="link"><?=$translator->translate("ჩვენს შესახებ")?></a>
    <a href="/contact" class="link"><?=$translator->translate("კონტაქტი")?></a>

    <!-- Language list only for mobile -->
    <ul class="mobile-lang socials-side">
        <li><a href="?lang=KA">KA</a></li>
        <li><a href="?lang=EN">EN</a></li>
        <li><a href="?lang=RU">RU</a></li>
    </ul>

    <!-- Social icons -->
    <ul class="socials socials-side">
        <li><a class="social-icon" href="https://www.facebook.com/trideGROUP" target="_blank" title="Facebook"><img src="img/icons/socials-w/facebook.svg" alt="facebook"></a></li>
        <li><a class="social-icon" href="https://www.instagram.com/tridedevelopment" target="_blank" title="Instagram"><img src="img/icons/socials-w/instagram.svg" alt="instagram"></a></li>
        <li><a class="social-icon" href="https://www.youtube.com/channel/UC4EmhoWfCIjmGmY2XhizRgg" target="_blank" title="Youtube"><img src="img/icons/socials-w/youtube.svg" alt="youtube"></a></li>
    </ul>
</div>

<nav>

    <!-- Container for first visible content on navigation bar -->
    <div class="navContainer">

        <!-- Social icons only for desktop -->
        <ul class="socials hideOnMobile">
            <li><a class="social-icon" href="https://www.facebook.com/trideGROUP" target="_blank" title="Facebook"><img src="img/icons/socials-b/facebook.svg" alt="facebook"></a></li>
            <li><a class="social-icon" href="https://www.instagram.com/tridedevelopment" target="_blank" title="Instagram"><img src="img/icons/socials-b/instagram.svg" alt="instagram"></a></li>
            <li><a class="social-icon" href="https://www.youtube.com/channel/UC4EmhoWfCIjmGmY2XhizRgg" target="_blank" title="Youtube"><img src="img/icons/socials-b/youtube.svg" alt="youtube"></a></li>
        </ul>

        <!-- Buttons for modals Desktop only-->
        <div class="modalsDesk">
            <button class="plancall"><img src="img/icons/planCall.svg" alt="call"><?=$translator->translate("შეუკვეთე ზარი")?></button>
            <button class="showroom"><img src="img/icons/showroom.svg" alt="showroom"><?=$translator->translate("დაჯავშნე შოურუმი")?></button>
        </div>

        <!-- Buttons for modals Mobile only -->
        <div class="modalsMob">
            <button class="plancall"><img src="img/icons/planCall.svg" alt="call"></button>
            <button class="showroom"><img src="img/icons/showroom.svg" alt="showroom"></button>
        </div>

        <!-- Language Dropdown For Desktop -->
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?=$lang?>
            </button>
            <div id="dropdown-menu" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="?lang=KA">KA</a>
                <a class="dropdown-item" href="?lang=EN">EN</a>
                <a class="dropdown-item" href="?lang=RU">RU</a>
            </div>
        </div>

        <!-- Burger button -->
        <button class="openbtn" onclick="toggleNav()">
            <div class="burger-custom" id="burger"><div></div></div>
        </button>
    </div>

</nav>

<script>
    // Toggle Navigation menu
    function toggleNav() {
        document.getElementById("mainMenu").classList.toggle("openMenu");
        document.getElementById("burger").classList.toggle("openMenu");
    }
</script>