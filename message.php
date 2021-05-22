
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['email'])==0)
	{	
header('location:index.php');
}
else{
    $L_id=$_GET['id'];
    
    if(isset($_POST['submit']))
    {
       $query1=mysqli_query($con,"select ID from user where email='".$_SESSION['email']."'");
    $row1=mysqli_fetch_array($query1);
    $ID1=$row1['ID'];
        
           // $L_id=$_GET['id'];
        $message=$_POST['message'];
        $query=mysqli_query($con,"select ID from laptop where L_ID='$L_id'");
        $row1=mysqli_fetch_array($query);
        $ID=$row1['ID'];
        
        
        $query3=mysqli_query($con,"insert into message (M_ID,ID,sent_ID,L_ID,text)
        values('','$ID','$ID1','$L_id','$message')");
        if($query3)
        {
             echo '<script type="text/javascript">alert("Message send sucessfully");window.location=\'manage-products.php\';</script>';
        }
        else
        {
            echo mysqli_error($con);
        }
        
        
    }
	

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin|  Users log</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
</head>
<body>
<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
<?php include('include/sidebar.php');?>				
			<div class="span9">
					<div class="content">
        <form name="message" method="post">
                       
	<div class="module">
							<div class="module-head">
								<h3>Messgae inbox</h3>
							</div>
 							<div class="module-body table">
	
                              					<div class="module-body">
							<div class="control-group">
								<div class="controls row-fluid">
									<textarea class="span12" rows="4" cols="20" placeholder="Enter your message..." name="message"></textarea>
								</div>
							</div>  
							<div class="control-group">
											<div class="controls">
												<button type="submit" name="submit" class="btn">Send</button>
											</div>
										</div>
							</div>
						</div>						

						 </form>
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>