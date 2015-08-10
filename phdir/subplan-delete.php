<?php
	include_once"../database.php";
	$id = $_GET['id'];
	deletesp($id);
	header('Location:index.php?page=subplan');

?>