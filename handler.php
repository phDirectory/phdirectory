<?php
    error_reporting(E_ALL); 
    ini_set("display_errors", 1); 	
    include_once"database.php";
    if(isset($_POST["request"]))
    {
        $request=$_POST["request"];
        
        if($request=="signin")
        {
            echo json_encode(login($_POST["username"],$_POST["password"]));
        }
        //else if($request=="subscribe")
        //{
        //    echo json_encode(signup($_POST["firstname"],$_POST["middlename"],$_POST["lastname"],$_POST["email"],$_POST["password"]));
        //}
        else if($request=="logout")
        {
            echo json_encode(logout());
        }
        //else if($request=="sample-request")
        //{
        //    echo '{"ok":true}';
        //}



    }

    
