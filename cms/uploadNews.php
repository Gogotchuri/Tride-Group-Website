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
        $headerKA = (string)$_POST['headerKA'];
        $headerEN = (string)$_POST['headerEN'];
        $headerRU = (string)$_POST['headerRU'];
        
        $htmlKA = (string)$_POST['htmlKA'];
        $htmlEN = (string)$_POST['htmlEN'];
        $htmlRU = (string)$_POST['htmlRU'];

        $pubdate = (string)$_POST['pubdate'];

        $imageSource = "";

        $id = -1;
        
        if($_POST['ID'] == "-1"){
            $insertQuery = "INSERT INTO news (htmlKA,htmlEN,htmlRU,image,pubdate,headerKA,headerEN,headerRU) VALUES('$htmlKA','$htmlEN','$htmlRU','$imageSource','$pubdate','$headerKA','$headerEN','$headerRU')";
            if($database->query($insertQuery)){
                $id = $database->insert_id;
            }
        }else{
            $id = (int)$_POST['ID'];
        }

        if(!empty($_FILES['image']['tmp_name'])){

            $defaultImageName = "1";

            $relative_target_dir = "/img/updates/" . $id;;
            $target_dir = ROOT.$relative_target_dir;

            $path_parts = pathinfo($_FILES["image"]["name"]);

            $extension = $path_parts['extension'];

            if(!file_exists($target_dir)){
              mkdir($target_dir);
            }

            $image = $target_dir . "/" . $defaultImageName . "." . $extension;

            $imageSource = $relative_target_dir."/".$defaultImageName.".".$extension;

            move_uploaded_file($_FILES['image']["tmp_name"], $image);

        }else{
            $getPathQuery = "SELECT * from news WHERE ID = $id";
            if($t_dir = $database->query($getPathQuery)){
                $t_dir = $t_dir->fetch_array();
                if(!empty($t_dir['image'])){
                    $imageSource = $t_dir['image'];
                }
            }
        }

        $Query = "UPDATE news SET htmlKA='$htmlKA',htmlEN='$htmlEN',htmlRU='$htmlRU',image='$imageSource',pubdate='$pubdate',headerKA='$headerKA',headerEN='$headerEN',headerRU='$headerRU' WHERE ID=$id";    

        if($database->query($Query)){
            header('Location: /cms/updates.php');
            die();
        }else{
            echo "Failed on updating data base";
        }
    
    }else{
        header('Location: /cms/updates.php');
    }



?>