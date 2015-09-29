<?php
	include_once('database.php');
	$inquiry = get_inquiry();
		if(isset($_COOKIE))
		{
			$subcount = $_COOKIE['count'];
			setcookie('subcount', $subcount);
			echo "<script type='text/javascript'>
    		$(document).ready(function() {
      		$('.badge').css('display', 'none');
    		});
    		</script>";
		}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Inquiry</title>
</head>
<body>
	<h2>Inquiry</h2>
	<hr/>
	<?php
		if(empty($inquiry))
		{
			echo "<h4 class='error'>No Inquiries Available.</h4>";
		} 
		foreach ($inquiry as $i) 
		{ 
	?>

			<a href="index.php?page=trail&id=<?php echo $i['inquiryID']; ?>">
				<span id="name"><?php echo $i["fullname"];?></span>
				<span><?php echo $i["title"];?></span>
			</a>
			<hr/>

	<?php 
		}
	?>

</body>
</html>