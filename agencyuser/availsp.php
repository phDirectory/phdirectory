<?php
include_once('../agencyadmin/database.php');
	$id = $_GET['id'];
	add_sp($id);
	header("Location:index.php?page=subscription");
?>