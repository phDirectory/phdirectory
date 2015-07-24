<?php
	include_once('database.php');
	$arr = array();
	$array=array();
	if(isset($_POST['login']))
	{
		$arr = login($_POST["username"],$_POST["password"]);
	}
	else if(isset($_POST["subscribe"]))
	{
		$array=subscribe($_POST);
	}
?>	
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<title></title>
</head>
<body style="background-image:url(images/bg.jpg); width:100%; background-repeat:no-repeat;">
    <div class="container-fluid" id="container">
        <div class="row" id="menu">
            <div class="col-lg-1">
                <h1><a href="#">PHDirectory</a></h1>
			</div>
            <nav class="pull-right">
            <form method="post">
                <ol class="list-inline">
                    <li><input type="text" name="username" id="username" placeholder="Username"></li>
                    <li><input type="password" name="password" id="password" placeholder="Password"></li>
                    <li><button type="submit" name="login" id="btn-login">Login</button></li>
                </ol>
			</form>
            </nav>
         
        </div>
	   <div id="content">
           <div class="row" id="subcat">
           </div>
           <div class="pull-right">
               <h1>Subscribe</h1>
			   <div>
               <form method="post">
			   		<input type="text" name="agencyname" placeholder=" Agency name"><br>
				   	<?php 
//				   		if(!empty($array["ok"])&&$array["ok"])
//							echo'<input type="text" name="agencyemail" placeholder=" Email Address"><br>';                       
//				   		else if(!empty($array))
//						{
//							echo'<input style="border: 2px solid red;" type="text" name="agencyemail" placeholder=" Email Address"><br>';
//							echo'<label style="color:red;display:block;">'.$array["message"].'</label>';
//						}
						if(empty($array))
						{
							echo'<input type="text" name="agencyemail" placeholder=" Email Address"><br>';
						}
						else if($array["ok"])
						{
							echo'<input type="text" name="agencyemail" placeholder=" Email Address"><br>';
						}
						else if(!$array["ok"])
						{
							echo'<input style="border: 2px solid red;" type="text" name="agencyemail" placeholder=" Email Address"><br>';
							echo'<label style="color:red;display:block;">'.$array["message"].'</label>';
						}
				   ?>
				   	<input type="text" name="agencyphone" placeholder=" Phone Number"><br>
<!--				   	<input type="text" name="password" placeholder=" Password"><br>-->
				    <button type="submit" name="subscribe">Subscribe</button>
			   </form>
           </div>
           </div>

	   </div><!--content-->
    </div>
    <script src="assets/jquery.min.js"></script>
	<script>
		
	</script>
</body>
</html>