<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link href="assets/style.css" rel="stylesheet">
   		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
  		<script src="assets/jquery.min.js"></script>
		  <script src="assets/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container-fluid">
		<div class="row" id="menu">
			<div class="col-lg-1">
				<h1>PHDirectory</h1>
			</div>
			<nav class="pull-right">
				<ul class="list-inline">
					<li><a class="cd-signup"data-toggle="modal" href="#regMod" style="text-decoration: none;">Subscribe</a></li>
					<li><a class="cd-signin" data-toggle="modal" href="#logMod" style="text-decoration: none;" id="signin">Login</a></li>				
				</ul>
			</nav>
		</div><!--menu-->
	
	<div id="content">
  
	</div><!--content-->
	<!--<footer class="row">
		<p>COPYRIGHT &copy; 2015. DESIGNED BY TEAM BAYMAX. ALL RIGHTS RESERVED.</p> 
	</footer>-->		
	</div><!--container-->

			<!--modals-->
	<div class="modal fade" id="logMod" tabindex="-1" role="dialog"aria-labelledby="myModalLabel" aria-hidden="true">    
		<div class="modal-dialog">       
			<div class="modal-content">          
				<div class="modal-header">             
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
					<h4 class="modal-title" id="myModalLabel">
						USER LOGIN
            		</h4>          
            	</div>          
            <div class="modal-body">
    				    <form class="form-horizontal">   
  						  <div class="form-group has-feedback">
                 	  		<label class="col-sm-3" for="signin-username">Username</label>
                 	  		<div class="col-sm-5">
                 	  			<input type="text" class="form-control" id="signin-username"/>
                 	  			<span class="glyphicon glyphicon-user form-control-feedback"></span>  
  		    				      </div>
  		    			</div>
 						
 						     <div class="form-group has-feedback">
                 	  		<label class="col-sm-3" for="signin-password">Password</label>
                 	  		<div class="col-sm-5">
                 	  			<input type="password" class="form-control" id="signin-password"/>
                 	  			<span class="glyphicon glyphicon-lock form-control-feedback"></span>  
  		    				      </div>
  		    			 </div>
 					      </form>
 					      <div class="modal-footer">             
            			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            			<input type="submit" class="btn btn-success" id="btnlog" data-dismiss="modal" value="Login" name="submit"><!--login button-->
            	   </div> 	
                 </div><!--modal body-->
          </div><!--modal content-->
       </div><!--modal dialog-->
    </div><!--modal-->

	<div class="modal fade" id="regMod" tabindex="-1" role="dialog"aria-labelledby="myModalLabel" aria-hidden="true">    
		<div class="modal-dialog">       
			<div class="modal-content">          
				<div class="modal-header">             
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
					<h4 class="modal-title" id="myModalLabel">
						Subscription Form   
            		</h4>          
            	</div>          
                 <div class="modal-body">
                 	<form class="form-horizontal">
                 		<div class="form-group">
                 	  		<label class="col-sm-3" style="padding-top:10px;">Username</label>
                 	  		<div class="col-sm-5">
                 	  			<input type="text" class="form-control" id="uname"/>  
  		    				</div>
  		    			</div>
  		    			
  		    			<div class="form-group">
                 	  		<label class="col-sm-3" style="padding-top:10px;">Password</label>
                 	  		<div class="col-sm-5">
                 	  			<input type="password" class="form-control" id="pass"/>  
  		    				</div>
  		    			</div>
  		    			
  		    			<div class="form-group">
                 	  		<label class="col-sm-3" style="padding-top:10px;">Confirm Password</label>
                 	  		<div class="col-sm-5">
                 	  			<input type="text" class="form-control" id="pass"/>  
  		    				</div>
  		    			</div>
  		    			
  		    			<div class="form-group">
                 	  		<label class="col-sm-3" style="padding-top:10px;">Name of Agency</label>
                 	  		<div class="col-sm-5">
                 	  			<input type="text" class="form-control" id="agencyname"/>  
  		    				</div>
  		    			</div>
  		    			
  		    			<div class="form-group">
                 	  		<label class="col-sm-3" style="padding-top:10px;">Address</label>
                 	  		<div class="col-sm-5">
                 	  			<input type="text" class="form-control" id="address"/>  
  		    				</div>
  		    			</div>
  		    			
  		    			<div class="form-group">
                 	  		<label class="col-sm-3" style="padding-top:10px;">Location</label>
                 	  		<div class="col-sm-5">
                 	  			<input type="text" class="form-control" id="location"/>  
  		    				</div>
  		    			</div>
  		    			
  		    			<div class="form-group">
                 	  		<label class="col-sm-3" style="padding-top:10px;">Contact No.</label>
                 	  		<div class="col-sm-5">
                 	  			<input type="text" class="form-control" id="answer"/>  
  		    				</div>
  		    			</div>
  		    			</form>
  		    	</div><!-- /.modal-body --> 				            
            	<div class="modal-footer">             
            		<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            		<input type="submit" class="btn btn-success" id="btnReg" data-dismiss="modal" value="Register">
            	</div>
          	</div><!-- /.modal-content --> 
         </div><!-- /.modal dialog -->  
	</div>

	</body>
</html>