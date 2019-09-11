<?php
    $lang = "KA";
    //Set language
    if(isset($_GET["lang"]))
        $tmp = $_GET["lang"];
    else if(isset($_COOKIE["lang"]))
        $tmp = $_COOKIE["lang"];
    else
        $tmp = "KA";

    if($tmp === "EN" || $tmp === "RU")
        $lang = $tmp;

    include_once("Translator.php");
    use locale\Translator;

    $translator = Translator::getInstance();
    $translator->changeLocale($lang);