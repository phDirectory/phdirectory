<?php
	//include_once"../helper.php";
	//connectTo("phdirectory_db");
	

	function connection()
	{
		return new PDO("mysql:host=localhost;dbname=phdirectory_db","root","");
	}

	function addnews($arr)
	{
		$userData = $_SESSION["userData"];
		$date = date("Y-m-d");
		$type = $_POST['newstype'];
		$title = $_POST['title'];
		$info = $_POST['info'];
		$link = $_POST['link'];
		conn()->exec("INSERT INTO news(newsType, title, datePosted, info, link,agencyID)VALUES('". $type ."','". $title ."','". $date ."','". $info ."','". $link ."','".$userData["agencyID"]."')");
	}

	function getallnews()
	{
		$userData = $_SESSION["userData"];
		$db = conn();
		$sql = "SELECT * FROM news WHERE status = 'A' && agencyID = '".$userData["agencyID"]."' ORDER BY newsID";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;
	}

	function editnews($id, $type, $title, $info, $link)
	{
		$date = date("Y-m-d");
		$db = conn();
		$sql = "UPDATE news SET dateEdited = '$date', newsType = '$type', title = '$title', info = '$info', link = '$link' WHERE newsID = $id ";
		$s = $db->prepare($sql);
		$s->execute(array($date, $type, $title, $info, $link));
		$db = null;
	}

	function deletenews($id) 
	{
		$db = connection();// tungod wala gi include sa index ang delete.php mao di makita ang conn()
		$sql = "UPDATE news SET status = 'I' WHERE newsID = $id ";
		$s = $db->prepare($sql);
		$s->execute();
		$db = null;
	}
	
	function getnews($id)
	{
		$db = conn();
		$sql = "SELECT * FROM news WHERE newsID = $id";
		$result = $db->query($sql)->fetch();
		return $result;
		$db = null;
	}

	//////////////////////////////////////////////// moderator

	function getModAccounts()
	{
		$db = conn();
		$sql = "SELECT * FROM agency_user WHERE agencyUserType = 'M' and status='A'";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;
	}

	function addMod($arr)
	{
		$userData = $_SESSION["userData"];
		conn()->exec("INSERT INTO agency_user(username, password, contactNo, fullname, agencyUserType, agencyID,status)VALUES('". $arr["username"] ."','". $arr["password"] ."','". $arr["contactNo"] ."','". $arr["fullname"] ."','M','".$userData["agencyID"]."','A')");
	}

	function deleteMod($id) 
	{
		$db = connection();// tungod wala gi include sa index ang delete.php mao di makita ang conn()
		$sql = "UPDATE agency_user SET status = 'I' WHERE agencyUserId = $id ";
		$s = $db->prepare($sql);
		$s->execute();
		$db = null;
	}

	function editmod($id, $uname, $pass, $fname, $contact)
	{
		$db = conn();
		$sql = "UPDATE agency_user SET username = '$uname', password = '$pass', fullname = '$fname', contactNo = $contact WHERE agencyUserID = $id";
		$s = $db->prepare($sql);
		$s->execute(array($uname, $pass, $fname, $contact));
		$db = null;
	}

	function getmod($id)
	{
		$db = conn();
		$sql = "SELECT * FROM agency_user WHERE agencyUserID = $id";
		$result = $db->query($sql)->fetch();
		return $result;
		$db = null;
	}