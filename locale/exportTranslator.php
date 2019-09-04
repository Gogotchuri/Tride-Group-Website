<?php
    include_once("Translator.php");
    use locale\Translator;

    //Set language
    if(isset($_GET["lang"]))
        $tmp = $_GET["lang"];
    else if(isset($_COOKIE["lang"]))
        $tmp = $_COOKIE["lang"];

    if($tmp === "EN" || $tmp === "RU")
        $lang = $tmp;
    else
        $lang = "KA";

    setcookie("lang", $lang);

    $translator = Translator::getInstance();
    $translator->changeLocale($lang);