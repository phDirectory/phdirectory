<?php
	include_once"database.php";
	$id = $_GET['id'];
	if(isset($_POST['reply']))
	{
		add_inquiry($id, $_POST['title'], $_POST['message']);
		$msg = "message sent";
		echo 
		"<script type='text/javascript'>
			alert('$msg');
			window.location = 'index.php?page=inquiry';
		</script>";

	}
?>	
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" class="form-horizontal">
		<div class="form-group">
			<h2>Reply</h2>
			<div>Title</div>
	    	<input type="text" class="form-control" name="title" required>
	    	<div>Message</div>
	    	<textarea rows="4" class="form-control" name="message" required></textarea>
	    	<input type="submit" value="reply" name="reply" class="btn btn-primary">
	    	<a href="index.php?page=inquiry" class="btn btn-default">back</a>
	    </div>
	</form>
</body>
</html>


