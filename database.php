<?php
    include_once"helper.php";
	connectTo("phdirectory_db");
	session_start();
    function logout()
    {
        unset($_SESSION);
        session_destroy();
        $info["ok"]=true;
        $info["page"]="index.php";
        return $info;
    }

    function login($username,$password)
    {
       $result=get("admin","*","where username=".quoted($username)." AND password=".quoted($password));
        if(empty($result))
        {
            $array=array();
            $array["ok"]=false;
            $array["message"]="Username or Password is incorrect";
            return $array;
        }
        else
        {
            $array=array();
            $array["ok"]=true;
            $array["data"]=$result[0];
            return $array;
        }
    }

?>