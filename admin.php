<?php
session_start();
if (isset($_SESSION ['id'])){
	//here if user already logged in page will redirect to homepage
	header("Location:admin_live.php") ;
	
}
?>
<html>
<head></head>
<body>
<form action="checkadmin.php" method="post">
<table align="left">

<tr><td>Roll No:</td></tr>
<tr><td><input type="text" name="rollno" placeholder="Enter your Roll No"></td></tr>
<tr><td>Password:</td></tr>
<tr><td><input type="password" name="pass" placeholder="Enter your password"></td></tr>
<tr><td><input type="submit" value="submit" name="submit"></td></tr>
</table>

</p>

</body>
</html>