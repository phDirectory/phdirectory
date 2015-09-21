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
					$array=array("News","Job Posting","Announcement");
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

			<input type="button" class="btn btn-primary" data-toggle="modal" data-target="#news-edit-modal" value="Edit">
			<button class="btn btn-default"><a href="index.php?page=news" style="color:#000;">back</a></button>
		</div>


		<!-- Modal -->
		<div id="news-edit-modal" class="modal fade" role="dialog">
		  <div class="modal-dialog">
		
		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Delete</h4>
		      </div>
		      <div class="modal-body">
		        <p>Are you sure you want to edit this <?php echo $n['newsType']?>?</p>
		      </div>
		      <div class="modal-footer">
		      	<input type="submit" class="btn btn-primary" name="add_news" value="Edit">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		
		  </div>
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