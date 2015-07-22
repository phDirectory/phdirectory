<?php
//	$array=array();
//	if(isset($_POST["login-form"]))
//	{
//		include_once("../database.php");
//		$array=login($_POST["username"],$_POST["password"]);
//	}
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
	<title></title>
</head>
<body>
<!--	<form method="post">-->
		<input type="text" name="username" id="username" placeholder="username">
		<input type="password" name="password" id="password" placeholder="password">
		<button  name="login-form" id="btn_login">Login</button>
		<button>Register</button>
<!--	</form>-->
	<div>
		<p id="error-message">
			<?php
//				if(!empty($array))
//				{
//					if(!$array["ok"])
//						echo $array["message"];
//					else
//						header("Location:../home.php");
//				}	
			?>
		</p>
	</div>
    <script src="../assets/jquery.min.js"></script>
    <script>
        $(function(){
            $("#btn_login").click(function(){
                var keys=[];
                var values=[];
                var url="../handler.php";
                var json=null;
                keys.push("request");
                values.push("login");
                keys.push("username");
                values.push($("#username").val());
                keys.push("password");
                values.push($("#password").val());
                json=jsonParser("../handler.php",keys,values);
//                console.log(json);
//                if(json.ok)
//                {
//                    console.log(json.data.username);
//                    window.location.replace("../home.php");
//                }
            });
            
            function jsonParser(url,keys,values)
            {   
                var data={};
                var ret=null;
                for(var c=0;c<keys.length;c++)
                    data[keys[c]]=values[c];
                $.getJSON(url,data).done(function(data){$ret=data});
                return ret;
            }   
        });
    </script>
</body>
</html>