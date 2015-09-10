<?php
	include_once('database.php');
	$arr = array();
  	$array=array();
  	
  	if(isset($_POST['login']))
  	{
  	  $arr = login($_POST["email"],$_POST["password"]);
  	  if(empty($arr))
  	  {
  	    $err = "username or password is incorrect";
  	  }
  	}
  	else if(isset($_POST["subscribe"]))
  	{
  	  $array=subscribe($_POST);
  	}
	
  	$page = "home";
  	if(isset($_GET["page"]))
    {
  	  $page = $_GET["page"];
  	}
?>

<!DOCTYPE html>
<html>
<head>
<title>PHdirectory</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link href="assets/style.css" rel="stylesheet">
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/offcanvas.css" rel="stylesheet">
<link href='assets/fullcalendar.css' rel='stylesheet' />
<link href='assets/fullcalendar.print.css' rel='stylesheet' media='print' />
<script src='assets/lib/moment.min.js'></script>
<script src='assets/lib/jquery.min.js'></script>
<script src='assets/fullcalendar.min.js'></script>
<script>

	$(document).ready(function() {

		$('#calendar').fullCalendar({
			defaultDate: '2015-09-20',
			editable: false,
			eventLimit: true, // allow "more" link when too many events
			events: {
        url: 'get-events.php'
        
        }
		});
		
	});

</script>
<style>

	body 
  {
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
    background-color: #eee;
	}

	#calendar 
  {
		max-width: 900px;
		margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 3px;
	}
</style>
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
      	<div id='calendar'></div>
      <?php }else if($page == "about"){ ?>
        <div class="jumbotron">
            <h1 class="text-center">About</h1>
            <hr class="star-primary">
              <p class="text-center">
                PHdirectory is a Philippine Government directory application.
                It serves as an information gateway for the public to be well-informed about the news,
                announcements and other related information from various agencies.
              </p>
        </div>
      <?php }else if($page == "contact"){ ?>
      
          <div class="jumbotron">
                     <h1>Contact</h1>
               <div>
                      09336926401
               </div>
          </div>
      
      <?php }else if($page == "login"){ ?>
            <div class="box">
                     <h2 class="text-center">Login</h2>
                     <hr/>
              <div class="contain">
              <div id="err-msg"><?php if(isset($_POST['login']))echo $err; ?></div>
              <form method="post">
                  <input type="text" name="email" placeholder="Username" class="form-control" value="<?php if(isset($_POST['email'])) echo $_POST['email'];?>" required autofocus>
                  <input type="password" name="password" placeholder="Password" class="form-control" required>
                  <button type="submit" name="login" class="btn btn-lg btn-primary btn-block">Login</button>
              </form>
              </div>
            </div>
      
      <?php }else if($page == "subscribe"){ ?>
               
            <div class="box">
                     <h2 class="text-center">Subscribe</h2>
                     <hr/>
               <div class="contain">
               <?php
               //if(isset($array["message"])){
               //   echo'<label style="color:red;display:block;">'.$array["message"].'</label>';
               //}
               ?>
                  <form method="post">
                  <h4>User Profile</h4>
                  <?php
                  if(empty($array))
                  {
                    echo '<input type="text" name="username" placeholder=" Username" class="form-control" required autofocus>';
                  }
                  else if($array['ok'])
                  {
                    echo '<input type="text" name="username" placeholder=" Username" class="form-control" required autofocus>';
                  }
                  else if(!$array['ok'])
                  {
                    if(!$array['ok-username'])
                    {
                      echo '<input style="border: 2px solid red;" type="text" name="username" placeholder=" Username" class="form-control" value="'.$_POST["username"].'" required>';
                    }
                    else
                      echo '<input type="text" name="username" placeholder=" Username" class="form-control" value="'.$_POST["username"].'" required>';
                  }
                  if(isset($array["message-user"]))
                  echo'<label style="color:red;display:block;">'.$array["message-user"].'</label>';
                  ?>
                  <input type="password" name="password" placeholder=" Password" class="form-control" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>" required>
                  <?php
                  if(empty($array))
                  { 
                    echo '<input type="password" name="cpassword" placeholder=" Confirm Password" class="form-control" required>';
                  }
                  else if($array['ok'])
                  {
                    echo '<input type="password" name="cpassword" placeholder=" Confirm Password" class="form-control" required>';
                  }
                  else if(!$array['ok'])
                  {
                    if(!$array['ok-pass'])
                    {
                      echo '<input style="border: 2px solid red;" type="password" name="cpassword" placeholder=" Confirm Password" class="form-control" value="'.$_POST["cpassword"].'" required>';
                    }
                    else
                      echo '<input type="password" name="cpassword" placeholder=" Confirm Password" class="form-control" value="'.$_POST["cpassword"].'" required>';
                  }
                  if(isset($array["message-pass"]))
                  echo'<label style="color:red;display:block;">'.$array["message-pass"].'</label>';
                  ?>
                  <input type="text" name="fullname" placeholder=" Fullname" class="form-control" value="<?php if(isset($_POST['fullname'])) echo $_POST['fullname']; ?>" required>
                  <input type="text" name="contactNo" placeholder=" Contact Number" class="form-control" value="<?php if(isset($_POST['contactNo'])) echo $_POST['contactNo']; ?>" required>
      
                  <h4>Agency Profile</h4>
                  <input type="text" name="agencyname" placeholder=" Agency name" class="form-control" value="<?php if(isset($_POST['agencyname'])) echo $_POST['agencyname']; ?>" required>
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
                    if(!$array['ok-email'])
                    {
                      echo'<input style="border: 2px solid red;" type="email" value="'.$_POST["agencyemail"].'" name="agencyemail" placeholder=" Email Address" class="form-control" required>';
                    }
                    else
                    {
                       echo'<input type="email" name="agencyemail" placeholder=" Email Address" class="form-control" value="'.$_POST["agencyemail"].'" required>';
                    }
                  }
                  if(isset($array["message-email"]))
                  echo'<label style="color:red;display:block;">'.$array["message-email"].'</label>';
                 ?>
                  <input type="text" name="agencyphone" placeholder=" Phone Number" class="form-control" value="<?php if(isset($_POST['agencyphone'])) echo $_POST['agencyphone']; ?>" required>
      
      
                  <button type="submit" name="subscribe" class="btn btn-lg btn-primary btn-block">Subscribe</button>
               </form>
                 </div>
            </div>
      
      <?php } ?>
    </div><!--/row-->
</div><!--/.container-->

<!--scripts-->
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
    <script src="assets/bootstrap.min.js"></script>
    <script src="assets/ie10-viewport-bug-workaround.js"></script>
    <script src="assets/offcanvas.js"></script>
</body>
</html>
