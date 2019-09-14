<?php
    require_once("user/user.php");
    
    if($_SERVER["REQUEST_METHOD"] === "POST"){
    
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        User::login($email,$pwd);
    }
    
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CMS - ავტორიზაცია</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/stylish-portfolio.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">
    <link href="../img/icons/favicon.png" rel="shortcut icon">
    <link href="style.css" rel="stylesheet">
  </head>
  <body class="about">
    <section>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h2 class="text-center">ავტორიზაცია</h2>
            <hr class="small">
            <div class="row">
              <div class="about-content col-md-4 col-md-offset-4 sign-in">
                <form action="#" method="POST"><!-- Form ავტორიზაცია -->
                  <div class="form-group">
                    <label for="email">ელ-ფოსტა:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                  </div>
                  <div class="form-group">
                    <label for="pwd">პაროლი:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
                  </div>
                  <div class="checkbox">
                    <label><input type="checkbox" name="remember"> დამახსოვრება</label>
                  </div>
                  <button type="submit" class="btn btn-success">შესვლა</button>
                </form><!-- /Form ავტორიზაცია -->
              </div>
            </div>
          </div><!-- /.col-lg-12 -->
        </div><!-- /.row -->
      </div><!-- /.container -->
    </section>
    <script src="../js/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>

