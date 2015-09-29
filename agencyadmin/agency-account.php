<?php
	include_once('database.php');
	$account = getaccount();
	if(isset($_POST['fname']))
	{
		if(!empty($_POST['fname'])){
			fname_edit($_POST);
		}
		header('Location:index.php?page=agency-account');
	}

	if (isset($_POST['contact-btn'])) {
		contact_edit($_POST);
		header('Location:index.php?page=agency-account');
	}

	if(isset($_POST['pass']))
	{
		if($_POST['currentpass']==$account['password'])
		{
			if($_POST['pass1']==$_POST['pass2'])
			{
				pass_edit($_POST);
				header('Location:index.php?page=agency-account');
			}
		}
		else
			echo "Input did not match";	
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
				<div id="input"><input type="password" name="currentpass" id="currentpass" placeholder="Current"></div>
				<div id="input"><input type="password" name="pass1" id="pass1" placeholder="New"></div>
				<div id="input"><input type="password" name="pass2" id="pass2" placeholder="Retype New"></div>
				<span>
					<input type="submit" value="save changes" name="pass" class="btn btn-primary" id="pass">
				</span>
				<span>
					<button class="btn" id="toogle1">cancel</button>
				</span>
			</div>

			<div id="edit-fname">
				<span>Fullname:&nbsp;</span>
				<span class="second"><?php echo $account['fullname'];?></span>
				<span class="pull-right">Edit</span>
			</div>
			<div id="panel-fullname">
				<div id="input">
					<span><input type="type" value="<?php echo $account['fullname'];?>" name="fullname" placeholder="firstname, lastname"></span>
				</div>
				<span>
					<input type="submit" value="save changes" name="fname" class="btn btn-primary">
				</span>
				<span>
					<button class="btn" id="toogle2">cancel</button>
				</span>	
			</div>

			<div id="edit-contact">
				<span>Contact: &nbsp;&nbsp;</span>
				<span class="second"><?php echo $account['contactNo'];?></span>
				<span class="pull-right">Edit</span>
			</div>
			<div id="panel-contact">
				<div id="input">
					<span><input type="type" value="<?php echo $account['contactNo'];?>" name="contact"></span>
				</div >
				<span>
					<input type="submit" value="save changes" name="contact-btn" class="btn btn-primary">
				</span>
				<span>
					<button class="btn" id="toogle3">cancel</button>
	 			</span>	
			</div>
			</form>

			
	</body>
<script>
$(function(){
	$('#editpass').click(function(){
		$("#panel-fullname").slideUp("slow");
		$("#panel-contact").slideUp("slow");
		$('#panel').slideDown('slow');
	});
	$("#edit-contact").click(function(){
		$('#panel').slideUp('slow');
		$("#panel-fullname").slideUp("slow");
		$("#panel-contact").slideDown("slow");
	});
	$("#edit-fname").click(function(){
		$('#panel').slideUp('slow');
		$("#panel-contact").slideUp("slow");
		$("#panel-fullname").slideDown("slow");
	});

	$("#toogle1").click(function(event){
		event.preventDefault();
		$('#panel').slideUp('slow');
	});
	$("#toogle2").click(function(event){
		event.preventDefault();
		$("#panel-fullname").slideUp("slow");
	});
	$("#toogle3").click(function(event){
		event.preventDefault();
		$("#panel-contact").slideUp("slow");
	});

	$('#pass').click(function(){
		$("#currentpass").val();
		$('#panel').slideDown('slow');
	});
	
});
</script>
</html>
