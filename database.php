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
		$result=get("agency","*","where email='$email'");
		if(empty($result))
		{
			$sql="insert into agency(agencyName,email,phoneNo)values(?,?,?)";
			connect()->prepare($sql)->execute(array($_POST["agencyname"],
											   	$_POST["agencyemail"],
												$_POST["agencyphone"]
											   ));
			$ret=array();
			$ret["ok"]=true;
			return $ret;
		}
		else 
		{
			$ret=array();
			$ret["ok"]=false;
			$ret["message"]="Email is already used";
			return $ret;
		}
	}	
