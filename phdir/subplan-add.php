<?php
	include_once"../database.php";
	if(isset($_POST['add']))
	{
		if(isset($_POST['spname']) && isset($_POST['desc']) && isset($_POST['amount']))
		{

			addsp($_POST);
			header("Location:index.php?page=subplan");
		}
	}

?>

<html>
	<head><title>PH directory - sub plan add</title></head>
	<body>
		<form method="post">
		<div>
			<h2>New Subscription Plan</h2>
			<input type="text" name="spname" placeholder="Subscription Name" required>
			<input type="text" name="desc" placeholder="Description" required>
			<input type="text" name="amount" placeholder="amount" required>
			<input type="submit" name="add" value="Add" class="btn btn-primary">
		</div>
		</form>
	</body>
</html>
