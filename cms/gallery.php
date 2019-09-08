<?php
    include(LOCALE."/exportTranslator.php");

    include_once(HTTP."/middleware/Authenticated.php");
    include_once(CLASSES."/managers/GalleryManager.php");
    use middleware\Authenticated;
    use manager\GalleryManager;

    if(!Authenticated::isAuthenticated()) exit();

    $albums = GalleryManager::getAlbumsWhere("ID<>1");
    $videos = GalleryManager::getAllVideos();


    if($albums == null || $videos == null){
        require(VIEWS."/errors/500.shtml");
        exit();
    }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta HTTP-EQUIV="Pragma" content="no-cache"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMS - გალერეა</title>
    <?php include(CMS."/partials/style_include.php") ?>
  </head>
  <body>
    <style> 
      .removable{
        opacity: 0.7;
      }
    </style>

    <?php include "nav.php" ?>
    <div id="top"></div>
    <!-- Gallery -->
    <section id="gallery" class="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="text-center">ფოტო ალბომები</h2>
            <hr class="small">
            <div class="row">
              <div class="col-md-12 about-content">
                <button class="btn btn-warning" data-toggle="modal" data-target="#editAlbum" onclick="return insertAlbum()">
                <span class="fa fa-plus"> </span> ალბომის დამატება
                </button>
                <button class="btn btn-warning" data-toggle="modal" data-target="#YTvideos">
                <span class="fa fa-plus"> </span> ვიდეოს დამატება
                </button>
                <hr>
              </div>
                
              <?php
                foreach($albums as $row){ ?>
                  <div class="col-md-12 about-content" id="<?=$row['ID']?>">
                    <div class="col-sm-3 col-md-3">
                      <a href="../<?=$row["link"]?>"><img class="img-responsive news-thumb" src="../<?=$row["defaultImage"]?>"></a>
                    </div>
                    <div class="col-md-7 about-txt">
                      <h4><?= $row["name".$lang] ?></h4>
                      <span class="news-date"><?=$row["images"]?></span>
                    </div>
                    <div class="col-sm-3 col-md-3">
                      <button class="btn btn-success" title="რედაქტირება" data-toggle="modal" data-target="#editAlbum"  onclick = "return setEdit('<?=$row['ID']?>')">
                      <span class="fa fa-edit"></span>
                      </button>
                      <button class="btn btn-danger"  title="წაშლა" data-toggle="modal" data-target="#deleteAlbum" onclick="return sendToModuleOne(<?=$row['ID']?>);">
                      <span class="fa fa-trash"></span>
                      </button>
                    </div>
                  </div>
              <?php } ?>
                
                
              <!-- Modal 1 ალბომის წაშლა -->
              <div class="modal fade" id="deleteAlbum" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">ალბომის წაშლა</h4>
                    </div>
                    <div class="modal-body">
                      დარწმუნებული ხარ რომ გსურს ალბომის წაშლა?
                      <h4 id="DeleteAlbumName" class="alert alert-danger">(ალბომის სათაური)</h4><!-- უნდა აჩვენოს იმ ალბომის სათაური რომლის წაშლაც მინდა -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">უკან</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="return deleteAlbum()">წაშლა</button>
                      </div>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
              
              <!-- Modal 2 ალბომის დამატება/რედაქტირება -->
              <div class="modal fade" id="editAlbum" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">ალბომის რედაქტირება</h4>
                    </div>
                    <div class="modal-body">
                      <form action="uploadAlbum.php" method="POST" id="edit_create_album" enctype="multipart/form-data">
                        <!-- Form სიახლის დამატება/რედაქტირება -->
                        <input type="hidden" name="ID" value="-1">
                        <div class="form-group">
                          <label for="headerKA">სათაური:</label>
                          <input type="text" class="form-control" id="headerKA" placeholder="სათაური ..." name="headerKA">
                        </div>
                        <div class="form-group">
                          <label for="headerRU">სათაური (RU):</label>
                          <input type="text" class="form-control" id="headerRU" placeholder="Заглавие ..." name="headerRU">
                        </div>
                        <div class="form-group">
                          <label for="headerEN">სათაური (EN):</label>
                          <input type="text" class="form-control" id="headerEN" placeholder="Title ..." name="headerEN">
                        </div>
                        <div class="form-group">
                          <label for="image">მთავარი ფოტო:</label>
                          <input type="file" id="image" accept="image/*" name="image">
                          <small class="text-danger">* ფოტო არ უნდა აღემატებოდეს 2MB-ს.</small>
                          <img  id="mainImg" src="" class="form-img"><!-- შერჩეული/ატვირთული ფოტო -->
                        </div>
                        <div class="form-group">
                          <label for="images">ფოტოების დამატება:</label>
                          <input type="file" id="images" accept="image/*" name="images[]" multiple="multiple">
                          <small class="text-danger">* თითოეული ფოტო არ უნდა აღემატებოდეს 2MB-ს.</small>
                        </div>
                        <div class="form-group"><!-- ჩანს მხოლოდ რედაქტირების დროს -->
                          <label for="images">ატვირთული ფოტოები:</label>
                          <button class="btn-danger" data-tartget = "#deleteAllPics" id="remove-pic" title="შერჩეული ფოტოს წაშლა"><i class="fa fa-trash"></i></button>
                          <div class="uploaded-pics" id="uploadedPictures">
                                <!-- uploaded img Form -->
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">უკან</button>
                          <button type="button" class="btn btn-success" onclick="validateFields()">შენახვა</button>

                        </div>
                      </form><!-- /Form ალბომის დამატება/რედაქტირება-->
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
                
              <!-- Modal 3 ვიდეოების ლინკები -->
              <div class="modal fade" id="YTvideos" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">Youtube ვიდეოები</h4>
                    </div>
                    <div class="modal-body">
                        <div id="URLs">
                      <?php
                        foreach($videos as $row){ ?>
                        <div class="input-group" id = "URL_<?=$row['ID']?>">
                          <input type="text" class="form-control" value="<?= $row["URL"] ?>">
                          <span class="input-group-btn">
                            <button class="btn btn-danger" type="button" title="წაშლა" onclick="deleteURL('URL_<?=$row['ID']?>')"><i class="fa fa-trash"></i></button>
                          </span><br>
                        </div><!-- /input-group -->
                      <?php } ?>
                        </div>
                        <button class="btn btn-success" type="button" onclick="newVideo()" title="ვიდეოს დამატება"><i class="fa fa-plus"></i></button>
                        
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">უკან</button>
                        <button type="submit" class="btn btn-success" id="saveUrls">შენახვა</button>
                      </div>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->               

              <?php
                foreach($videos as $row){ ?>
                  <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="portfolio-item">
                      <a href="#">
                      <iframe width="100%" height="315" src="<?=$row["URL"]?>" frameborder="0" allowfullscreen></iframe>
                      </a>
                    </div>
                  </div>
              <?php } ?>
                
            </div><!-- /.row (nested) -->
          </div><!-- /.row -->
        </div>
      </div><!-- /.container -->
    </section>

    <script>
        function newVideo(){
          $( "#URLs" ).append( "<div class='input-group'><input type='text' class='form-control'><span class='input-group-btn'><button class='btn btn-danger' type='button' title='წაშლა'><i class='fa fa-trash'></i></button></span><br></div>" );
        };
    </script>
    <!-- <script src="scripts/gallery.js"></script>
     -->
    <script src="<?=BASE_URL?>js/jquery.js"></script>
    <script src="<?=BASE_URL?>js/bootstrap.min.js"></script>
    <script src="<?=BASE_URL?>cms/scripts/gallery.js"></script>
  </body>
</html>