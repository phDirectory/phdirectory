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
		$id = $_SESSION['userData']['agencyID'];
		$db = conn();
		$sql = "SELECT * FROM agency_user WHERE agencyUserType = 'M' and status='A' and agencyID = $id";
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

	function add_serviceType($arr)
	{
		$db = conn();
		$db->exec(" INSERT INTO service_types(serviceTypeName)VALUES('".$arr['servicetype']."')");
	}
	function getallservicesType()
	{
		$db = conn();
		$sql = "SELECT * FROM service_types";
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
	function getallagency()
	{
		$db = conn();
		$sql = "select * from agency";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;
	}

	function editagency($arr)
	{
		$id = $_SESSION["userData"]['agencyID'];
		$db = conn();
		$sql = "UPDATE agency SET agencyName=?, email=?, info=?, phoneNo=?, cityAddress= ?, houseNo=?, StreetAddress=?, barangayAddress=?, region=? WHERE agencyID = $id ";
		$s = $db->prepare($sql);
		$s->execute(array($arr['agencyname'], $arr['email'], $arr['info'], $arr['phone'],$arr['city'],$arr['house'],$arr['street'],$arr['barangay'],$arr['region']));
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
		$id=$_SESSION['userData']['agencyID'];
		$db = conn();
		$sql = "SELECT * FROM events WHERE status = 'A' and agencyID = $id";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;
	}

	function event_add($arr)
	{
		$date = date('Y-m-d');
		$db = conn();
		$status = 'On Going';
		if ($arr['event-date'] < $date) {
			$status = 'done';		
		}
		$id=$_SESSION['userData']['agencyID'];
		$sql = "INSERT INTO events(title, datePosted, info, event_date, eventStatus, agencyID, status) VALUES(?,?,?,?,?,$id,'A')";
		$s = $db->prepare($sql);
		$s->execute(array($arr['title'],$date,$arr['info'],$arr['event-date'],$status));
	}
	function update_eventDate($id)
	{
		$db = conn();
		$status = "done";
		$sql = "UPDATE events SET event_date=? WHERE eventID = $id";
		$s = $db->prepare($sql);
		$s->execute(array($status));
		$db = null;
	}

	function find_event($id)
	{
		$db = conn();
		$sql = "SELECT * FROM events WHERE eventID = $id";
		$result = $db->query($sql)->fetch();
		return $result;
		$db = null;
	}

	function event_edit($arr)
	{
		$id= $_GET['id'];
		$date_edit = date("Y-m-d");
		$db = conn();
		$sql = "UPDATE events SET title = ?, info = ?, event_date=?, dateEdited=?, eventStatus=? WHERE eventID = $id";
		$s = $db->prepare($sql);
		$s->execute(array($arr['title'], $arr['info'], $arr['event-date'],$date_edit,$arr['status']));
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
		$sql = "SELECT * FROM inquiry
		 INNER JOIN mobile_user ON inquiry.mobileID = mobile_user.id
		 WHERE agencyID = $id";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db=null;
	}
	function find_inqui($id)
	{
		$db = conn();
		$sql = "SELECT inquiry.title, mobile_user.fullname FROM inquiry
		INNER JOIN mobile_user ON inquiry.mobileID = mobile_user.id
		 WHERE inquiryID = $id";
		$result = $db->query($sql)->fetch();
		return $result;
		$db=null;
	}

	function add_trail($id, $message)
	{
		$from = "A";
		conn()->exec("INSERT INTO inquirytrail(inquiryID, trailFrom, message)VALUES('".$id."','".$from."','".$message."')");
	}

	function get_trail($id)
	{
		$db = conn();
		$sql = "SELECT inquirytrail.message,inquirytrail.trailFrom, inquiry.title, mobile_user.fullname, agency.agencyName 
		FROM inquirytrail
		INNER JOIN inquiry ON inquiry.inquiryID = inquirytrail.inquiryID
		INNER JOIN mobile_user ON mobile_user.id = inquiry.mobileID
		INNER JOIN agency ON agency.agencyID = inquiry.agencyID 
		WHERE inquirytrail.inquiryID = $id";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db=null;
	}

	function get_suggestion()
	{
		$id = $_SESSION['userData']['agencyID'];
		$db = conn();
		$sql = "SELECT * FROM suggestions WHERE agencyID = $id";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db=null;
	}
	/////////////////////////////////////////
	function find_subplan()
	{
		$id = $_SESSION['userData']['agencyID'];
		$db = conn();
		$sql = "SELECT subscriptions.startDate, subscriptions.endDate,subscription_plan.SPName, subscription_plan.description
		  FROM subscriptions 
		  INNER JOIN subscription_plan ON subscriptions.SPID = subscription_plan.SPID
		  WHERE subscriberID = $id ORDER BY subscriptions.endDate DESC LIMIT 1";
		  $result = $db->query($sql)->fetchAll();
		  return $result;
		  $db = null;
	}

	function get_sp()
	{
		$db = conn();
		$sql = "SELECT * FROM subscription_plan WHERE type = 'A'";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db=null;
	}

	function find_sp($id)
	{
		$db = conn();
		$sql = "SELECT amount FROM subscription_plan WHERE SPID = $id";
		$result = $db->query($sql)->fetch();
		return $result;
		$db=null;
	}

	function add_sp($id)
	{
		$db = conn();
		$agencyid = $_SESSION['userData']['agencyID'];
		$date = find_subplan();
		if(empty($date))
		{
			$sdate = date('Y-m-d');
		}
		else
		{
			foreach ($date as $s) {
				$sdate = $s['endDate'];
			}
		}
		$wdate = new DateTime($sdate);
		$wdate->add(new DateInterval('P30D'));
		$edate = $wdate->format('Y-m-d');
		$type = 'A';
		$db->exec("INSERT INTO subscriptions(SPID, subscriberID, startDate, endDate, subtype)VALUES('".$id."','".$agencyid."','".$sdate."','".$edate."','".$type."')");
		$db = null;
	}

	///////////////////////////////////files
	function add_files($name, $type, $uniqname)
	{
		$postId=$_SESSION["userData"]["agencyID"];
		$date = date('Y-m-d');
		conn()->exec("INSERT INTO downloads(postID, fileName,uniqueFileName,fileType, dateUploaded)VALUES('".$postId."','".$name."','".$uniqname."','".$type."','".$date."')");
	}

	function get_files()
	{
		$id = $_SESSION['userData']['agencyID'];
		$db = conn();
		$sql = "SELECT * FROM downloads WHERE postID = $id";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db=null;
	}
	function hierarchy($sub)
	{
		$db=conn();
		$id = $_SESSION['userData']['agencyID'];
		$db->exec("INSERT INTO govhierarchy(AgencyID,subAgencyID)VALUES('".$id."','".$sub."')");
	}
	function getHierarchy()
	{
		$id = $_SESSION['userData']['agencyID'];
		$db = conn();
		$sql = "SELECT subAgencyID FROM govhierarchy WHERE AgencyID = $id";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db=null;
	}

	function join_hierarchy()
	{
		$id = $_SESSION['userData']['agencyID'];
		$db = conn();
		$sql = "SELECT agency.agencyName, govhierarchy.GovHierID FROM agency 
		INNER JOIN govhierarchy ON govhierarchy.subAgencyID = agency.agencyID";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;
	}

	function remove_hierarchy($id)
	{
		$db = connection();
		$sql = "DELETE FROM govhierarchy WHERE GovHierID = $id";
		$db->prepare($sql)->execute();
	}

	function moderatorlog()
	{
		$id = $_SESSION['userData']['agencyID'];
		$db = conn();
		$sql = "SELECT * FROM agency_user 
				INNER JOIN news ON agency_user.agencyID = news.agencyID and agency_user.agencyUserID = news.userID
				WHERE agencyUserType = 'M' AND agency_user.agencyID = $id";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;
	}
////////////////////////////////
	function countRate()
	{
		$id = $_SESSION['userData']['agencyID'];
		$db = conn();
		$sql = "SELECT ( sum(rating)/count(rating)) as rate FROM rating WHERE agencyID = $id";
		$result = $db->query($sql)->fetch();
		return $result;
		$db = null;
	}

