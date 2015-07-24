<?php

	$GLOBALS["db"]=null;
    $GLOBALS["db_name"]=null;
    
    function connectTo($database,$username="root",$password="")
    {
        $GLOBALS["db"]=new PDO("mysql:host=localhost;dbname=".$database,$username,$password);
        $GLOBALS["db_name"]=$database;
    }

    function get($table,$fields="*",$other="")
    {
        if(is_array($fields))
            $sql="SELECT ".merge($fields)." FROM ".$table." ".$other;
        else 
            $sql="SELECT ".$fields." FROM ".$table." ".$other;
        //echo $sql;
        return $GLOBALS["db"]->query($sql)->fetchAll();
    }

    function merge($array)
    {
        $str="";
        $size=count($array);
        for($c=0;$c<$size;$c++)
        {
            $str=$str." ".$array[$c];
            if($c+1!=$size)
                $str=$str.",";
        }
        return $str;
    }
    function quoted($string)
    {
        return "'".$string."'";
    }

	function connect()
	{
		return $GLOBALS["db"];
	}	