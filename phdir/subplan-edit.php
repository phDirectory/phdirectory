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
			<input type="button" value="Edit" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
		</div>

		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Edit</h4>
		      </div>
		      <div class="modal-body">
		        <p>Are you sure you want to change the Subscription Plan?</p>
		      </div>
		      <div class="modal-footer">
		      	<input type="submit" name="add" value="Edit" class="btn btn-primary">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		      </div>
		    </div>
		
		  </div>
		</div>
		</form>
	</body>
</html>
