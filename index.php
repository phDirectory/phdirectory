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
   	<script src="assets/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
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
               <form method="post">
			   		<input type="text" name="agencyname" placeholder=" Agency name"><br>
				   	<?php 
						if(empty($array))
						{
							echo'<input type="text" name="agencyemail" placeholder=" Email Address"><br>';
						}
						else if($array["ok"])
						{
							echo'<input type="text" name="agencyemail" placeholder=" Email Address"><br>';
						}
						else if(!$array["ok"])
						{
							echo'<input style="border: 2px solid red;" type="text" name="agencyemail" placeholder=" Email Address"><br>';
							echo'<label style="color:red;display:block;">'.$array["message"].'</label>';
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
	<script>
		
	</script>
</body>
</html>