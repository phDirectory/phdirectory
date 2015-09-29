<?php
include_once('database.php');
$id = $_GET['id'];
$inq = find_inqui($id);
$trail = get_trail($id);
//print_r($trail);
if(isset($_POST['reply']))
{
	add_trail($id, $_POST['message']);
	header("location:index.php?page=trail&id=1");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<span id="name"><?php echo $inq['fullname']; ?></span>
	<span><?php echo $inq['title']; ?></span>
	<hr/>
	<div id="trail">
	<?php foreach ($trail as $t) { ?>
			<span id="name"><?php if($t['trailFrom'] == 'A') echo $t['agencyName']; else echo $t['fullname']; ?></span>
			<span><?php echo $t['message']; ?><span>
			<hr/>	
	<?php } ?>
			<form method="post" class="form-horizontal">
			<div class="form-group">
				<label>Reply</label>
	    		<textarea rows="1" class="form-control" name="message" required></textarea>
	    		<input type="submit" value="reply" name="reply" class="btn btn-primary">
	    		<a href="index.php?page=inquiry" class="btn btn-default">back</a>
	    	</div>
	    </div>
	</form>
</body>
</html>