<!DOCTYPE html>
<?php
	include_once"database.php";
	if(isset($_POST["submit"])){
		if(isset($_FILES['fileToUpload'])){
			if ($_FILES["fileToUpload"]["size"] > 5000) {
   				 echo "Sorry, your file is too large.";
			}
			else{
				$name=$_FILES["fileToUpload"]["name"];
				$tmp_name=$_FILES["fileToUpload"]["tmp_name"];
				$extension=pathinfo($name,PATHINFO_EXTENSION);
				$count=getDownloadsCount();
				$finalname=getRandomString()."$count.$extension";
				move_uploaded_file($tmp_name, "../files/".$finalname);
				add_files($finalname);
				echo $name. " has been uploaded";
			}
		}
	}
	function getRandomString(){
		$array=array("56lZJ","Cbk25","0RoDg","Yr0If","c0ZLv","s7jq9");
		return $array[rand(0,5)];
	}

	function getDownloadsCount(){
		$sql="select count(downloadID) from downloads";
		return connection()->query($sql)->fetch()[0];
	}
	$files = get_files();
?>
<html>
<head>
	<title>Files</title>
</head>
<body>
	<form method="post" enctype="multipart/form-data">
    	Upload file:
    	<input type="file" name="fileToUpload" id="fileToUpload"><br/>
    	<input type="submit" value="Upload File" name="submit" class="btn btn-primary">
	</form>
	<hr/>

	<table>
		<?php
			foreach ($files as $key) {
		?>
			<div>
				<span><?php echo $key['fileName']; ?></span>
				<span class="pull-right">date uploaded: <?php echo $key['dateUploaded']; ?></span>
			</div>
		<?php
			}
		?>
	</table>
</body>
</html>