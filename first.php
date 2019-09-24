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
$duration="";
//while($row = mysqli_fetch_array($result))
//{
	//$duration=$_row['duration'];
	
//}
$row = mysqli_fetch_array($result);
$duration=$_row['duration'];
	

$_SESSION['duration'] = $duration;

$_SESSION["start_time"]= date("Y-m-d H:i:s");

$end_time = date('Y-m-d H:i:s' , strtotime('+'.$_SESSION['duration'].'+1 minutes', strtotime($_SESSION["start_time"])));
$_SESSION["end_time"]=$end_time;
 
?>

<script type="text/javascript">
window.location ="tindex.php";
if (minutes == '00' && seconds == '00') { 
	seconds = "00"; 
	window.clearTimeout();
	//document.formname.submit();
	window.location="mydrive.php";
	}
</script>