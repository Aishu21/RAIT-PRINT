


<?php
	include "db.php";
	$name = "'".(string)$_POST["name"]."'";
	$email = "'".(string)$_POST["email"]. "'";
	$mobile = "'".(string)$_POST["mobile"]."'";
	$rollno = "'".(string)$_POST["rollno"]."'";
	$password = "'".(string)$_POST["pass"]. "'";
	$confirmpassword = "'".(string)$_POST["conpass"]. "'";

	  
	  
	  $sql = "INSERT INTO signup (name,email,mobile,rollno,password,confirmpassword)
	  VALUES ($name,$email,$mobile,$rollno,$password,$confirmpassword)";
	  if ($conn->query($sql) === TRUE) {
	 // header("Location:/RAIT PRINT/Home4.php");
	  //echo '<script language="javascript">';
echo 'alert("Successfully Registered")';
//echo '</script>';
	  
 header("Location:/RAIT PRINT/Home4.php");

	
    exit;

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>