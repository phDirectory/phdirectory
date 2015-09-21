<!DOCTYPE html>
<?php
	include_once"database.php";
	$id= $_GET['id'];
	$news = find_news($id);

?>
<html>
<head>
	<title>News</title>
	<link href="assets/style.css" rel="stylesheet">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	
	<div class="box-event">
	<?php foreach ($news as $n)
	{
	?>
		<div>
		<div><?php echo "<h2>".$n['newsType']."</h2>"; ?></div>
		<hr/>
		<?php echo "<h3>".$n['title']."</h3>"; ?>
		</div>
		<p><?php echo $n['info'];?></p>
		<span><?php if(!empty($n['link'])) echo 'read full article here: '; ?></span>
		<a href="<?php echo $n['link'];?>"><?php echo $n['link'];?></a>

	<?php
	} ?>
	</div>
</body>
</html>