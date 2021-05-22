<?php
include("include/config.php");
if(isset($_POST['submit']))
{
	$name=$_POST['name'];
	$password=md5($_POST['password']);
    $email=$_POST['emailid'];
    $contact=$_POST['contact'];
    $location=$_POST['location'];
 
$ret=mysqli_query($con,"insert into user (ID,Name,email,password,location,contact)
values('','$name','$email','$password','$location','$contact')");
if($ret)
{
   echo '<script type="text/javascript">alert("Register Sucessfully");window.location=\'index.php\';</script>';
}
else
{
    echo '<script type="text/javascript">alert("Fail Registeration");window.location=\'index.php\';</script>';
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Shopping Portal | Admin login</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>

	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
					<i class="icon-reorder shaded"></i>
				</a>

			  	<a class="brand" href="index.html">
			  		Shopping Portal 
			  	</a>

				<div class="nav-collapse collapse navbar-inverse-collapse">
				
					<ul class="nav pull-right">

						

						
					</ul>
				</div><!-- /.nav-collapse -->
			</div>
		</div><!-- /navbar-inner -->
	</div><!-- /navbar -->



	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="module module-login span4 offset4">
					<form class="form-vertical" method="post">
						<div class="module-head">
							<h3>Sign In</h3>
						</div>
												<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="text" id="name" name="name" placeholder="Enter Name">
								</div>
							</div>
                            <div class="control-group">
								<div class="controls row-fluid">
									
	    	<input type="email" class="span12" id="email" onBlur="userAvailability()" name="emailid" required placeholder="Enter Email" >
	    	       <span id="user-availability-status1" style="font-size:12px;"></span>
								</div>
							</div>
                              <div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="text" id="location" name="location" placeholder="Enter Location">
								</div>
							</div>
                              <div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="text" id="contact" name="contact" maxlength="10" placeholder="Enter Contact Number">
								</div>
							</div>
                            <div class="control-group">
								<div class="controls row-fluid">
									<input class="span12" type="text" id="pass" name="password" placeholder="Enter password">
								</div>
							</div>
                            
                             
						</div>
						<div class="module-foot">
							<div class="control-group">
								<div class="controls clearfix">
									<button type="submit" class="btn btn-primary pull-right" name="submit">Sign up</button>
									
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><!--/.wrapper-->

	<div class="footer">
		<div class="container">
			 

			<b class="copyright">&copy; 2017 Shopping Portal </b> All rights reserved.
		</div>
	</div>
    <script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

    
    
	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>