<?php
include_once('database.php');
	$id = $_GET['id'];
	$amt = find_sp($id);
	add_sp($id, $amt['amount']);
	header("Location:index.php?page=subscription");
?>