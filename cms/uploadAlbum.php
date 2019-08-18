<?php
    include '../database.php';

    $database = new mysqli($host, $user, $password, $db);
    if ($database->connect_errno)
    {
        printf ("Failed to connect to MySQL: %s\n" , $database->connect_error);
        exit();
    }

    $database->set_charset("utf8mb4");

    if(isset($_POST)) {
        $nameKA = $_POST['headerKA'];
        $nameEN = $_POST['headerEN'];
        $nameRU = $_POST['headerRU'];
        
        $id = -1;
        
        if($_POST['ID'] == "-1"){
            $insertQuery = "INSERT INTO album (nameKA,nameEN,nameRU,images,defaultImage,link) VALUES('$nameKA','$nameEN','$nameRU','','','')";
            if($database->query($insertQuery)){
                $id = $database->insert_id;
            }
        }else{
            $id = (int)$_POST['ID'];
        }
        
        $target_dir = "../img/gallery/" . $id;

        $defaultImageName = "1";

        $imageSource = "";

        $default_image_empty = False;
        
        $filesInDir = 0;

        if(!empty($_FILES['image']['tmp_name'])){
            $path_parts = pathinfo($_FILES["image"]["name"]);
            $extension = $path_parts['extension'];

            if(!file_exists($target_dir)){
                mkdir($target_dir);
            }
            $default_image = $target_dir . "/" . $defaultImageName . "." . $extension;
            $imageSource = substr($target_dir . "/" . $defaultImageName . "." . $extension,3);
            move_uploaded_file($_FILES['image']["tmp_name"], $default_image);
            $filesInDir = 1;
        }else{
            $default_image_empty = True;
        }
        
        if(is_uploaded_file($_FILES['images']['tmp_name'][0])){
            // Loop through each file
            $total = count($_FILES['images']['tmp_name']);

            $filesInDir = $filesInDir +  count(scandir($target_dir)) - 2;

            for( $i=0 ; $i < $total ; $i++ ) {

                //Get the temp file path
                $tmpFilePath = $_FILES['images']['tmp_name'][$i];

                $tmp_path_parts = pathinfo($_FILES["images"]["name"][$i]);
                $tmp_extension = $tmp_path_parts['extension'];

                //Make sure we have a file path
                if ($tmpFilePath != ""){
                    //Setup our new file path
                    $imgName = $i + $filesInDir;
                    $newFilePath = $target_dir . "/" . $imgName . "." . $tmp_extension;
            
                    //Upload the file into the temp dir
                    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                        $success = True;
                    }
                }
            }
        }

        $target_dir_path = substr($target_dir,3) . "/";
        
        if($default_image_empty){
            $Query = "UPDATE album SET nameKA='$nameKA',nameEN='$nameEN',nameRU='$nameRU',images='$target_dir_path',link='album.php?ID=$id' WHERE ID = $id";    
        }else{
            $Query = "UPDATE album SET nameKA='$nameKA',nameEN='$nameEN',nameRU='$nameRU',images='$target_dir_path',defaultImage='$imageSource',link='album.php?ID=$id' WHERE ID = $id";    
        }

        if($database->query($Query)){
            header('Location: gallery.php');
        }

    }else{
        header('Location: gallery.php');
    }

?>