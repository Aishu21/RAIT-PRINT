
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
?>

<html>
<head>
</head>
<body>
      <h5> 
		NAME :<?php echo $row['name'];?> <br> <br> 
		E-MAIL :<?php echo $row['email'];?><br> <br> 
		MOBILE NUMBER :<?php echo $row['mobile'];?> <br> <br> 
		<a href="edit.php">edit</a>
		
		</h5>
</body>
</html>