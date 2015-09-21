<?php
	$arr = array();
	include_once("../database.php");
	 
	$page = "agency";
	if(isset($_GET["page"])){
		$page = $_GET["page"];
	}
  $sp = check_sp();
  $count = 0;
  $inq = countInquiry();
  $count = $inq['total'];
  ?>
<!DOCTYPE html>
<html>
	<head><title>PHdirectory</title>
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
    <script src="../assets/js/notify.js"></script>
    <script src="../assets/js/notify.min.js"></script>
<?php
  if(empty($sp))
  {
    echo "
    <script type='text/javascript'>
    $(document).ready(function() {
      $('a.disable').attr('href', 'index.php?page=error');
    });
    </script>";
  }

  if($count > 0)
  {
    echo "
    <script type='text/javascript'>
    $(document).ready(function() {
      notify();
    });
    </script>";
  }

?>
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
					 if($page=="moderator-edit"||$page=="cascade"||$page=="files"||$page=="error"||$page=="moderators-add"||$page=="moderators"||$page=="event"||$page=="event-update"||$page=="event-delete"||$page=="event-add"||$page=="agency"||$page=="agency-account"||$page=="agency-edit"||$page=="news"||$page=="service-add"||$page=="services"||$page=="service-edit"||$page=="notification"||$page=="inquiry"||$page=="inq-reply"||$page=="subscription"||$page=="user"||$page=="news-add"||$page=="news-edit"||$page=="availsp"){
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
			      <a href="index.php?page=moderators" class="list-group-item disable">Moderators</a>
			      <a href="index.php?page=news" class="list-group-item disable">News</a>
			      <a href="index.php?page=services" class="list-group-item disable">Services</a>
            <a href="index.php?page=event" class="list-group-item disable">Event</a>
			      <a href="index.php?page=inquiry" class="list-group-item disable pos-demo noti">Inquiry</a></li>
            <a href="index.php?page=files" class="list-group-item disable">Files</a>
            <a href="index.php?page=cascade" class="list-group-item disable">Hierarchy</a>
			      <a href="index.php?page=subscription" class="list-group-item">Subscription</a>
          </div>
        </div><!--/.sidebar-offcanvas-->
      </div><!--/row-->

    </div><!--/.container-->
    <script type="text/javascript">
    function notify(){
      $('.noti').notify(
        "You have <?php echo $count; ?> Inquiry",{position:"left"});  
    }
    </script>
	</body>

</html>