<?php
include "db.php";
session_start();
if(!isset($_SESSION['id']))
{
	//if user hhas logged out in other tab this page will also be logged out
	header("Location:admin.php");
	
}
$sql = "select * from admin where ID='".$_SESSION['id']."'";
$query_signup = mysqli_query($conn,$sql);
$row_signup = mysqli_fetch_array($query_signup);

if(isset($_REQUEST["submit"]))
{
	 $chk=$_REQUEST["chk"];
	 $a=implode(",",$chk);
	$query=mysqli_query($conn,"select * from only10requests where token in($a)");
	$rowcount=mysqli_num_rows($query);
	
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


<a href="adminlogout.php"><button>Logout</button></a>
<form method="post">
<table border="1" align="center">
<tr>

<td>token</td>
<!--<td>name</td>
<td>type</td>
<td>Image</td>-->
<td>View</td>
<td><input type="submit" value="Delete" name="submit"></td>

</tr>


<?php
for($i=1;$i<=$rowcount;$i++)
{
	  $row=mysqli_fetch_array($query1);
	  $query=mysqli_query($conn,"select * from images where id_images=$row[token]");
	  $row1=mysqli_fetch_array($query);
?>
<tr>
<td><?php echo $row["token"] ?></td>
<td><a href="password.php">Print</a></td>
<td><input type="checkbox" name="chk[]" value="<?php echo $row["token"] ?>"></td>
<td><a href="uploads/<?php echo $row1['file'] ?>" target="_blank">view file</a></td>


</tr>
<?php
}


?>

</table>
</form>