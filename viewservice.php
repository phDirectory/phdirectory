<!DOCTYPE html>
<?php
	include_once"database.php";
	$id = $_GET['id'];
	$service = find_serv($id);
?>
<html>
<head>
	<title>Service</title>
	<link href="assets/style.css" rel="stylesheet">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	
	<div class="box-event">
		<?php echo "<h2>".$service['serviceName']."</h2>"; ?>
		<hr/>
		<?php echo "<h3>".$service['serviceType']."</h3>"; ?>
		<p><?php echo $service['details'];?></p>
	</div>
</body>
</html>