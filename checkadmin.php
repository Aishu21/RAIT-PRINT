<?php
include 'db.php';
session_start();
if(isset($_POST['submit']) && $_POST['submit']== 'submit')
{
	$uname = $_POST['rollno'];
	$pass = $_POST['pass'];
	$query = mysqli_query($conn,'SELECT * FROM admin where ID="'.$uname.'" and PASSWORD="'.$pass.'"');
	$row = mysqli_num_rows($query);
	if($row<=0)
	{
		echo 0;
	
	}
	else{
		//user logs in so we will store id in session variable
		$result = mysqli_fetch_array($query);
		$_SESSION['id']=$result['ID'];
		
		echo 1;
			header("Location:admin_live.php");
			exit;
	}
}
	
	
	
	
	
	
	
	?>