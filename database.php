<?php
    include_once"helper.php";
	connectTo("phdirectory_db");
	session_start();
    function logout()
    {
        unset($_SESSION);
        session_destroy();
		header("Location:../index.php");
    }

    function login($username,$password)
    {
       $result=get("admin","*","where username=".quoted($username)." AND password=".quoted($password));
        if(empty($result))
        {
            return null;
        }
        else
        {
			//add session
			header('Location:phdir/');
        }
    }

	function subscribe($array)
	{
		$email=$_POST["agencyemail"];
		$username=$_POST["username"];
		$result1=get("agency","*","where email='$email'");
		$result2=get("agency_user","*","where username='$username'");
		$result3=get("admin","*","where username='$username'");
		$passmatch = $_POST["password"] == $_POST["cpassword"];

		if(empty($result1)&&empty($result2)&&empty($result3)&&$passmatch)
		{
			$sql="insert into agency(agencyName,email,phoneNo)values(?,?,?)";
			$query = connect();
			$query->prepare($sql)->execute(array($_POST["agencyname"],
											   	$_POST["agencyemail"],
												$_POST["agencyphone"]
											   ));
			$agencyID = $query->lastInsertId();

			$sql="insert into agency_user(agencyID,agencyUserType,username,password,fullname,contactNo,status)values(?,?,?,?,?,?,?)";
			connect()->prepare($sql)->execute(array($agencyID,"A",$_POST["username"],
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
			if(!empty($result1)){
				$ret["message"]="Email is already used";
			}else if(!empty($result2)||!empty($result3)){
				$ret["message"]="<br>Username is already used";
			}else if(!$passmatch){
				$ret["message"]="<br>Username is already used";
			}
			return $ret;
		}
	}

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
		$sql = "UPDATE agency SET status = 1 WHERE agencyID = $id"; 
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
