<?php
	include_once('database.php');
	$sug = get_suggestion();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3>Suggestions</h3>
<hr/>
	<?php foreach ($sug as $g) { ?>
	
	<div><?php echo $g['message']; ?></div>
	<hr/>
	<?php } ?>
</body>
</html>