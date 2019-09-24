<?php
include "db.php";
session_start();
if(!isset($_SESSION['id']))
{
	//if user hhas logged out in other tab this page will also be logged out
	header("Location:Home4.php");
	
}

$query= "select * from signup where rollno='".$_SESSION['id']."'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
$num = mysqli_num_rows($result);

if(isset($_POST['newname'])){
	$newname = $_POST['newname'];
	$id1 = $_POST['id_name'];
	$sql = "UPDATE signup SET name= '$newname' WHERE  rollno= '$id1' ";
	$res = mysqli_query($conn,$sql) or die("could not update.mysqli_error()");
		header("Location:myaccount.php");
}

if(isset($_POST['newemail'])){
	$newemail = $_POST['newemail'];
	$id1 = $_POST['id_name'];
	$sql = "UPDATE signup SET email= '$newemail' WHERE  rollno= '$id1' ";
	$res = mysqli_query($conn,$sql) or die("could not update.mysqli_error()");
		header("Location:myaccount.php");
}

if(isset($_POST['newmobile'])){
	$newmobile = $_POST['newmobile'];
	$id1 = $_POST['id_name'];
	$sql = "UPDATE signup SET mobile= '$newmobile' WHERE  rollno= '$id1' ";
	$res = mysqli_query($conn,$sql) or die("could not update.mysqli_error()");
		header("Location:myaccount.php");
}

if(isset($_POST['newpass'])){
	$newpass = $_POST['newpass'];
	$id1 = $_POST['id_name'];
	$sql = "UPDATE signup SET password= '$newpass' WHERE  rollno= '$id1' ";
	$res = mysqli_query($conn,$sql) or die("could not update.mysqli_error()");
		session_destroy();
unset($_SESSION['id']);
header("Location:Home4.php");
}

if(isset($_POST['newconpass'])){
	$newconpass = $_POST['newconpass'];
	$id1 = $_POST['id_name'];
	$sql = "UPDATE signup SET confirmpassword= '$newconpass' WHERE  rollno= '$id1' ";
	$res = mysqli_query($conn,$sql) or die("could not update.mysqli_error()");
	session_destroy();
unset($_SESSION['id']);
header("Location:Home4.php");
}



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
		<h1 style="font-family:algerian; color:" > <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;UPDATE MY ACCOUNT</h1>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/userprofile.png" class="img-fluid " width="100" height="100" /><br><br>
		</div>
	
			
			
			
			<form action="" method="POST">
				<div class="form-group row">
					<input class="form-control" type="hidden" name="id_name" value="<?php echo $row[3]; ?>">
				</div>
				
				<div class="form-group row">
					<div class="col-sm-4">						<br>		</div>
					<div class="col-sm-2">	USER NAME			<br>  		</div>
					<div class="col-sm-1">	:					<br>		</div>
					<div class="col-sm-3">
					<input class="form-control" type="text" name="newname" value="<?php echo $row[0];?>">
					</div>
				</div>
				
				<div class="form-group row">
					<div class="col-sm-4">						<br>		</div>
					<div class="col-sm-2">	E-MAIL				<br> 		</div>
					<div class="col-sm-1">	:					<br>		</div>
					<div class="col-sm-3">
					<input class="form-control" type="text" name="newemail" value="<?php echo $row[1];?>">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-sm-4">						<br>		</div>
					<div class="col-sm-2">	MOBILE NUMBER		<br> 		</div>
					<div class="col-sm-1">	:					<br>		</div>
					<div class="col-sm-3">
					<input class="form-control" type="text" name="newmobile" value="<?php echo $row[2];?>">
					</div>
				</div>
				
			
				
				
				<div class="text-center" >
				<button class="btn bt-block btn-primary " type="submit" type="submit" name="submit" value="Submit">Submit</button>
				</div><br><br>
				</form>
				
			
			
			
			
	</div>
		
	
<br><br>
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