<?php
    include_once("../config.php");
    include_once(MANAGERS."/GalleryManager.php");
    include_once(MANAGERS."/NewsManager.php");
    include_once(MANAGERS."/ProjectsManager.php");
    include_once(HTTP."/middleware/Authenticated.php");

    use manager\ProjectsManager;
    use middleware\Authenticated;
    use manager\GalleryManager;
    use manager\NewsManager;

    if(!Authenticated::isAuthenticated()) exit();
    header('Content-Type: application/json');

    $aResult = [];

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
                
                   if(GalleryManager::deleteAlbum($albumID)){
                        $aResult['result'] = True;
                        $dir = ROOT.'/img/gallery/' . $albumID;
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
                    $album = GalleryManager::getAlbumById($alb_id);
                    if($album){
                        $path = ROOT."/". $album['images'];
                        $images = array_values(scandir($path));
                        unset($images[0]);
                        unset($images[1]);

                        $album['imagePathes'] = $images;
                        
                        $aResult['response'] = json_encode($album);
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
                    $dir = ROOT.'/img/updates/' . $newsID;
                    if (is_dir($dir)){
                        array_map('unlink', glob("$dir/*.*"));
                        rmdir($dir);
                    }
                    if(NewsManager::deleteNews($newsID)){
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
                   if(GalleryManager::deleteVideos() && $urlArr[0] != 'empty'){
                        forEach($urlArr as $url)
                            GalleryManager::storeVideo($url);

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
               $news = NewsManager::getNewsById($news_id);
               if($news) $aResult['response'] = json_encode($news);
               $aResult['result'] = True;
               break;

            case 'markApartmentSold':
                $ap_num = $_POST["arguments"]["number"];
                $floor = $_POST["arguments"]["floor"];
                $option = $_POST["arguments"]["option"];
                if($option == "1")
                    $aResult["result"] = ProjectsManager::markApartmentUnavailable($ap_num, $floor);
                else
                    $aResult["result"] = ProjectsManager::markApartmentAvailable($ap_num, $floor);
                break;
            default:
               $aResult['error'] = 'Not found function '.$_POST['name'].'!';
               break;
        }

    }
    
    echo json_encode($aResult);
?>