<?php if($lang != "KA"){ ?>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="css/resetfont.css" rel="stylesheet">
<?php } ?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button> <a class="navbar-brand" href="home" onclick="$('#menu-close').click();">
                <img src="img/icons/nav-logo.png" class="img-responsive"></a> </div><div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li>
                    <a href="updates"><?=$translator->translate("სიახლეები") ?></a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$translator->translate("პროექტები")?>
                        <span class="caret"></span>
                    </a> <ul class="dropdown-menu">
                        <li>
                            <a href="projects#current"><?=$translator->translate("მიმდინარე პროექტები")?></a>
                        </li>
                        <li><a href="projects#complete"><?=$translator->translate("განხორციელებული პროექტები")?></a>
                        </li><li><a href="projects#infra"><?=$translator->translate("ინფრასტრუქტურული პროექტები")?></a></li>
                        <li><a href="projects#plan"><?=$translator->translate("გენ-გეგმა")?></a></li>
                    </ul>
                </li>
                <li>
                    <a href="gallery" onclick="$('#menu-close').click();"><?=$translator->translate("გალერეა")?></a>
                </li>
                <li>
                    <a href="about-us" onclick="$('#menu-close').click();"><?=$translator->translate("ჩვენს შესახებ")?></a>
                </li>
                <li>
                    <a href=contact" onclick="$('#menu-close').click();"><?=$translator->translate("კონტაქტი")?></a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle lang" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$lang?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="?lang=KA">ქართული</a>
                        </li>
                        <li>
                            <a href="?lang=EN">ENGLISH</a>
                        </li>
                        <li>
                            <a href="?lang=RU">РУССКИЙ</a>
                        </li>
                    </ul>
                </li>
                <span class="nav-social">
                    <li>
                        <a class="social-nav" href="https://www.facebook.com/trideGROUP" target="_blank" title="Facebook">
                            <img src="img/icons/fbk.png" alt="facebook">
                        </a>
                    </li>
                    <li>
                        <a class="social-nav" href="https://www.instagram.com/tridedevelopment" target="_blank" title="Instagram">
                            <img src="img/icons/insta.png" alt="instagram">
                        </a>
                    </li>
                    <li>
                        <a class="social-nav" href="https://www.youtube.com/channel/UC4EmhoWfCIjmGmY2XhizRgg" target="_blank" title="Youtube">
                            <img src="img/icons/ytb.png" alt="youtube">
                        </a>
                    </li>
                </span>
            </ul>
        </div>
    </div>
</nav>