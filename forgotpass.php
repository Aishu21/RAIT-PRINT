<?php
include "db.php";


//This code runs if the form has been submitted
if (isset($_POST['submit']))
{

// check for valid email address
$email = $_POST['email'];
$rollno = $_POST['rollno'];
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
     $error[] = 'Please enter a valid email address';
}

// checks if the username is in use
$check = mysqli_query($conn,"SELECT email FROM signup WHERE email = '$email'");
$check2 = mysqli_num_rows($check);

 
//if the name exists it gives an error
if ($check2 == 0) {
$error[] = 'Sorry, Your emails doesnt exists in our record';
}

 $error=filter_var($email, FILTER_VALIDATE_EMAIL);
if ($error) {

$query = mysqli_query($conn,"SELECT name FROM signup WHERE rollno = '$rollno' and email = '$email'  ");
$r=mysqli_fetch_object($query);


//create a new random password

$password = substr(md5(uniqid(rand(),1)),3,10);



//send email
$to = "$email";
$subject = "Account Details Recovery";
$body = "Hi $r->name,  you or someone else have requested your account details. nn Here is your account information please keep this as you may need this at a later stage. Your username is $r->name and your password is $password . Your password has been reset please login and change your password to something more rememberable. Regards Site Admin";
$lheaders= "From: <raitprint@gmail.com>";
$lheaders.= "Reply-To: noprely@domain.com";
mail($to, $subject, $body, $lheaders);

//update database
//$sqlu = " UPDATE signup SET password = '$pass' WHERE  rollno= '$rollno' ";
$resu = mysqli_query($conn," UPDATE signup SET password = '$password' WHERE  rollno= '$rollno' ") or die("could not update.mysqli_error()");
echo "An email has been send to your registered mail id";

/*if(isset($_POST['rollno']) &&  isset($_POST['email'])){
	$newpass = $pass;
	$sqlu = "UPDATE signup SET password= '$newpass' WHERE  rollno= '$rollno' ";
	$res = mysqli_query($conn,$sqlu) or die("could not update.mysqli_error()");
		header("Location:Home4.php");
		
}*/



}// close errors
}// close if form sent

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

<form action="forgotpass.php" method="post">
<p>Your Rollno: <input type="text" name="rollno" size="50" maxlength="8">
<p>Your Email: <input type="text" name="email" size="50" maxlength="30">
<input type="submit" name="submit" value="Get New Password"></p>
</form>