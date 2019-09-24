<?php
include "db.php";
session_start();
if(!isset($_SESSION['id']))
{
	//if user hhas logged out in other tab this page will also be logged out
	header("Location:Home4.php");
	
}
$sql = "select * from admin where ID='".$_SESSION['id']."'";
$query_signup = mysqli_query($conn,$sql);
$row_signup = mysqli_fetch_array($query_signup);
$srno=0;

if(isset($_REQUEST["submit"]))
{
	 $chk=$_REQUEST["chk"];
	 $a=implode(",",$chk);
	$query=mysqli_query($conn,"select * from only10requests where token in($a)");
	$rowcount=mysqli_num_rows($conn,$query);
	
	for($i=1;$i<=$rowcount;$i++)
	{
		  $row=mysqli_fetch_array($query);
		  //unlink("uploads/".$row["file"]);
	}
	 
	 mysqli_query($conn,"delete from only10requests where token in($a)");
}
$query1=mysqli_query($conn,"select * from only10requests");
//$query=mysqli_query($conn,"select * from images");
$rowcount=mysqli_num_rows($query1);


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
			<h5 class="signout" ><img src="images/user.jpg"class="img-circle" height="30" width="30"> Hello,<?php echo $row_signup['name'];?></h5>
			<h5>Wallet Balance : 100 Rs/-</h5> 
		
		<script>
$(document).ready(function(){
    $('.signout').popover({ content: "<div class='row'><div class='col-sm-4 text-left'><br><img src='images/user.jpg'class='img-circle' height='100' width='80'></div><div class='col-sm-8'><br>	<h4><?php echo $row_signup['name'];?></h4><h5><?php echo $row_signup['rollno'];?></h5>	<br><br><a href='myaccount.php'><button class='btn-primary' style='width:150px;'>My Account</button></a></div></div><hr>	<a href='logout1.php'><button  class='btn-primary' style='width:250px;'>Sign out</button> </a>", html: true, placement: "bottom",}); });
	</script>
	</div><br>
  </div>
  
	<nav class="navbar navbar-default" >
	
		<div class="nav nav-justified row" id="myNavbar" >
		
			<div class="col-sm-2 "><a href="userpage.php"  >Home</a></div>
			<div class="col-sm-2 active"><a href="userliverequest.php"  >Live Requests</a></div>
			<div class="col-sm-2"><a href="mydrive.php" >My Drive</a></div>
			<div class="col-sm-2"><a href="recharge.php" >Recharge</a></div>
			<div class="col-sm-2"><a href="myaccount.php" >My Account</a></div>
			<div class="col-sm-2"><a href="contact.php" >Contact Us</a></div>
		  
		</div>
	</nav>	
	<br>
	
	<div class="well well-lg">
	<table class="table table-hover">
    <thead>
      <tr>
		<th>Sr. No.</th>
        <th>Full Name</th>
        <th>Number of Pages </th>
        <th>Estimated Time</th>
		<th>Print</th>
      </tr>
    </thead>
    <tbody>
      
	  <?php
for($i=1;$i<=$rowcount;$i++)
{
	  $row=mysqli_fetch_array($query1);
	  $query=mysqli_query($conn,"select * from images where id_images=$row[token]");
	  $row1=mysqli_fetch_array($query);
	  
?>


<tr>
<td><?php $srno++; echo $srno; ?></td>
<td><?php echo $row["id"] ?></td>
<td><input type="checkbox" name="chk[]" value="<?php echo $row["token"] ?>"></td>
<td><a href="uploads/<?php echo $row1['file'] ?>" target="_blank">view file</a></td>

<?php
if(isset($_POST['verify']) && $_POST['verify']== 'verify')
{
	$uname = $_POST['rollno'];
	$pass = $_POST['pass'];
	$query = mysqli_query($conn,'SELECT * FROM signup where rollno="'.$uname.'" and password="'.$pass.'"');
	$row = mysqli_num_rows($query);
	if($row<=0)
	{
		echo 0;
		
	}
	else{
		//user logs in so we will store id in session variable
		$result = mysqli_fetch_array($query);
		$_SESSION['id']=$result['rollno'];
		
		echo 1;
			header("Location:torefer.php");
			exit;
	}
}
?>

	
  <td>
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Print
  </button>

  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Password Verification</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
		<form class="form-group " method="POST" action="userliverequest.php">
		<div class="row">
			<div class="col-sm-3">
			<label for="rollno" >Roll No : </label>
			</div>
			<div class="col-sm-9">
			<input class="form-control" type="text" name="rollno" placeholder="Enter your Roll Number"><br>
			</div>
			<div class="col-sm-3">
			<label for="pass" >Password : </label>
			</div>
			<div class="col-sm-9">
			<input class="form-control" type="password" name="pass" placeholder="Enter your Password">
			</div>
		</div>	
			</br>
			<input type="submit" value="verify" name="verify">
		</form>	
        </div>
        
        
        
      </div>
    </div>
  </div>
  </td>



</tr>
<?php
}


?>
	  
    </tbody>
  </table>
	</div>

		
</div>
</body>
</html>	