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
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link href="assets/style.css" rel="stylesheet">
   	<link href="assets/css/bootstrap.min.css" rel="stylesheet">

</head>
<body style="background-image:url(images/bg.jpg); width:100%; background-repeat:no-repeat;">
    <div class="container-fluid" id="container">
        <div class="row" id="menu">

            <div class="col-lg-1">
                <h1><a href="#">PHDirectory</a></h1>
			</div>

			<div class="pull-right">
            	<nav class='dropdown-menu-left'>
                	<ul class="list-inline">
                	    <li><a href="index.php">Home</a></li>
                	    <li><a href="index.php?page=about">About</a></li>
                	    <li><a href="index.php?page=contact">Contact</a></li>
               		 	<li><a href="index.php?page=subscribe">Subscribe</a></li>
                	    <li><a href="index.php?page=login">Login</a></li>
                	</ul>
            	</nav>
            </div>
         
        </div>
	   <div id="content">
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
			   		<input type="text" name="email" placeholder=" Agency name"><br>
				   	<input type="password" name="password" placeholder=" Password"><br>
				    <button type="submit" name="login">Login</button>
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
			   		<input type="text" name="username" placeholder=" Username" ><br>
			   		<input type="password" name="password" placeholder=" Password" ><br>
			   		<input type="password" name="cpassword" placeholder=" Confirm Password" ><br>
			   		<input type="text" name="fullname" placeholder=" Full name" ><br>
			   		<input type="text" name="contactNo" placeholder=" Contact Number" ><br>

			   		<h4>Agency Profile</h4>
			   		<input type="text" name="agencyname" placeholder=" Agency name" ><br>
				   	<?php 
						if(empty($array))
						{
							echo'<input type="email" name="agencyemail" placeholder=" Email Address" required><br>';
						}
						else if($array["ok"])
						{
							echo'<input type="email" name="agencyemail" placeholder=" Email Address" required><br>';
						}
						else if(!$array["ok"])
						{
							echo'<input style="border: 2px solid red;" type="email" value="'.$_POST["agencyemail"].'" name="agencyemail" placeholder=" Email Address" required><br>';
						}
				   ?>
				   	<input type="text" name="agencyphone" placeholder=" Phone Number"><br>


				    <button type="submit" name="subscribe">Subscribe</button>
			   </form>
           </div>
           </div>

<?php } ?>
	   </div><!--content-->
	   
    </div>
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
</body>
</html>