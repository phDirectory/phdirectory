<?php
	include_once('../database.php');
	$account = find_admin();

	if(isset($_POST['pass']))
	{
		if($_POST['currentpass']==$account['password'])
		{
			if($_POST['pass1']==$_POST['pass2'])
			{
				adminpass_edit($_POST);
				header('Location:index.php?page=admin-account');
			}
		}
	}
?>

<html>
	<body>
		<span>Account</span>
			<div id="user">
				<span>Username:</span>
				<span class="second"><?php echo $account['username'];?></span>
				<span></span>	
			</div>
			<form method="post">
			<div id="editpass">
				<span>Password:</span>
				<span class="second"></span>	
				<span class="pull-right">Edit</span>
			</div>
			<div id="panel">
				<div id="input"><input type="password" name="currentpass" id="password" placeholder="Current"></div>
				<div id="input"><input type="password" name="pass1" id="password" placeholder="New" ></div>
				<div id="input"><input type="password" name="pass2" id="password" placeholder="Retype New" ></div>
				<span>
					<input type="submit" value="save changes" name="pass" class="btn btn-primary">
				</span>
				<span>
					<button class="btn" id="toggle">cancel</button>
				</span>
			</div>
			</form>
	</body>
<script>

$(function(){
	$("#editpass").click(function(){
		$("#panel").slideToggle("slow");
	});
	$("#toggle").click(function(event){
		event.preventDefault();
		$('#editpass').click();
	});
});
</script>
</html>