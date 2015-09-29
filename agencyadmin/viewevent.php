<!DOCTYPE html>
<?php
	include_once"../database.php";
	$id = $_GET['eventid'];
	$event = find_events($id);
?>
<html>
<head>
	<title>Event</title>
	<link href="../assets/style.css" rel="stylesheet">
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	
	<div class="box-event">
	<?php foreach ($event as $e)
	{?>
		<?php echo "<h2>".$e['title']."</h2>"; ?>
		<hr/>
		<div class="pull-right"><?php echo $e['eventStatus']; ?></div>
		<div style="font-weight:bold;" class="pull-right">Status:&nbsp;</div>
		<?php echo "<p> Date: ".$e['event_date']."</p>"; ?>
		<div><?php echo $e['info'];?></div>

	<?php
	} ?>
	</div>
</body>
</html>