<?php
	include_once('database.php');
		$id = $_GET['id'];
	if(isset($_POST['add_news']))
	{
		if(isset($_POST['newstype'])&&isset($_POST['title'])&&isset($_POST['info']))
		{
			$id = $_GET['id'];
			$type = $_POST['newstype'];
			$title = $_POST['title'];
			$info = $_POST['info'];
			$link = $_POST['link'];

			editnews($id, $type, $title, $info, $link);
			header("Location:index.php?page=news");
		}
	}
	$n = getnews($id);	
?>

<html>
<head><title>PH directory - Add news</title></head>
<body>
	<h2>Edit News</h2>
	<form method="post" class="form-horizontal">
		<div class="form-group">
			<label id="form-label">News no. <?php echo $id;?></label><br>
			<label id="form-label">Type</label>
			<select name="newstype" class="form-control" required>
				<?php
					$array=array("News","Job Posting","Announcement","Event");
					foreach ($array as $value) {
						if($n["newsType"]==$value)
							echo'<option value="'.$value.'" selected>'.$value.'</option>';
						else
							echo'<option value="'.$value.'">'.$value.'</option>';
					}
				?>
			</select>
			<label id="form-label">Title</label>
			<input type="text" name="title" id="title" placeholder="Title" class="form-control" value="<?php echo $n['title']?>" required>

			<label id="form-label">Information</label>
			<textarea rows="4" name="info" placeholder="Enter Information here..." class="form-control" required><?php echo $n['info']?></textarea>

			<label id="form-label">Website link</label>
			<input type="text" name="link" id="link" placeholder="website link" class="form-control" value="<?php echo $n['link']?>">

			<input type="submit" class="btn btn-primary" name="add_news" value="Submit">
		</div>	
	</form>
	<script src="../assets/jquery.min.js"></script>
	<script>
		$(function(){
			$("select[name=newstype]").change(function(){
				console.log($(this).children(":selected").val());
			});			
		});
	</script>
</body>
</html>