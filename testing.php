

<?php
include "db.php";
session_start();
if(!isset($_SESSION['id']))
{
	//if user hhas logged out in other tab this page will also be logged out
	header("Location:Home4.php");
	
}
$sql = "select * from signup where rollno='".$_SESSION['id']."'";
?>
<html>
<head>
<script>
var date = new Date();
var sec = date.getSeconds();
var seccaught =sec;
<?php
$sec = "<script>document.write(seccaught);</script>";
echo $sec;?>
var min = date.getMinutes();
var mincaught = min;
<?php
$min = "<script>document.write(mincaught);</script>";?>
var timer = mincaught - min;

<?php

//echo $min;

$rollno = $_SESSION['id'];
 $sql1 = "INSERT INTO timestamp (rollno,minutes,seconds) VALUES ($rollno,$min,$sec)";
  mysqli_query($conn,$sql1);
?>
var handler = function() {
	//if(timersec===600){
		
  if (++sec === 60) {
    sec = 0;
	//timer = mincaught - min;
	//if(timer===10)break;
    if (++min === 60) {min = 0; }
	
  }
	//}
  document.getElementById("time").innerHTML = (min < 10 ? "0" + min : min) + ":" + (sec < 10 ? "0" + sec : sec)+" " + timer + " " + seccaught;
};
setInterval(handler, 1000);
handler();
</script>
</head>
<body>
<h1 id="time" style="text-align: center"></h1>
</body>
</html>