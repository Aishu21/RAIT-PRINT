<?php
include "db.php";
session_start();
if(!isset($_SESSION['id']))
{
	//if user hhas logged out in other tab this page will also be logged out
	header("Location:Home4.php");
	
}
$sql = "select * from signup where rollno='".$_SESSION['id']."'";
$query_signup = mysqli_query($conn,$sql);
$row_signup = mysqli_fetch_array($query_signup);
if(isset($_POST['otp'])){
	


//create a new random password

$otp = substr(md5(uniqid(rand(),1)),3,4);



//send email
$to = "$row_signup['email']";
$subject = "One Time Password(OTP)";
$body = "Hi $row_signup->name. Here is your OTP information. Your OTP is $otp . Use this OTP for recieving prints. Regards Site Admin";
$lheaders= "From: <raitprint@gmail.com>";
$lheaders.= "Reply-To: noprely@domain.com";
mail($to, $subject, $body, $lheaders);

//update database
//$sqlu = " UPDATE signup SET OTP = '$otp' WHERE  rollno= '$rollno' ";
$resu = mysqli_query($conn," UPDATE signup SET OTP = '$otp' WHERE  rollno= '".$_SESSION['id']."' ") or die("could not update.mysqli_error()");
echo "An email has been send to your registered mail id $email";

/*if(isset($_POST['rollno']) &&  isset($_POST['email'])){
	$newpass = $pass;
	$sqlu = "UPDATE signup SET password= '$newpass' WHERE  rollno= '$rollno' ";
	$res = mysqli_query($conn,$sqlu) or die("could not update.mysqli_error()");
		header("Location:Home4.php");
		
}*/



}// close errors
// close if form sent

//show any errors
/*if (!empty($error))
{
        $i = 0;
        while ($i < count($error)){
        echo "<div class='error-msg'>".$error[$i]."</div>";
        $i ++;}
}*/// close if empty errors


//if ($rsent == true){
   // echo "<p>Just sent an email with your account details to $email</p>n";
   // } else// {
   // echo "<p>Please enter your e-mail address. You will receive a new password via e-mail.</p>";
   // }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>RAIT PRINT</title>
  
  <link type="text/css" rel="stylesheet" href="css.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3 .3.1/jquery.min.js"></script>
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
		
	<br>
  </div>
  
	<nav class="navbar navbar-default" >
	
    <div class="nav nav-justified row" id="myNavbar" >
    
        <div class="col-md-6 "><a href="userpage.php"  >Home</a></div>
       <div class="col-md-6"><a href="contact.php" >Contact Us</a></div>
      
    </div>
  </nav>
<br>
</div>

<!--form action="emailotp.php" method="post">
<p>Your Rollno: <input type="text" name="rollno" size="50" maxlength="8">
<p>Your Email: <input type="text" name="email" size="50" maxlength="30">
<input type="submit" name="submit" value="Get OTP"></p>
</form-->

<!--?php
session_start();
// set time-out period (in seconds)
$inactive = 10;


// check to see if $_SESSION["timeout"] is set
if (isset($_SESSION["timeout"])) {
    // calculate the session's "time to live"
    $sessionTTL = time() - $_SESSION["timeout"];
	echo $inactive;
    if ($sessionTTL > $inactive) {
        session_destroy();
        header("Location: home4.php");
    }
}
--?>