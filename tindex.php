<?php
include "db.php";
session_start(); 
if(!isset($_SESSION['id']))
{
	//if user hhas logged out in other tab this page will also be logged out
	header("Location:Home4.php");
	
}


?>
<div id="response"></div>
<script type="text/javascript">
setInterval(function()
{
var xmlhttp = new XMLHttpRequest();
xmlhttp.open("GET","response.php",false);
xmlhttp.send(null);
document.getElementById("response").innerHTML = xmlhttp.responseText;
},1000);
</script>