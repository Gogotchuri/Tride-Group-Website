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
        <form method="post" class="contact-us-call contact-us-showroom" action="/request-call">
            <h3 class="header-y"><?= $translator->translate("დაჯავშნე შოურუმი")?></h3>
            <div>
                <input type="text" name="name" placeholder="<?= $translator->translate("სახელი")?>" required>
            </div>
            <div>
                <input type="tel" name="phone_number" placeholder="<?= $translator->translate("ტელეფონი")?>" required>
            </div>
            <div>
                <input type="date" name="date" id="dateN">
            </div>
            <button type="submit" ><?= $translator->translate("შეუკვეთე ზარი")?><img src="../img/icons/arrow-right-circle.svg"></button>
        </form>
    </div>
</div>
<div id="planCallModal"  class="modal">
    <div class="modal-content">
        <span class="closePlan close">&times;</span>
            <div class="contact-us-call">
                <h3 class="header-y"><?= $translator->translate("შეუკვეთე ზარი")?></h3>
                <div>
                    <input type="text" id="call_name" placeholder="<?= $translator->translate("სახელი")?>" required>
                </div>
                <div>
                    <input type="tel" id="call_phone_number" placeholder="<?= $translator->translate("ტელეფონი")?>" required>
                </div>
                <button onclick="requestCall()"><?= $translator->translate("შეუკვეთე ზარი")?><img src="../img/icons/arrow-right-circle.svg"></button>
            </div>
    </div>
</div>

<script>
    // Toggle Navigation menu
    function toggleNav() {
        document.getElementById("mainMenu").classList.toggle("openMenu");
        document.getElementById("burger").classList.toggle("openMenu");
    }
    // Get modals
    const showroom = document.getElementById("showRoomModal");
    const plancall = document.getElementById("planCallModal");

    // Buttons for modal
    const showRoomBtn1 = document.getElementById("showModalD");
    const showRoomBtn2 = document.getElementById("showModalM");
    const planCallBtn1 = document.getElementById("planModalD");
    const planCallBtn2 = document.getElementById("planModalM");

    // Close Btns
    const spanShowRoom = document.getElementsByClassName("closeRoom")[0];
    const spanPlanCall = document.getElementsByClassName("closePlan")[0];

    // Booleans
    var showIsOpen = false;
    var callIsOpen = false;

    // Close
    spanShowRoom.onclick = function () {
        showIsOpen = false;
        callIsOpen = false;
        showroom.style.display = "none";
    }
    spanPlanCall.onclick = function () {
        showIsOpen = false;
        callIsOpen = false;
        plancall.style.display = "none";
    };

    // Open
    showRoomBtn1.onclick = function () {
        if (callIsOpen) {
            plancall.style.display = "none";
            callIsOpen = !callIsOpen;
        }
        if (!showIsOpen) {
            showroom.style.display = "block";
            showIsOpen = !showIsOpen;
        }
    }
    showRoomBtn2.onclick = function () {
        if (showIsOpen) {
            showroom.style.display = "none";
            showIsOpen = !showIsOpen;
        }
        if (!showIsOpen) {
            showroom.style.display = "block";
            showIsOpen = !showIsOpen;
        }
    }
    planCallBtn1.onclick = function () {
        if (showIsOpen) {
            showroom.style.display = "none";
            showIsOpen = !showIsOpen;
        }
        if (!callIsOpen) {
            plancall.style.display = "block";
            callIsOpen = !callIsOpen;
        }
    }
    planCallBtn2.onclick = function () {
        plancall.style.display = "block";
    };

    var myDate = document.getElementById("dateN");
    myDate.valueAsDate = new Date();

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == showroom || event.target == plancall) {
            showIsOpen = false;
            callIsOpen = false;
            showroom.style.display = "none";
            plancall.style.display = "none";
        }
    };

    function requestCall(name_id="call_name", number_id="call_phone_number") {
        let name = document.getElementById(name_id).value;
        let number = document.getElementById(number_id).value;
        if(number.length < 9 || name === '' || isNaN(number)){
            let message = '<?= $translator->translate("გთხოვთ შეიყვანოთ სახელი და ტელეფონის ნომერი სწორად.") ?>';
            window.alert(message);
            return;
        }

        jQuery.ajax({
            type: "POST",
            url: '/request-call',
            dataType: 'json',
            accept: "application/json",
            data: {
                name : name,
                phone_number : number
            },

            success : data => {
                console.log(data);
                if(data['success']){
                    window.alert('<?= $translator->translate("ზარი წარმატებით იქნა მოთხოვნილი!")?>');
                }else{
                    window.alert('<?= $translator->translate("ზარის მოთხოვნა ვერ მოხერხდა... სცადეთ მოგვიანებით.")?>');
                }
            },
            error: () => {
                window.alert('<?= $translator->translate("ზარის მოთხოვნა ვერ მოხერხდა... სცადეთ მოგვიანებით.")?>');
            }
        });

    }

    //TODO test me
    function bookShowroom() {
        let name = document.getElementById("showroom_name").value;
        let number = document.getElementById("showroom_phone_number").value;
        let date = document.getElementById("showroom_date").value;
        if(number.length < 9 || name === '' || isNaN(number) || date == null){
            let message = "<?= $translator->translate('გთხოვთ შეიყვანოთ სახელი და ტელეფონის ნომერი სწორად.') ?>";
            window.alert(message);
            return;
        }

        jQuery.ajax({
            type: "POST",
            url: '/schedule-meeting',
            dataType: 'json',
            accept: "application/json",
            data: {
                name : name,
                phone_number : number,
                date: date
            },

            success : data => {
                console.log(data);
                if(data['success']){
                    window.alert("<?= $translator->translate('შოურუმი წარმატებით იქნა დაჯავშნილი!')?>");
                }else{
                    window.alert("<?= $translator->translate('შოურუმი ვერ დაიჯავშნა... სცადეთ მოგვიანებით.')?>");
                }
            },
            error: () => {
                window.alert("<?= $translator->translate('შოურუმი ვერ დაიჯავშნა... სცადეთ მოგვიანებით.')?>");
            }
        });

    }
</script>