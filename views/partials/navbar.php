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
    <a href="/projects" class="link"><?=$translator->translate("პროექტები")?></a>
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
            <button class="plancall" id="planModalD"><img src="img/icons/planCall.svg" alt="call"><?=$translator->translate("შეუკვეთე ზარი")?></button>
            <button class="showroom" id="showModalD"><img src="img/icons/showroom.svg" alt="showroom"><?=$translator->translate("დაჯავშნე შოურუმი")?></button>
        </div>

        <!-- Buttons for modals Mobile only -->
        <div class="modalsMob">
            <button class="plancall" id="planModalM"><img src="img/icons/planCall.svg" alt="call"></button>
            <button class="showroom" id="showModalM"><img src="img/icons/showroom.svg" alt="showroom"></button>
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

<div id="showRoomModal" class="modal">
    <div class="modal-content">
        <span class="closeRoom close">&times;</span>
        <p>showRoom..</p>
    </div>
</div>
<div id="planCallModal"  class="modal">
    <div class="modal-content">
        <span class="closePlan close">&times;</span>
            <form method="post" class="contact-us-call" action="/request-call">
                <h3 class="header-y"><?= $translator->translate("შეუკვეთე ზარი")?></h3>
                <div>
                    <input type="text" name="name" placeholder="<?= $translator->translate("სახელი")?>" required>
                </div>
                <div>
                    <input type="tel" name="phone_number" placeholder="<?= $translator->translate("ტელეფონი")?>" required>
                </div>
                <button type="submit" ><?= $translator->translate("შეუკვეთე ზარი")?><img src="../img/icons/arrow-right-circle.svg"></button>
            </form>
    </div>
</div>

<script>
    // Toggle Navigation menu
    function toggleNav() {
        document.getElementById("mainMenu").classList.toggle("openMenu");
        document.getElementById("burger").classList.toggle("openMenu");
    }
    // Get modals
    var showroom = document.getElementById("showRoomModal");
    var plancall = document.getElementById("planCallModal");

    // Buttons for modal
    var showRoomBtn1 = document.getElementById("showModalD");
    var showRoomBtn2 = document.getElementById("showModalM");
    var planCallBtn1 = document.getElementById("planModalD");
    var planCallBtn2 = document.getElementById("planModalM");

    // Close Btns
    var spanShowRoom = document.getElementsByClassName("closeRoom")[0];
    var spanPlanCall = document.getElementsByClassName("closePlan")[0];

    // Close
    spanShowRoom.onclick = function () {
        showroom.style.display = "none";
    }
    spanPlanCall.onclick = function () {
        plancall.style.display = "none";
    }

    // Open
    showRoomBtn1.onclick = function () {
        showroom.style.display = "block";
    }
    showRoomBtn2.onclick = function () {
        showroom.style.display = "block";
    }
    planCallBtn1.onclick = function () {
        plancall.style.display = "block";
    }
    planCallBtn2.onclick = function () {
        plancall.style.display = "block";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == showroom || event.target == plancall) {
            showroom.style.display = "none";
            plancall.style.display = "none";
        }
    }

</script>