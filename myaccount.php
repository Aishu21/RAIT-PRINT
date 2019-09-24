<?php
include 'db.php';
session_start();
if(!isset($_SESSION['id']))
{
	//if user hhas logged out in other tab this page will also be logged out
	header("Location:Home4.php");
	
}
$sql = "select * from signup where rollno='".$_SESSION['id']."'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>RAIT PRINT</title>
  
  <link type="text/css" rel="stylesheet" href="css.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">

	<div class="row " style="background-color:#eee; border-bottom:5px blur darkgrey; border-radius:4px; margin-top:10px; ">
		
		<div class="col-sm-4 " >
			<a href="userpage.php">
				<img src="images/logo.png" class="img-fluid center" style="padding:20px;"/>
			</a>
		</div>
		
		<div class="col-sm-4 text-center" >
			<br>
			<a href="userpage.php" style="text-decoration:none;color:#C43125;font-family:algerian;"> <h2>RAIT PRINT</h2> </a>
		</div>
		
		<div class="col-sm-4 text-center" >
			<br>
			<h5 class="signout" ><img src="images/user.jpg"class="img-circle" height="30" width="30"> Hello,<?php echo $row['name'];?></h5>
			<h5>Wallet Balance : 100 Rs/-</h5> 
		
		<script>
$(document).ready(function(){
    $('.signout').popover({ content: "<div class='row'><div class='col-sm-4 text-left'><br><img src='images/user.jpg'class='img-circle' height='100' width='80'></div><div class='col-sm-8'><br>	<h4><?php echo $row['name'];?></h4><h5><?php echo $row['rollno'];?></h5>	<br><br><a href='myaccount.php'><button class='btn-primary' style='width:150px;'>My Account</button></a></div></div><hr>	<a href='logout1.php'><button  class='btn-primary' style='width:250px;'>Sign out</button> </a>", html: true, placement: "bottom",}); });
	</script>
	</div><br>
  </div>
  
	<nav class="navbar navbar-default" >
	
    <div class="nav nav-justified row" id="myNavbar" >
    
        <div class="col-sm-2 "><a href="userpage.php"  >Home</a></div>
        <div class="col-sm-2 "><a href="userliverequest.php"  >Live Requests</a></div>
        <div class="col-sm-2 "><a href="mydrive.php" >My Drive</a></div>
		<div class="col-sm-2"><a href="recharge.php" >Recharge</a></div>
		<div class="col-sm-2 active"><a href="myaccount.php" >My Account</a></div>
		<div class="col-sm-2"><a href="contact.php" >Contact Us</a></div>

      
    </div>
  </nav>
<br>
</div>
	
	<div  class="container" style=" background-color:#eee;" >
	
		<div class=" text-center">
		<h1 style="font-family:algerian; color:" > <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MY ACCOUNT</h1>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/userprofile.png" class="img-fluid " width="100" height="100" /><br><br>
		</div>
		
		
				<div class="form-group row">
					<input class="form-control" type="hidden" name="id_name" value="<?php echo $row[3]; ?>">
				</div>
				<div class="form-group row">
					<div class="col-sm-4">						<br>		</div>
					<div class="col-sm-2">	USER NAME			<br>  		</div>
					<div class="col-sm-1">	:					<br>		</div>
					<div class="col-sm-3">
					<?php echo $row['name'];?>
					</div>
				</div>
				
				<div class="form-group row">
					<div class="col-sm-4">						<br>		</div>
					<div class="col-sm-2">	E-MAIL				<br> 		</div>
					<div class="col-sm-1">	:					<br>		</div>
					<div class="col-sm-3">
					<?php echo $row['email'];?>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-4">						<br>		</div>
					<div class="col-sm-2">	MOBILE NUMBER		<br> 		</div>
					<div class="col-sm-1">	:					<br>		</div>
					<div class="col-sm-3">
					<?php echo $row['mobile'];?>
					</div>
				</div>
				
				<div class="row">
					<div class="col-sm-4">						<br><br>		</div>
					<div class="col-sm-2">	ROLL NUMBER			<br><br>  		</div>
					<div class="col-sm-1">	:					<br><br>		</div>
					<div class="col-sm-3">
					<?php echo $row['rollno'];?>
					</div>
				</div>
				
				<div class="form-group row">
					<div class="col-sm-4">						<br><br>		</div>
					<div class="col-sm-2">	WALLET BALANCE		<br><br>  		</div>
					<div class="col-sm-1">	:					<br><br>		</div>
					<div class="col-sm-3">
					<?php echo $row['wallet'];?>
					</div>
				</div>
				
				<div class=" text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="edit.php"><button class="btn btn-primary btn-lg text-center" >Update Details</button></a><br><br>
				</div>
			
			
			

	<div class=" text-center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="changepassword.php"><button class="btn btn-primary btn-lg text-center" >Change Password</button></a><br><br>
				</div>
				
	</div>

<footer class="container-fluid ">
  <div class="row">
	  <div class="col-sm-5">
		<img src="images/rait.jpg" class="img-responsive center" width="125" height="70" />
	  </div>
	  
	  <div class="col-sm-4 " >
		<a href="http://www.rait.ac.in/" style="font-size:20px;text-decoration:none;color:white;">RAIT Official site</a><br>
		<a href="http://118.102.168.162:81/raitpay/" style="font-size:20px;text-decoration:none;color:white;">RAIT Pay</a>
		<a href=""></a>
	  </div>
	  
	  <div class="col-sm-3 text-right">
	  <br>
	  <span class="glyphicon glyphicon-question-sign" style="color:white; "></span>Help<br>
	  @Rights Reserved
	  </div>
	  
  </div>
</footer>	
	

</body>
</html>