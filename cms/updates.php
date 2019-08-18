<?php
  include '../cms/session.php'; 
  include '../database.php';
  include '../texts.php';

  $database = new mysqli($host, $user, $password, $db);
  if ($database->connect_errno)
  {
    printf ("Failed to connect to MySQL: %s\n" , $database->connect_error);
    exit();
  }
  $database->set_charset("utf8mb4");

  $query = "SELECT * FROM news ORDER BY pubdate DESC";
  if(!($updates = $database->query($query))){
    printf("Database not configured correctly");
    exit();
  }
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMS - სიახლეები</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/stylish-portfolio.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">
    <link href="../img/icons/favicon.png" rel="shortcut icon">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="style.css" rel="stylesheet">
  </head>
  <body>
    <?php include "nav.php" ?>
    <div id="top"></div>
    <!-- About -->
    <section id="about" class="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="text-center">სიახლეები</h2>
            <hr class="small">
            <div class="row">
              <div class="col-md-12 about-content">
                <button class="btn btn-warning" data-toggle="modal" data-target="#editArticle" onclick = "return setInsert()">
                <span class="fa fa-plus"> </span> სიახლის დამატება
                </button>
                <hr>
              </div>
                
              <?php
                while($row = $updates->fetch_array()){ ?>
              <div class="col-md-12 about-content" id="<?=$row['ID']?>">
                <div class="col-sm-3 col-md-3">
                  <img class="img-responsive news-thumb" src="../<?=$row["image"]?>" alt="<?= $row["header".$lang] ?>">
                </div>
                <div class="col-md-7 about-txt">
                  <h4><?= $row["header".$lang] ?></h4>
                  <span class="news-date"><?= date_format(date_create($row["pubdate"]), "d/m/Y") ?></span>
                </div>
                <div class="col-sm-3 col-md-3">
                  <button class="btn btn-success" title="რედაქტირება" data-toggle="modal" data-target="#editArticle" onclick = "return setEdit('<?=$row['ID']?>')">
                  <span class="fa fa-edit"></span>
                  </button>
                  <button class="btn btn-danger"  title="წაშლა" data-toggle="modal" data-target="#deleteArticle" onclick = "return sendForDelete(<?=$row['ID']?>)">
                  <span class="fa fa-trash"></span>
                  </button>
                </div>
              </div>
              <?php  }
                ?>
                
              <!-- Modal 1 სიახლის წაშლა -->
              <div class="modal fade" id="deleteArticle" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4  class="modal-title">სიახლის წაშლა</h4>
                    </div>
                    <div class="modal-body">
                      დარწმუნებული ხარ რომ გსურს სიახლის წაშლა?
                      <h4 id="deletePreview" class="alert alert-danger">(სიახლის სათაური)</h4><!-- უნდა აჩვენოს იმ სიახლის სათაური რომლის წაშლაც მინდა -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">უკან</button>
                        <button type="button" class="btn btn-danger" onclick="return deleteNews()">წაშლა</button>
                      </div>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
                
              <!-- Modal 2 სიახლის დამატება/რედაქტირება -->
              <div class="modal fade" id="editArticle" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <h4 class="modal-title">სიახლის რედაქტირება</h4>
                    </div>
                    <div class="modal-body">
                      <form id="newsForm" action="uploadNews.php" method="POST" enctype="multipart/form-data">
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
                          <label for="htmlKA">ტექსტი:</label>
                          <textarea class="form-control" id="htmlKA" placeholder="ტექსტი ..." name="htmlKA"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="htmlRU">ტექსტი (RU):</label>
                          <textarea class="form-control" id="htmlRU" placeholder="Текст ..." name="htmlRU"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="htmlEN">ტექსტი (EN):</label>
                          <textarea class="form-control" id="htmlEN" placeholder="Text ..." name="htmlEN"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="pubdate">თარიღი:</label>
                          <input type="date" class="form-control" id="pubdate" name="pubdate">
                        </div>
                        <div class="form-group">
                          <label for="image">ფოტო:</label>
                          <input type="file" id="image" name="image">
                          <small class="text-danger">* ფოტო არ უნდა აღემატებოდეს 2MB-ს.</small>
                          <img id="imagePreview" src="" class="form-img"><!-- შერჩეული/ატვირთული ფოტო -->
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">უკან</button>
                          <button type="button" class="btn btn-success" id="NewsCreate" onclick="validateFields()">შენახვა</button>
                        </div>
                      </form><!-- /Form სიახლის დამატება/რედაქტირება-->
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
                
            </div>
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src ="scripts/updates.js"></script>
    <script src="../js/jquery.charReplacer.js"></script>
    <script>
        $(function () {    
            $("textarea.form-control").charReplacer({ replaceChar: '\n', replaceWith: '<br>' }); //  replaces & with and;array   
            $("input[char-replace='true']").charReplacer();
        });
    </script>
  
  </body>
</html>