<?php
    $database = [
        "host" => "",
        "user" => "tridegro_123",
        "db_name" => "tridegro_tride",
        "password" => "tride@@@"
    ];

    $mail = [
      "to_email" => ""
    ];

    defined("VIEWS") or define("VIEWS", realpath(dirname(__FILE__)."/views/"));
    defined("ROOT") or define("ROOT", realpath(dirname(__FILE__)));
    defined("LOCALE") or define("LOCALE", realpath(dirname(__FILE__)."/locale/"));

