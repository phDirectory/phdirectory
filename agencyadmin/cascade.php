<!DOCTYPE html>
<?php
	include_once('database.php');
	$agency = getallagency();
	$hierarchy=getHierarchy();
	for($i = 0;$i < count($agency);$i++){
		foreach($hierarchy as $hierarchyitem){
			
			if($agency[$i]["agencyID"] == $hierarchyitem["subAgencyID"]){
				array_splice($agency,$i,1);
			}
		}
	}
	$join = join_hierarchy();
	if(isset($_POST['submit']))
	{
		if(!empty($_POST['agency']))
		{
			hierarchy($_POST['agency']);
			echo "Agency has has been added to your hierarchy";
			header("Refresh: 2; index.php?page=cascade");
		}
	}
?>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="post" class="form-inline">
		<label id="form-label">Add sub-agency</label>
		<select name="agency" class="form-control" required>
				<?php
					foreach ($agency as $value)
					{
						if($value['agencyID'] != $_SESSION['userData']["agencyID"])
						{	
							echo '<option value="'.$value["agencyID"].'">'.$value['agencyName']."</option>";
						}
					}
				?>
		</select>
		<input type="submit" class="btn btn-primary" name="submit"> 
	</form>
		<hr/>
	<h3>Sub-Agency</h3>
	<table class="table">
	<?php
		foreach ($join as $j) {?>
			<tr>
				<td></td>
				<td>
					<?php echo $j['agencyName'];?>
				</td>
				<td>
					<a href="hier-delete.php?id=<?php echo $j['GovHierID']; ?>" onclick="return confirm('Are you sure you want to remove this agency?');">remove</a>
				</td>
			</tr>
	<?php
		}
	 ?>
	 </table>
	 <hr/>
</body>
</html>