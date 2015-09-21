<?php
    include_once"helper.php";
	//connectTo("phdirectory_db");
	session_start();
    function logout()
    {
        unset($_SESSION);
        session_destroy();
		header("Location:../index.php");
    }
    function login($username,$password)
    {
        $result1=get("admin","*","where username=".quoted($username)." AND password=".quoted($password));
        $result2=get("agency_user","*","where username=".quoted($username)." AND password=".quoted($password));
        /*if(empty($result))
        {
            return null;
        }
        else*/
        if(!empty($result1))
        {
			//add session
			$_SESSION["userData"] = $result1[0];
			header('Location:phdir/');
        }else if(!empty($result2))
        {
			//add session
			$data = $result2[0];
			$_SESSION["userData"] = $data;
			if($data["agencyUserType"]=="A")
				header('Location:agencyadmin/');
			else if($data["agencyUserType"]=="M")
				header('Location:agencyuser/');
        }
        else 
        	return null;
    }

	function subscribe($array)
	{
		$email=$_POST["agencyemail"];
		$username=$_POST["username"];
		$result1=get("agency","*","where email='$email'");
		$result2=get("agency_user","*","where username='$username'");
		$result3=get("admin","*","where username='$username'");
		$passmatch = $_POST["password"] == $_POST["cpassword"];
		$ret = true;

		if(empty($result1)&&empty($result2)&&empty($result3)&&$passmatch)
		{
			$sql="insert into agency(agencyName,email,phoneNo,status)values(?,?,?,?)";
			$query = conn();
			$query->prepare($sql)->execute(array($_POST["agencyname"],
											   	$_POST["agencyemail"],
												$_POST["agencyphone"],
												"I"
											   ));
			$agencyID = $query->lastInsertId();

			$sql="insert into agency_user(agencyID,agencyUserType,username,password,fullname,contactNo,status)values(?,?,?,?,?,?,?)";
			conn()->prepare($sql)->execute(array($agencyID,"A",$_POST["username"],
											   	$_POST["password"],
												$_POST["fullname"],
												$_POST["contactNo"],"A"
											   ));
			login($_POST['username'], $_POST['password']);
			//header("Location: index.php?page=success");
			// $ret=array();
			// $ret["ok"]=true;
			// return $ret;
		}
		else 
		{
			$ret=array();
			$ret["ok"]=false;
			$ret['ok-username'] = true;
			$ret['ok-email'] = true;
			$ret['ok-pass'] = true;
			if(!empty($result1))
			{
				$ret['ok-email'] = false;
				$ret["message-email"]="Email is already used";
			}
			if(!empty($result2)||!empty($result3))
			{
				$ret['ok-username'] = false;
				$ret["message-user"]="Username is already used";
			}
			if(!$passmatch)
			{
				$ret['ok-pass'] = false;
				$ret["message-pass"]="Password did not match";
			}
			return $ret;
		}
	}
//////////////////////////////////////////////////////////////////////////////////////////////
	function conn()
	{
		return new PDO("mysql:host=localhost;dbname=phdirectory_db","root","");
	}

	function retrieve_agency()
	{
		$db = conn();
		$sql = "SELECT * FROM agency ORDER BY agencyID";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;
	}

	function search_agency($keyword)
	{
		$key = "%".$keyword."%";
		$db = conn();
		$sql = "SELECT * FROM agency WHERE agencyName LIKE '$key' 
				or email LIKE '$key' 
				or info LIKE '$key'
				or organization LIKE '$key'
				or cityAddress LIKE '$key'
				or houseNo LIKE '$key'
				or StreetAddress LIKE '$key'
				or barangayAddress LIKE '$key' 
				or region LIKE '$key'";

		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;
	}

	function status_activate($id)
	{
		$db = conn();
		$sql = "UPDATE agency SET status = 'A' WHERE agencyID = $id"; 
		$result = $db->prepare($sql);
		$result->execute();
	}

	function status_deactivate($id)
	{
		$db = conn();
		$sql = "UPDATE agency SET status = 'I' WHERE agencyID = $id"; 
		$result = $db->prepare($sql);
		$result->execute();
	}

	function sp()
	{
		$db = conn();
		$sql ="SELECT * FROM subscription_plan ORDER BY SPID";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;
	}

	function addsp($arr)
	{
		$spname=$arr['spname'];
		$desc=$arr['desc'];
		$amount=$arr['amount'];
		conn()->exec("INSERT INTO subscription_plan(SPName, description, amount, type) VALUES ('". $spname ."', '". $desc ."','". $amount ."','A')");
	}

	function deletesp($id)
	{
		$db = conn();
		$sql = "DELETE FROM subscription_plan WHERE SPID = $id";
		$result = $db->exec($sql);
		$db=null;
	}

	function getsp($id)
	{
		$db = conn();
		$sql = "SELECT * FROM subscription_plan WHERE SPID = $id";
		$result = $db->query($sql)->fetch();
		return $result;
		$db = null;
	}

	function editsp($id, $spname, $desc, $amount)
	{
		$db = conn();
		$sql = "UPDATE subscription_plan SET SPName = '$spname', description = '$desc', amount = $amount WHERE SPID = $id ";
		$s = $db->prepare($sql);
		$s->execute(array($spname, $desc, $amount));
		$db = null;
	}

	function getsubscription()
	{
		$db = conn();
		$sql = "SELECT * FROM subscription ORDER BY subID";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;
	}

	function check_sp()
	{
		$db = conn();
		$id = $_SESSION['userData']['agencyID'];
		$sql = "SELECT * FROM subscriptions WHERE subscriberID = $id AND CURDATE() between startDate and endDate";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db=null;
	}	

	function find_admin()
	{
		$id=$_SESSION['userData']['adminID'];
		$db=conn();
		$sql = "SELECT * FROM admin WHERE adminID = $id";
		$result = $db->query($sql)->fetch();
		return $result;
		$db = null;
	}

	function adminpass_edit($pass)
	{
		$id=$_SESSION['userData']['adminID'];
		$db = conn();
		$sql = "UPDATE admin SET password = ? WHERE adminID = $id";
		$s = $db->prepare($sql);
		$s->execute(array($pass['pass1']));
		$db = null;
	}

	function get_events()
	{
		$db = conn();
		$sql = "SELECT * FROM events WHERE status = 'A'";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;
	}

	function find_events($id)
	{
		$db=conn();
		$sql = "SELECT * FROM events WHERE eventID = $id";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;
	}
		////////////////////////////////

	function getAllNewsForMobile()
	{
		$db = conn();
		$sql = "SELECT * FROM news WHERE status = 'A' ORDER BY datePosted";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;
	}

	function registerForMobile($username, $password, $email, $fullname, $phoneNo){

		$sql="insert into mobile_user(username,password,email,fullname,phoneNo)values(?,?,?,?,?)";
		$result = conn()->prepare($sql)->execute(array($username,$password,$email,$fullname,$phoneNo));

		return $result;
	}

	function find_subscriber()
	{
		$db = conn();
		$sql = "SELECT * FROM subscriptions 
		  INNER JOIN subscription_plan ON subscriptions.SPID = subscription_plan.SPID
		  INNER JOIN agency ON subscriptions.subscriberID = agency.agencyID 
		  WHERE subtype = 'A' AND CURDATE() <= endDate";
		  $result = $db->query($sql)->fetchAll();
		  return $result;
		  $db = null;
	}
	////////////////////////////////////////////////
	function get_news()
	{
		$db = conn();
		$sql = "SELECT * FROM news WHERE status = 'A'";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;
	}

	function find_news($id)
	{
		$db=conn();
		$sql = "SELECT * FROM news WHERE newsID = $id AND status = 'A' ";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;
	}
////////////////////////////////////////////////
	function get_serv()
	{
		$db = conn();
		$sql = "SELECT * FROM services WHERE status = 'A'";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;
	}

	function find_serv($id)
	{
		$db=conn();
		$sql = "SELECT * FROM services WHERE serviceID = $id AND status = 'A' ";
		$result = $db->query($sql)->fetch();
		return $result;
		$db = null;
	}

	

	function countInquiry()
	{
		$id = $_SESSION['userData']['agencyID'];
		$db = conn();
		$sql = "SELECT count(inquiryID) as total FROM inquiry WHERE agencyID = $id";
		$result = $db->query($sql)->fetch();
		return $result;
		$db = null;
	}

	function loginForMobile($username, $password){


		$db = conn();
		$sql = "SELECT * FROM mobile_user WHERE mobile_user.username='$username' and mobile_user.password='$password'";
		$result = $db->query($sql)->fetch();
		if($result != null){
			$result["SPID"] = getCurrentSubplanID($result["id"]);
		}
		return $result;
		$db = null;
	}

	function getCurrentSubplanID($userid){

		$db = conn();
		$sql = "SELECT SPID FROM subscriptions
		  WHERE subscriberID = '$userid' and CURDATE() between startDate and endDate";
		$result = $db->query($sql)->fetch();
		return $result[0];
		$db = null;
	}

	
	function getSubsription($userid){

		$db = conn();
		$sql = "SELECT subscriptions.startDate, subscriptions.endDate,subscription_plan.SPName, subscription_plan.description
		  FROM subscriptions JOIN subscription_plan 
		  ON subscriptions.SPID = subscription_plan.SPID 
		  WHERE subscriberID = $userid";
		  $result = $db->query($sql)->fetchAll();
		  return $result;
		  $db = null;
	}

	function getSubplanForMobile(){
		$db = conn();
		$sql = "SELECT *
		  FROM subscription_plan
		  WHERE type = 'M'";
		  $result = $db->query($sql)->fetchAll();
		  return $result;
		  $db = null;
	}

	function addSubscriptionForMobile($id, $userid)
	{
		$db = conn();
		$date = getSubsription($userid);
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
		$type = 'M';
		$db->exec("INSERT INTO subscriptions(SPID, subscriberID, startDate, endDate, subtype)VALUES('".$id."','".$userid."','".$sdate."','".$edate."','".$type."')");
		$db = null;
	}

	function getInquiryForMobile($userid){
		$db = conn();
		$sql = "SELECT agency.agencyName, inquiry.agencyID, inquiry.inquiryID, inquiry.title, inquiry.message, inquiry.date_inquire, inquiry.mobileID FROM inquiry
		  JOIN agency ON inquiry.agencyID = agency.agencyID WHERE mobileID = '$userid' order by inquiryID desc";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;

	}


	function sendInquiryForMobile($userid, $agencyid, $title, $message){
		$db = conn();
		$currentDate = date('Y-m-d');
		$db->exec("INSERT INTO inquiry(mobileID, agencyID, title, message, date_inquire)VALUES('".$userid."','".$agencyid."','".$title."','".$message."','".$currentDate."')");
		$db = null;

	}

	function getServicesForMobile(){

		$db = conn();
		$sql = "SELECT services.serviceID, services.agencyID, services.serviceName, services.serviceType, services.details, agency.agencyName 
		FROM services JOIN agency 
		ON services.agencyID = agency.agencyID WHERE services.status = 'A'";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;

	}

	function getDownloadables(){
		$db = conn();
		$sql = "SELECT * FROM downloads JOIN agency ON downloads.postID = agency.agencyID";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;
	}

	function getFavorites($userid){
		$db = conn();
		$sql = "SELECT * FROM favorites
		  JOIN agency ON favorites.agencyID = agency.agencyID WHERE userID = '$userid' order by id desc";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;

	}

	function addToFavorites($userid, $agencyid){
		$db = conn();
		$db->exec("INSERT INTO favorites(agencyID, userID)VALUES('".$agencyid."','".$userid."')");
		$db = null;

	}

	function getEvents(){
		$db = conn();
		$sql = "SELECT events.eventID, events.agencyID, events.title, events.datePosted, events.dateEdited, events.info, events.event_date, events.eventStatus, agency.agencyName FROM events JOIN agency ON events.agencyID = agency.agencyID";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;
	}

	function getEventsForDate($date){
		$db = conn();
		$sql = "SELECT events.eventID, events.agencyID, events.title, events.datePosted, events.dateEdited, events.info, events.event_date, events.eventStatus, agency.agencyName FROM events JOIN agency ON events.agencyID = agency.agencyID WHERE events.event_date = '$date'";
		$result = $db->query($sql)->fetchAll();
		return $result;
		$db = null;
	}

	function deleteFavorite($userid, $agencyid){
		$db = conn();
		$db->exec("DELETE FROM favorites WHERE agencyID='$agencyid' and userID='$userid'");
		$db = null;
	}

	function updateUserProfile($userid, $username, $oldpassword, $newpassword, $email, $fullname, $phoneNo){
		
		$sql="";
		
		if($oldpassword != "" && $newpassword != ""){
			$sql= "UPDATE mobile_user SET 
			username='$username',
			password='$newpassword',
			email='$email',
			fullname='$fullname',
			phoneNo='$phoneNo'
			WHERE id='$userid' AND password='$oldpassword'";
			$result = conn()->prepare($sql)->execute();

			$profile = getUserProfile($userid);
			if($newpassword != $profile["password"]){return false;}

			return $result;
		}else{
			$sql= "UPDATE mobile_user SET 
			username='$username',
			email='$email',
			fullname='$fullname',
			phoneNo='$phoneNo'
			WHERE id='$userid'";
			$result = conn()->prepare($sql)->execute();
			return $result;
		}

		
	}

	function getUserProfile($userid){

		$db = conn();
		$sql = "SELECT * FROM mobile_user WHERE id='$userid'";
		$result = $db->query($sql)->fetch();
		if($result != null){
			$result["SPID"] = getCurrentSubplanID($result["id"]);
		}
		return $result;
		$db = null;
	}

	function checkRated($userid, $agencyid){
		$db = conn();
		$sql = "SELECT * FROM rating WHERE agencyID='$agencyid' and MobileUserID='$userid'";
		$result = $db->query($sql)->fetchAll();
		
		if(!empty($result)){return true;}
		else {return false;}
		
		$db = null;
	}

	function rate($userid, $agencyid,$rate){
		$db = conn();
		$db->exec("INSERT INTO rating(agencyID, MobileUserID, rating)VALUES('".$agencyid."','".$userid."','".$rate."')");
		$db = null;

	}







