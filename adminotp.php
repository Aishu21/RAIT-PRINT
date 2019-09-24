<?php

include "db.php";

if (isset($_POST['submit']))
{$OTP = $_POST['otp'];
$rollno = $_POST['rollno'];
$query_signup="select * from signup where rollno= '$rollno'  ";
$result_signup = mysqli_query($conn,$query_signup);
$row_signup = mysqli_fetch_array($result_signup);
$num_signup = mysqli_num_rows($result_signup);
if($row_signup['rollno']== $rollno && $row_signup['OTP']== $OTP){
	echo "OTP verified";
}
else{
	echo "Not Verified";
}
}






?>
<html>
<form action="adminotp.php" method="post">
<p>Your Rollno: <input type="text" name="rollno" size="50" maxlength="8">
<p>Your OTP: <input type="text" name="otp" size="50" maxlength="30">
<input type="submit" name="submit" value="print"></p>
</form>
</html