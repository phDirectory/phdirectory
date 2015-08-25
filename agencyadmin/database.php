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
		$sql = "UPDATE agency_user SET status = 'I' WHERE agencyUserID = $id ";
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

	////////////////////////////////////////////////////////////service


	function getallservices()
	{
		$userData = $_SESSION["userData"]["agencyID"];
		$db = conn();
		$sql = "SELECT * FROM services where agencyID = $userData ORDER BY serviceID";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;
	}

	function find_service($id)
	{
		$db = conn();
		$sql = "SELECT * FROM services WHERE serviceID = $id";
		$result = $db->query($sql)->fetch();
		return $result;
		$db=null;
	}

	function addservice($arr)
	{
		$userData = $_SESSION["userData"]['agencyID'];
		connection()->exec("INSERT INTO services(serviceName, serviceType, details,agencyID,status)VALUES('".$arr['servicename']."','".$arr['servicetype']."','".$arr['details']."','".$userData."','A')");
		
	}

	function service_edit($arr)
	{
		$id=$_GET['id'];
		$db = conn();
		$sql = "UPDATE services SET serviceName = ?, serviceType = ?, details = ? WHERE serviceID = $id";
		$s = $db->prepare($sql);
		$s->execute(array($arr['servicename'], $arr['servicetype'], $arr['details']));
	}

	function service_delete($id)
	{
		$db = connection();// tungod wala gi include sa index ang delete.php mao di makita ang conn()
		$sql = "UPDATE services SET status = 'I' WHERE serviceID = $id ";
		$s = $db->prepare($sql);
		$s->execute();
		$db = null;
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

	function getaccount()
	{
		$id = $_SESSION["userData"]['agencyID'];
		$db = conn();
		$sql = "SELECT * FROM agency_user WHERE agencyID = $id"; 
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
/////////////////////////////////////////////////event 

	function get_event()
	{
		$db = conn();
		$sql = "SELECT * FROM events ORDER BY title";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;
	}

	function event_add($arr)
	{
		$date = date('Y-m-d');
		$db = conn();
		$id=$_SESSION['userData']['agencyID'];
		$sql = "INSERT INTO events(title, datePosted, info, event_date, agencyID, status) VALUES(?,?,?,?,$id,'A')";
		$s = $db->prepare($sql);
		$s->execute(array($arr['title'],$date,$arr['info'],$arr['event-date']));
	}

	function find_event()
	{
		$id=$_SESSION['userData']['agencyID'];
		$db = conn();
		$sql = "SELECT * FROM events WHERE agencyID = $id";
		$result = $db->query($sql)->fetch();
		return $result;
		$db = null;
	}

	function event_edit($arr)
	{
		$id=$_SESSION['userData']['agencyID'];
		$date_edit = date("Y-m-d");
		$db = conn();
		$sql = "UPDATE events SET title = ?, info = ?, event_date=?, dateEdited=? WHERE agencyID = $id";
		$s = $db->prepare($sql);
		$s->execute(array($arr['title'], $arr['info'], $arr['event-date'],$date_edit));
		$db = null;
	}
	function event_delete($id) 
	{
		$db = connection();// tungod wala gi include sa index ang delete.php mao di makita ang conn()
		$sql = "UPDATE events SET status = 'I' WHERE eventID = $id ";
		$s = $db->prepare($sql);
		$s->execute();
		$db = null;
	}

	//////////////////////////////////////
	function get_inquiry()
	{
		$id = $_SESSION['userData']['agencyID'];
		$db = conn();
		$sql = "SELECT * FROM inquiry ORDER BY date_inquire desc";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$sb=null;
	}