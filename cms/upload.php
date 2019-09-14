<?php
    include_once("../config.php");
    include_once(CLASSES."/database/DatabaseAccessObject.php");
    use http\DatabaseAccessObject;
    $dao = DatabaseAccessObject::getInstance();
    if($dao == null) {
        printf("Failed to connect to MySQL: %s\n");
        exit();
    }

    $database = $dao->getDatabase();


    // Check if image file is a actual image or fake image

    if(isset($_POST)) {
        $headerKA = $_POST['headerKA'];
        $headerEN = $_POST['headerEN'];
        $headerRU = $_POST['headerRU'];

        $htmlKA = (string)$_POST['htmlKA'];
        $htmlEN = (string)$_POST['htmlEN'];
        $htmlRU = (string)$_POST['htmlRU'];

        $pubdate = (string)$_POST['pubdate'];

        $imageSource = "";

        if($_POST['ID'] == "-1"){
            $insertQuery = "INSERT INTO news (htmlKA,htmlEN,htmlRU,image,pubdate,headerKA,headerEN,headerRU) VALUES('$htmlKA','$htmlEN','$htmlRU','$imageSource','$pubdate','$headerKA','$headerEN','$headerRU')";
            if($database->query($insertQuery)){
                $id = $database->insert_id;
            }
        }else{
            $id = (int)$_POST['ID'];
        }

        $relative_target_dir = "/img/updates/" . $id;
        $target_dir = ROOT.$relative_target_dir;
        $defaultImageName = "1";
            

        if($_FILES['image']){
            $extension = "." . substr($_FILES['image']['type'],-3);

            if(!file_exists($target_dir)){
              mkdir($target_dir);
            }

            $image = $target_dir . "/" . $defaultImageName . $extension;
            $imageSource = $relative_target_dir. "/" . $defaultImageName . $extension;
            move_uploaded_file($_FILES['image']["tmp_name"], $image);
        }

        $Query = "UPDATE news SET htmlKA='$htmlKA',htmlEN='$htmlEN',htmlRU='$htmlRU',image='$imageSource',pubdate='$pubdate',headerKA='$headerKA',headerEN='$headerEN',headerRU='$headerRU' WHERE ID=$id";

        if($database->query($Query)){
            header('Location: /cms/updates.php');
        }

    }

?>