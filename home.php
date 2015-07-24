<?php
	$arr = array();
	include_once("database.php");
	if(isset($_POST["logout"]))
	{
		$arr = logout();
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link href="assets/style.css" rel="stylesheet">
   		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
  		<script src="assets/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</head>
	<body>
	<div class="container-fluid" id="container">
		<div class="row" id="menu">
			<div class="col-lg-1">
				<h1 id="title"><a href="#">PHDirectory</a></h1>
			</div>
			<div class="pull-right">
			<nav>
			<ul class="list-inline">
				<li>Agency</li>
				<li>News</li>
				<li>Services</li>
				<li>Notification</li>
				<li>Inquiry</li>
				<li>Subscription</li>
				<li><button type="submit" name="logout" id="logout">Logout</a></li>
			</ul>
			</nav>
			</div>
		</div><!--menu-->
	
	<div id="content">
	
	</div><!--content-->
	<!--<footer class="row">
		<p>COPYRIGHT &copy; 2014. DESIGNED BY TEAM BAYMAX. ALL RIGHTS RESERVED.</p> 
	</footer>	-->	
	</div><!--container-->
	</body>
</html>