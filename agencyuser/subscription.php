<?php
include_once('database.php');
$plan = find_subplan();
$sp = get_sp();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<input type="button" value="New Plan" class="btn btn-primary" data-toggle="modal" data-target="#myModal">	
	<h2>Your Plan</h2>
	<hr/	>
	<?php
	foreach ($plan as $p) {
	?>
		<span style="font-weight:bold;"><?php echo $p['SPName'];?></span>
		<span class="pull-right"><?php echo "start date: ".$p['startDate'];?></span>
		
		<div>
		<span><?php echo $p['description'];?></span>
		<span class="pull-right"><?php echo "end date: ".$p['endDate'];?></span>
		</div>
		<div><?php ?></div>
    <hr/>	
	<?php	
	}
	?>


	<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Choose a Subscription Plan</h4>
      </div>
      <div class="modal-body">
        <table class="myTable">
        <?php
        	foreach ($sp as $splan) {
        ?>
        
        	<tr>
        		<td><?php echo $splan['SPName']?></td>
        		<td><?php echo $splan['description']?></td>
        		<td><a href="index.php?page=availsp&id=<?php echo $splan['SPID'] ?>">avail</a></td>
        	</tr>

        <?php
    	}
        ?>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

</body>
</html>