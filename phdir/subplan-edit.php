<?php
	include_once"../database.php";
	$id = $_GET['id'];
	if(isset($_POST['add']))
	{
		if(isset($_POST['spname']) && isset($_POST['desc']) && isset($_POST['amount']))
		{
			$spname = $_POST['spname'];
			$desc = $_POST['desc'];
			$amount = $_POST['amount'];
			editsp($id, $spname, $desc, $amount);
			header("Location:index.php?page=subplan");
		}
	}
	$s = getsp($id);
?>	

<html>
	<head><title>PH directory - sub plan add</title></head>
	<body>
		<form method="post">
		<div>
			<h2>New Subscription Plan</h2>
			<input type="text" name="spname" placeholder="Subscription Name" class="form-control" value="<?php echo $s['SPName']?>" required>
			<input type="text" name="desc" placeholder="Description" class="form-control" value="<?php echo $s['description']?>" required>
			<input type="text" name="amount" placeholder="amount" class="form-control" 	value="<?php echo $s['amount']?>" required>
			<input type="submit" name="add" value="Save" class="btn btn-primary">
		</div>
		</form>
	</body>
</html>
