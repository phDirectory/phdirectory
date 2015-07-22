<?php
    error_reporting(E_ALL); 
    ini_set("display_errors", 1); 	
    include_once"database.php";
    if(isset($_POST["request"]))
    {
        $request=$_POST["request"];
        if($request=="login")
        {
            echo json_encode(login($_POST["username"],$_POST["password"]));
        }
    }

    
