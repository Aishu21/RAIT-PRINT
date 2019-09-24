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
  <style>
  <script type="text/javascript">
    function Validate() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm_password").value;
		if(password==""){
		
		alert("Please enter a password.");
		}
		if(password.length<=5){
	
		alert("Enter password of min length 6.");
		return false;
		}
		
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>
  </style>
</head>
<body>

<div class="container-fluid">

	

	<div class="row " style="background-color:#eee; border-bottom:5px blur darkgrey; border-radius:4px; margin-top:10px; ">
		
		<div class="col-sm-4 " >
			<a href="Home4.php">
				<img src="images/logo.png" class="img-fluid center" style="padding:20px;"/>
			</a>
		</div>
		
		<div class="col-sm-4 text-center" >
			<br>
			<a href="Home4.php" style="text-decoration:none;color:#C43125;font-family:algerian;"> <h2>RAIT PRINT</h2> </a>
		</div>
		
		<div class="col-sm-4">
			<div class="row">
			
				<div class="col-sm-6" style="top:22px;">
				<a  href="#" style="text-decoration:none;"><button class="btn  btn-block" style="background-color:#C43125;color:white;" data-toggle="modal" data-target="#login" ><span class="glyphicon glyphicon-log-in" style="color:white; "></span>&nbsp;&nbsp;LOGIN</button></a>
					<div class="modal fade" id="login" role="dialog">
					<div class="modal-dialog ">
					
					  <!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
						  <button type="button" class="close" data-dismiss="modal">&times;</button>
							<div class="text-center" >
								<a href="Home4.php" style="font-size:35px;font-family:algerian; text-decoration:none; color:#C43125" >
								<img src="images/logo.png" width="500" height="50"  class="img-fluid"  /><h1>RAIT PRINT</h1>
								</a>
							</div>
						  
						</div>
						<div class="modal-body">
							<h2 class="modal-title text-center" style="color:#C43125;">LOG IN</h2>
							<form  role="form" method="POST" action="checker.php">
								<input class="form-control" id="ABC" type="text"name="rollno" placeholder="Rollno"><br>
								<input class="form-control" id="CDE" type="password" title="Password should be at least 6 characters long."name="pass" placeholder="Password"><br>
								<input class="btn btn-block btn-primary" type= "submit" name="submit" value="submit">
								<!--button class="btn btn-primary btn-block"type="button" class="acc">Log In</button-->
							</form>	
						</div>
						<div class="modal-footer justify-content-between">
						  <div class="row w-100">
					
							<div class="col-sm-6">
							<a href="#" style="text-decoration:none;">
							<button class="btn btn-block btn-social btn-google " type="button" style="background-color:#DD4B39 ;color:white;">
							<span class="fa fa-google"></span>Sign in with Google</button></a>
							</div>
							
							<div class="col-sm-6">
							<a href="#" style="text-decoration:none; ">
							<button class="btn btn-block btn-social btn-facebook" type="button" style="background-color:#3B5998 ;color:white;">
							<span class="fa fa-facebook"></span>Sign in with Facebook</button></a>
							</div>
						  </div>
						</div>
					</div>
					</div>
					</div>
				 <br>
				</div>
			
				<div class="col-sm-6"style="top:22px;">
				<a  href="#" style="text-decoration:none;"><button class="btn btn-block" style="background-color:#C43125;color:white; " data-toggle="modal" data-target="#signup"><span class="glyphicon glyphicon-user" style="color:white;"></span>&nbsp;SIGN UP</button></a>
					 <!-- Modal -->
				  <div class="modal fade" id="signup" role="dialog">
					<div class="modal-dialog modal-lg">
					
					  <!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							
							
							<div class="text-center" >
								<a href="Home4.php" style="font-family:algerian; text-decoration:none; color:#C43125" >
								<img src="images/logo.png" class="img-fluid " width="725" >
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<br><h1 class="float-center">RAIT  PRINT</h1>
								</a>
							</div>
						</div>
						<div class="modal-body">
						
							<h2 class="modal-title text-center" style="color:C43125;">SIGN UP</h2>												
						
						<form role="form" method="POST" action="signupdb.php" onsubmit="return Validate()">
							 
							<div class="form-group row">
						
								<label for="name" class="col-sm-3 col-form-label">User Name : </label>
								<div class="col-sm-9">
									<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
									<input id="name" type="text" class="form-control" name="name" placeholder="Full Name" required>
								</div>
							
							</div>
							  
							  
							<div class="form-group row">
								<label for="email" class="col-sm-3 col-form-label">Email : </label>
								<div class="col-sm-9">
									<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
									<input id="email" type="email" class="form-control" name="email" placeholder="Email" required>
								</div>
							</div>	
							  
							  
							<div class="form-group row">
								<label for="mobile" class="col-sm-3 col-form-label">Mobile Number : </label>
								<div class="col-sm-9">
									<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
									<input id="mobile" type="number" class="form-control" name="mobile" placeholder="Mobile Number">
								</div>
							</div>	
							 
							  
							<div class="form-group row">
								<label for="rollno" class="col-sm-3 col-form-label">Roll Number : </label>
								<div class="col-sm-9">
									<span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
									<input id="rollno" type="text" class="form-control" name="rollno" placeholder="Roll Number" required>
								</div>
							</div>
							
							  
							<div class="form-group row">
								<label for="pass" class="col-sm-3 col-form-label">Create Password : </label>
								<div class="col-sm-9">
									<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									<input id="password" type="password" class="form-control" name="pass" placeholder="Create Password" required>
								</div>
							</div>	
							  
							  
							<div class="form-group row">
								<label for="conpass" class="col-sm-3 col-form-label">Confirm Password : </label>
								<div class="col-sm-9">
									<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
									<input id="confirm_password" type="password" class="form-control" name="conpass" placeholder="Confirm Password" required>
								</div>	
							</div>
							  <br>
							  
							  <a href="#"><!--button class="btn btn-primary btn-block" --> <input class="btn btn-block btn-primary"  type="submit"  value="Submit" name="submit"> <!--/button--></a><br>
							  
							  <a href="#" style="text-decoration:none;">
							  <button class="btn btn-block btn-social btn-google" type="button" style="background-color:#DD4B39 ;color:white;">
							  <span class="fa fa-google"></span>Sign in with Google</button></a><br>
						
							  <a href="#" style="text-decoration:none; ">
							  <button class="btn btn-block btn-social btn-facebook" type="button" style="background-color:#3B5998 ;color:white;">
							  <span class="fa fa-facebook"></span>Sign in with Facebook</button></a>
						</form>					
						</div>
						
						
						
					</div>
					</div>
					</div>
					<br><br>
					</div>
			
					</div>
				</div>
	</div>
		
<br>
	
	<nav class="navbar navbar-default" >
	
		<div class="nav nav-justified row" id="myNavbar" >
		
			<div class="col-sm-3 " ><a href="Home4.php" >Home</a></div>
			<div class="col-sm-3"><a href="homeliverequest.php"  >Live Requests</a></div>
			<div class="col-sm-3"><a href="whyrait.php" >Why RAIT PRINT?</a></div>
			<div class="col-sm-3 active"><a href="aboutus.php" >About Us</a></div>
		  
		</div>
	</nav>
	</div>
</body>
</html>	