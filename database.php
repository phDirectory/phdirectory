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
       $result=getAllFrom("account","*","where username=".encloseWithQuote($username)." AND password=".encloseWithQuote(md5($password)));
        
        if($username == "")
        {
            $info["ok"]=false;
            $info["message"]="Email is required!";
            return $info;
        }

        else if($password == "")
        {
            $info["ok"]=false;
            $info["message"]="Password is required!";
            return $info;
        }

        else if(empty($result))
        {
            $info["ok"]=false;
            $info["message"]="Incorrect email or password!";
            return $info;
        }
        else
        {
            $info["ok"]=true;
            $type=$result[0]["usertype"];
            if($type==0)//user is admin
                $info["page"]="admin.php";
            else if($type==1)//user is phdirectory admin
                $info["page"]="user.php";
            $_SESSION["login"]=true;
            return $info;
        }
    }


?>