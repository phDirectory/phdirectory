<?php
	include_once"../helper.php";
	connectTo("phdirectory_db");
	session_start();

	function conn()
	{
		return new PDO("mysql:host=localhost;dbname=phdirectory_db","root","");
	}
	function addnews($arr)
	{
		$db = conn();
		$sql = "INSERT INTO news(newsType, title, datePosted, dateEdited, info, link, cascade, agencyID)values(?,?,?,?,?,?,?,?)";
		$db->prepare($sql)->execute(array());
	}