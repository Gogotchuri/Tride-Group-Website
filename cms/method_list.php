<?php
    include '../database.php';

    $database = new mysqli($host, $user, $password, $db);
    if ($database->connect_errno)
    {
        printf ("Failed to connect to MySQL: %s\n" , $database->connect_error);
        exit();
    }

    $database->set_charset("utf8mb4");
    
    header('Content-Type: application/json');

    $aResult = array();

    if( !isset($_POST['name']) ) { $aResult['error'] = 'No function name!'; }

    if( !isset($_POST['arguments']) ) { $aResult['error'] = 'No function arguments!'; }

    if( !isset($aResult['error']) ) {

        switch($_POST['name']) {
            case 'deleteAlbum':
               if( !is_array($_POST['arguments'])) {
                   $aResult['error'] = 'Error in arguments!';
               }
               else {
                   $albumID = $_POST['arguments'][0];
                   $query = "DELETE FROM `album` WHERE ID='$albumID'";
                
                   if($database->query($query) === TRUE){
                    $aResult['result'] = True;
                        $dir = '../img/gallery/' . $albumID;
                        if (is_dir($dir)){
                            array_map('unlink', glob("$dir/*.*"));
                            rmdir($dir);
                        }
                    }else{
                       $aResult['result'] = False;
                   }
               }
               break;
            case 'fillFormAlbum':
                if( !is_array($_POST['arguments'])) {
                    $aResult['error'] = 'Error in arguments!';
                }else {
                    $alb_id = (int)$_POST['arguments'][0];
                    $selectQuery = "SELECT * FROM album WHERE ID = '$alb_id'";
                    if($news = $database->query($selectQuery)){

                        $arr = $news->fetch_array();
                        $path = '../' . $arr['images'];

                        $images = array_values(scandir($path));
                        unset($images[0]);
                        unset($images[1]);
                        
                        $arr['imagePathes'] = $images;
                        
                        $aResult['response'] = json_encode($arr);
                    };
                    $aResult['result'] = True;
                }
                break;
            case 'removeImages':
                if( !is_array($_POST['arguments'])) {
                    $aResult['error'] = 'Error in arguments!';
                }else{
                    $arr = $_POST['arguments'];
                    foreach($arr as $file){
                        if(file_exists($file)){
                            unlink($file);
                        }
                    }
                    $aResult['response'] = json_encode($arr);
                    $aResult['result'] = True;
                }
                break;
            case 'deleteNews':
                if( !is_array($_POST['arguments'])) {
                    $aResult['error'] = 'Error in arguments!';
                }else {
                    $newsID = $_POST['arguments'][0];
                    $query = "DELETE FROM `news` WHERE ID='$newsID'";
                    $dir = '../img/updates/' . $newsID;
                    if (is_dir($dir)){
                        array_map('unlink', glob("$dir/*.*"));
                        rmdir($dir);
                    }
                    if($database->query($query) === TRUE){
                     $aResult['result'] = True;
                    }else{
                        $aResult['result'] = False;
                    }
                }
                break;
            case 'updateURLs':
               if(!is_array($_POST['arguments'])){
                   $aResult['error'] = 'Error in arguments!';
               }else{
                   $urlArr = $_POST['arguments'];
                   $delQuery = "DELETE FROM `videos`";
                   if($database->query($delQuery) === TRUE && $urlArr[0] != 'empty'){
                        forEach($urlArr as $val){
                            $query = "INSERT INTO `videos` (URL) VALUES('$val')";
                            $database->query($query);
                        }
                        $aResult['result'] = True;
                   }else{
                    $aResult['error'] = "Couldn't update videos";
                   }
               }
               break;
            case 'fillFormNews':
               if(!is_array($_POST['arguments'])){
                   $aResult['error'] = 'Error in arguments!';
               }
               $news_id = (int)$_POST['arguments'][0];
               $selectQuery = "SELECT * FROM news WHERE ID = '$news_id'";
               if($news = $database->query($selectQuery)){
                   $aResult['response'] = json_encode($news->fetch_array());
               };
               $aResult['result'] = True;
               break;
            default:
               $aResult['error'] = 'Not found function '.$_POST['functionname'].'!';
               break;
        }

    }
    
    echo json_encode($aResult);
?>