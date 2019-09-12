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
    <a href="/about-us" class="link"><?=$translator->translate("ჩვენ შესახებ")?></a>
    <a href="/contact" class="link"><?=$translator->translate("კონტაქტი")?></a>

    <!-- Language list only for mobile -->
    <ul class="mobile-lang socials-side">
        <li><a onclick="setLanguage('KA')">KA</a></li>
        <li><a onclick="setLanguage('EN')">EN</a></li>
        <li><a onclick="setLanguage('RU')">RU</a></li>
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
        <!-- Logo -->
            <div class="brand-logo brand-logo-Desk">
                <a href="/">
                    <img src="<?=BASE_URL?>img/icons/3D_logo.png" alt="logo">
                </a>
            </div>
            <div class="brand-logo brand-logo-mobile">
                <a href="/">
                    <img src="<?=BASE_URL?>img/icons/3D_logo_m.png">
                </a>
            </div>

        <?php if ($lang == "RU"){?>
        <!-- Social icons only for desktop -->
        <ul class="socials hideOnMobile rus-socials">
        <?php }else{?>
        <ul class="socials hideOnMobile">
        <?php } ?>
            <li><a class="social-icon" href="https://www.facebook.com/trideGROUP" target="_blank" title="Facebook"><img src="img/icons/socials-b/facebook.svg" alt="facebook"></a></li>
            <li><a class="social-icon" href="https://www.instagram.com/tridedevelopment" target="_blank" title="Instagram"><img src="img/icons/socials-b/instagram.svg" alt="instagram"></a></li>
            <li><a class="social-icon" href="https://www.youtube.com/channel/UC4EmhoWfCIjmGmY2XhizRgg" target="_blank" title="Youtube"><img src="img/icons/socials-b/youtube.svg" alt="youtube"></a></li>
        </ul>

        <!-- Buttons for modals Desktop only-->
            <?php if ($lang == "RU"){?>
            <div class="modalsDesk modalsDesk-rus">
            <?php }else{?>
        <div class="modalsDesk">
            <?php } ?>
            <button class="plancall" id="planModalD"><img src="<?=BASE_URL?>img/icons/planCall.svg" alt="call"><p><?=$translator->translate("შეუკვეთე ზარი")?></p></button>
            <button class="showroom" id="showModalD"><img src="<?=BASE_URL?>img/icons/showroom.svg" alt="showroom"><p><?=$translator->translate("დაჯავშნე შოურუმი")?></p></button>
        </div>

        <!-- Buttons for modals Mobile only -->
        <div class="modalsMob">
            <button class="plancall" id="planModalM"><img src="<?=BASE_URL?>img/icons/planCall.svg" alt="call"></button>
            <button class="showroom" id="showModalM"><img src="<?=BASE_URL?>img/icons/showroom.svg" alt="showroom"></button>
        </div>

        <!-- Language Dropdown For Desktop -->
        <div id="dropdown_wrap" class="dropdown">
            <button onclick="changeDropdownState()" class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                <?=$lang?><img src="../../img/icons/arrow-lang.png" height="15px">
            </button>
            <div id="dropdown-menu" class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a onclick="setLanguage('KA')" class="dropdown-item">KA</a>
                <a onclick="setLanguage('EN')" class="dropdown-item">EN</a>
                <a onclick="setLanguage('RU')" class="dropdown-item">RU</a>
            </div>
        </div>

        <!-- Burger button -->
        <button class="openbtn" onclick="toggleNav()">
            <div class="burger-custom" id="burger"><div></div></div>
        </button>
    </div>

</nav>

<div id="showRoomModal" class="modalo">
    <div class="modalo-content">
        <span class="closeRoom close">&times;</span>
        <div class="contact-us-call contact-us-showroom">
            <h3 class="header-b"><?= $translator->translate("დაჯავშნე შოურუმი")?></h3>
            <div>
                <input type="text" id="showroom_name" placeholder="<?= $translator->translate("სახელი")?>" required>
            </div>
            <div>
                <input type="tel" id="showroom_phone_number" placeholder="<?= $translator->translate("ტელეფონი")?>" required>
            </div>
            <div>
                <input type="date" name="date" id="showroom_date">
            </div>
            <button onclick="bookShowroom()" ><?= $translator->translate("დაჯავშნე")?><img src="../img/icons/arrow-right-circle.svg"></button>
            <div class="under-button"></div>
        </div>
    </div>
</div>
<div id="planCallModal"  class="modalo">
    <div class="modalo-content">
        <span class="closePlan close">&times;</span>
            <div class="contact-us-call">
                <h3 class="header-y"><?= $translator->translate("შეუკვეთე")?></h3>
                <div>
                    <input type="text" id="call_name" placeholder="<?= $translator->translate("სახელი")?>" required>
                </div>
                <div>
                    <input type="tel" id="call_phone_number" placeholder="<?= $translator->translate("ტელეფონი")?>" required>
                </div>
                <button onclick="requestCall()"><?= $translator->translate("შეუკვეთე ზარი")?><img src="../img/icons/arrow-right-circle.svg"></button>
                <div class="under-button"></div>
            </div>
    </div>
</div>

<script type="text/javascript" src="<?=BASE_URL?>js/pages/navbar.js"></script>
<script>
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