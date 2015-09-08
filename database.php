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

			header("Location: index.php?page=success");
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
		conn()->exec("INSERT INTO subscription_plan(SPName, description, amount) VALUES ('". $spname ."', '". $desc ."','". $amount ."')");
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
