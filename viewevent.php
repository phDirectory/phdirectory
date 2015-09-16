<!DOCTYPE html>
<?php
	include_once"database.php";
	$id = $_GET['eventid'];
	$event = find_events($id);
?>
<html>
<head>
	<title>Event</title>
	<link href="assets/style.css" rel="stylesheet">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	
	<div class="box-event">
	<h2 id="event">Event</h2>
	<hr/>
	<?php foreach ($event as $e)
	{?>
		<div>
		<?php echo "<span style='font-weight:bold;'>Title: </span>".$e['title']; ?>
		<span class="pull-right"><?php echo "<span style='font-weight:bold;'>Date: </span>".$e['event_date']; ?></span>
		</div>
		<div style="font-weight:bold;">Info:</div>
		<div><?php echo $e['info'];?></div>
	<?php
	} ?>
	</div>
</body>
</html>