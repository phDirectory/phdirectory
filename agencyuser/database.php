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
		$sql = "SELECT * FROM news WHERE status = 'A' && agencyID = '".$userData["agencyID"]."' ORDER BY newsType";
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

	/////////////////////////////////////////////////////////////


	function getallservices()
	{
		$userData = $_SESSION["userData"];
		$db = conn();
		$sql = "SELECT * FROM services ORDER BY serviceID";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;
	}

	function addservice($arr)
	{
		$userData = $_SESSION["userData"];
		connection()->exec("INSERT INTO services(serviceName, serviceType, details,agencyID)VALUES('".$arr['servicename']."','".$arr['servicetype']."','".$arr['details']."','".$userdata['agencyID']."',)");
		
	}

	/////////////////////////////////////////////agency profile

	function getagency($id)
	{
		$db = conn();
		$sql = "select * from agency where agencyID = $id";
		$result = $db->query($sql)->fetch();
		return $result;
		$db = null;
	}

	function editagency($arr)
	{
		$id = $_SESSION["userData"]['agencyID'];
		$db = conn();
		$sql = "UPDATE agency SET agencyName=?, email=?, info=?, phoneNo=?, cityAddress= ?, houseNo=?, StreetAddress=?, barangayAddress=? WHERE agencyID = $id ";
		$s = $db->prepare($sql);
		$s->execute(array($arr['agencyname'], $arr['email'], $arr['info'], $arr['phone'],$arr['city'],$arr['house'],$arr['street'],$arr['barangay']));
		$db = null;
	}

////////////////////////

		function getaccount()
	{
		$id = $_SESSION["userData"]['agencyUserID'];
		$db = conn();
		$sql = "SELECT * FROM agency_user WHERE agencyUserID = $id"; 
		$result = $db->query($sql)->fetch();
		return $result;
		$db = null;
	}

	function pass_edit($pass)
	{
		$id=$_SESSION['userData']['agencyUserID'];
		$db = conn();
		$sql = "UPDATE agency_user SET password = ? WHERE agencyUserID = $id";
		$s = $db->prepare($sql);
		$s->execute(array($pass['pass1']));
		$db = null;
	}

	function fname_edit($fname)
	{
		$id=$_SESSION['userData']['agencyUserID'];
		$db = conn();
		$sql = "UPDATE agency_user SET fullname = ? WHERE agencyUserID = $id";
		$s = $db->prepare($sql);
		$s->execute(array($fname['fullname']));
		$db = null;
	}

	function contact_edit($contact)
	{
		$id=$_SESSION['userData']['agencyUserID'];
		$db = conn();
		$sql = "UPDATE agency_user SET contactNo = ? WHERE agencyUserID = $id";
		$s = $db->prepare($sql);
		$s->execute(array($contact['contact']));
		$db = null;
	}