<?php
    $base_url = "http://localhost:8081/";

    $database = [
        "host" => "",
        "user" => "tridegro_123",
        "db_name" => "tridegro_tride",
        "password" => "tride@@@"
    ];

    $mail = [
      "to_email" => ""
    ];

    defined("VIEWS") or define("VIEWS", realpath(dirname(__FILE__)."/views"));
    defined("ROOT") or define("ROOT", realpath(dirname(__FILE__)));
    defined("LOCALE") or define("LOCALE", realpath(dirname(__FILE__)."/locale"));
    defined("CLASSES") or define("CLASSES", realpath(dirname(__FILE__)."/classes"));
    defined("MANAGERS") or define("MANAGERS", realpath(dirname(__FILE__)."/classes/managers"));
    defined("HTTP") or define("HTTP", realpath(dirname(__FILE__)."/classes/http"));
    defined("BASE_URL") or define("BASE_URL", $base_url);

