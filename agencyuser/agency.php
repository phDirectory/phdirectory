<?php
	include_once('database.php');
	if(!isset($_SESSION['userData']['agencyID']))
	{
		header('Location:../index.php');
	}
		$id = $_SESSION['userData']['agencyID'];
		$agency = getagency($id);
		$rate = countRate();
?>
<html>
	<body>
		<span>Agency details</span>
		<span class="stars"><span style="width: 80px;"></span></span>
		<table class="table">
			<tr>
				<td>Agency Name:</td>
				<td><?php echo $agency['agencyName'];?></td>	
			</tr>
			<tr>
				<td>Agency Information:</td>
				<td><?php echo $agency['info'];?></td>	
			</tr>
			<tr>
				<td>Email:</td>
				<td><?php echo $agency['email'];?></td>	
			</tr>
			<tr>
				<td>Contact No.:</td>
				<td><?php echo $agency['phoneNo'];?></td>	
			</tr>
			<tr>
				<td>Address:</td>
				<td><?php echo $agency['houseNo']." ";
						  echo $agency['StreetAddress']." ";
						  echo $agency['barangayAddress'].", ";
						  echo $agency['cityAddress'];?>
				</td>	
			</tr>
		</table>
		<button class="btn btn-primary"><a href="index.php?page=agency-edit">Edit</a></button>
		<script type="text/javascript">
        $(function() {
                $('span.stars').stars();
        });

        $.fn.stars = function() {
            var total = <?php echo $rate['rate'];?>;
            return $(this).each(function() {
                $(this).html($('<span />').width(Math.max(0, (Math.min(5, total))) * 16));
            });
        }
    	</script>
	</body>
</html>