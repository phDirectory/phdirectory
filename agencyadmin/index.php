<?php
	$arr = array();
	include_once("../database.php");
	 
	$page = "agency";
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
    <link href="../assets/css/offcanvas.css" rel="stylesheet">
    <script src="../assets/ie-emulation-modes-warning.js"></script>
    <script src="../assets/jquery.min.js"></script>
    <script src="../assets/bootstrap.min.js"></script>
    <script src="../assets/ie10-viewport-bug-workaround.js"></script>
    <script src="../assets/offcanvas.js"></script>
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
          <a class="navbar-brand" href="#">PHdirectory</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse pull-right">
          <ul class="nav navbar-nav">
            <li><a href="index.php?page=agency-account">Profile</a></li>
            <li><a href="logout.php">Logout</a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
          
          <p>	<?php 
					 if($page=="moderator-edit"||$page=="files"||$page=="moderators-add"||$page=="moderators"||$page=="event"||$page=="event-update"||$page=="event-delete"||$page=="event-add"||$page=="agency"||$page=="agency-account"||$page=="agency-edit"||$page=="news"||$page=="service-add"||$page=="services"||$page=="service-edit"||$page=="notification"||$page=="inquiry"||$page=="inq-reply"||$page=="subscription"||$page=="user"||$page=="news-add"||$page=="news-edit"||$page=="availsp"){
						include_once($page.".php");
					 }
					 else{
					   echo "Page Not Found!";
					 }
			    ?></p>
          </div>
          
        </div><!--/.col-xs-12.col-sm-9-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
            <a href="index.php?page=agency" class="list-group-item">Agency</a>
			      <a href="index.php?page=moderators" class="list-group-item">Moderators</a>
			      <a href="index.php?page=news" class="list-group-item">News</a>
			      <a href="index.php?page=services" class="list-group-item">Services</a>
            <a href="index.php?page=event" class="list-group-item">Event</a>
			      <a href="index.php?page=notification" class="list-group-item">Notification</a>
			      <a href="index.php?page=inquiry" class="list-group-item">Inquiry</a></li>
            <a href="index.php?page=files" class="list-group-item">Files</a>
			      <a href="index.php?page=subscription" class="list-group-item">Subscription</a>
          </div>
        </div><!--/.sidebar-offcanvas-->
      </div><!--/row-->

      <hr>

    </div><!--/.container-->
	</body>

</html>