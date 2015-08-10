<?php
	$arr = array();
	include_once("../database.php");
	 
	$page = "home";
	if(isset($_GET["page"])){
		$page = $_GET["page"];
	}

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link href="../assets/style.css" rel="stylesheet">
   		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
  		<script src="../assets/jquery.min.js"></script>
		<script src="../assets/js/bootstrap.min.js"></script>
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
				<li><a href="index.php">Home</a></li>
				<li><a href="index.php?page=agency">Agency</a></li>
				<li><a href="index.php?page=subplan">Subscription Plan</a></li>
				<li><a href="index.php?page=sub">Subscriber</a></li>
				<li><a href="index.php?page=report">Report</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
			</nav>
			</div>
		</div><!--menu-->
	
		<div id="content">
		<?php 
			if($page=="home"||$page=="agency"||$page=="subplan"||$page=="sub"||$page=="report"||$page=="subplan-add"||$page=="subplan-edit"){
				include_once($page.".php");
			}
			else{
				echo "Page Not Found!";
			}
			
		?>
		</div><!--content-->
	<!--<footer class="row">
		<p>COPYRIGHT &copy; 2014. DESIGNED BY TEAM BAYMAX. ALL RIGHTS RESERVED.</p> 
	</footer>	-->	
	</div><!--container-->
	</body>
</html>