<?php
  include_once('database.php');
  $arr = array();
  $array=array();
  
  if(isset($_POST['login']))
  {
    $arr = login($_POST["email"],$_POST["password"]);
  }
  else if(isset($_POST["subscribe"]))
  {
    $array=subscribe($_POST);
  }

  $page = "";
  if(isset($_GET["page"])){
    $page = $_GET["page"];
  }else{
    $page = "home";
  }
?>  
<!DOCTYPE html>

<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>PHdirectory</title>
    <link href="assets/style.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
     <link href="assets/css/offcanvas.css" rel="stylesheet">

  </head>

  <body>
    <nav class="navbar navbar-fixed-top navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">PHdirectory</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse ">
          <ul class="nav navbar-nav">
            <li><a href="index.php?page=about">About</a></li>
            <li><a href="index.php?page=contact">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php?page=subscribe">Subscribe</a></li>
            <li><a href="index.php?page=login">Login</a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">
<?php if($page == "home"){ ?>

    <div class="pull-right">
               <h1>Home</h1>
         <div>
                balay
               </div>
        </div>

<?php }else if($page == "about"){ ?>

    <div class="pull-right">
               <h1>About</h1>
         <div>
                This is awesome!
               </div>
        </div>

<?php }else if($page == "contact"){ ?>

    <div class="pull-right">
               <h1>Contact</h1>
         <div>
                09336926401
         </div>
    </div>

<?php }else if($page == "login"){ ?>
      <div class="pull-right">
               <h1>Login</h1>
         <div>
               <form method="post">
            <input type="text" name="email" placeholder=" Agency name" class="form-control">
            <input type="password" name="password" placeholder=" Password" class="form-control"s>
            <button type="submit" name="login" class="btn btn-lg btn-primary btn-block">Login</button>
         </form>
               </div>
            </div>

<?php }else if($page == "subscribe"){ ?>
         
           <div class="pull-right">
               <h1>Subscribe</h1>
         <div>
         <?php
         if(isset($array["message"])){
            echo'<label style="color:red;display:block;">'.$array["message"].'</label>';
         }
         ?>
            <form method="post">
            <h4>User Profile</h4>
            <input type="text" name="username" placeholder=" Username" class="form-control">
            <input type="password" name="password" placeholder=" Password" class="form-control">
            <input type="password" name="cpassword" placeholder=" Confirm Password" class="form-control">
            <input type="text" name="fullname" placeholder=" Full name" class="form-control">
            <input type="text" name="contactNo" placeholder=" Contact Number" class="form-control">

            <h4>Agency Profile</h4>
            <input type="text" name="agencyname" placeholder=" Agency name" class="form-control">
            <?php 
            if(empty($array))
            {
              echo'<input type="email" name="agencyemail" placeholder=" Email Address" class="form-control" required>';
            }
            else if($array["ok"])
            {
              echo'<input type="email" name="agencyemail" placeholder=" Email Address" class="form-control" required>';
            }
            else if(!$array["ok"])
            {
              echo'<input style="border: 2px solid red;" type="email" value="'.$_POST["agencyemail"].'" name="agencyemail" placeholder=" Email Address" class="form-control" required>';
            }
           ?>
            <input type="text" name="agencyphone" placeholder=" Phone Number" class="form-control">


            <button type="submit" name="subscribe" class="btn btn-lg btn-primary btn-block">Subscribe</button>
         </form>
           </div>
           </div>

<?php } ?>
      </div><!--/row-->
    </div><!--/.container-->
    <script src="assets/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script>
var x = document.getElementById("demo");

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    $("#lat").val(position.coords.latitude);
  $("#long").val(position.coords.longitude);
}

  </script>
  
    <script src="assets/ie-emulation-modes-warning.js"></script>
    <script src="assets/jquery.min.js"></script>
    <script src="assets/bootstrap.min.js"></script>
    <script src="assets/ie10-viewport-bug-workaround.js"></script>
    <script src="assets/offcanvas.js"></script>
</body>
</html>