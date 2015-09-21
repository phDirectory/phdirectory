<?php
include_once('database.php');
$plan = find_subplan();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h2>Your Plan</h2>
	<hr/	>
	<?php
	foreach ($plan as $p) {
	?>
		<span style="font-weight:bold;"><?php echo $p['SPName'];?></span>
		<span class="pull-right"><?php echo "start date: ".$p['startDate'];?></span>
		
		<div>
		<span><?php echo $p['description'];?></span>
		<span class="pull-right"><?php echo "end date: ".$p['endDate'];?></span>
		</div>
		<div><?php ?></div>
    <hr/>	
	<?php	
	}
	?>

</body>
</html>