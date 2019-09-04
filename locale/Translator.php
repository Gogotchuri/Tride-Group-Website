<?php


namespace locale;

include_once("Translations.php");

class Translator
{
    private static $instance = null;
    private $lang = "KA";
    private $translation = [];

    public static function getInstance(){
        if(self::$instance === null)
            self::$instance = new Translator("KA");
        return self::$instance;
    }

    protected function __construct($lang){
        $this->changeLocale($lang);
    }

    public function changeLocale($lang){
        if($this->lang === $lang)
            return;
        if($lang === "KA"){
            $this->translation = [];
            $this->lang = "KA";
        }else if ($lang === "EN"){
            $this->translation = Translations::$EN_TEXTS;
            $this->lang = "EN";
        }else if ($lang === "RU"){
            $this->translation = Translations::$RU_TEXTS;
            $this->lang = "RU";
        }
    }

    public function translate($caption){
        return isset($this->translation[$caption]) ? $this->translation[$caption] : $caption;
    }
}