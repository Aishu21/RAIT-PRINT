<?php
include "db.php";
session_start();
if(!isset($_SESSION['id']))
{
	//if user hhas logged out in other tab this page will also be logged out
	header("Location:Home4.php");
	
}
$sql = "select * from signup where rollno='".$_SESSION['id']."'";
$query_signup = mysqli_query($conn,$sql);
$row_signup = mysqli_fetch_array($query_signup);

if(isset($_REQUEST["submit"]))
{
	 $chk=$_REQUEST["chk"];
	 $a=implode(",",$chk);
	$query=mysqli_query($conn,"select * from images where id_images in($a)");
	$rowcount=mysqli_num_rows($query);
	
	for($i=1;$i<=$rowcount;$i++)
	{
		  $row=mysqli_fetch_array($query);
		  unlink("uploads/".$row["file"]);
	}
	 
	 mysqli_query($conn,"delete from images where id_images in($a)");
}

$query=mysqli_query($conn,"select * from images where upload_rollno='".$_SESSION['id']."' ");
$rowcount=mysqli_num_rows($query);

?>



<form method="post">
<table border="1" align="center">
<tr>

<td>Id</td>
<td>name</td>
<td>type</td>
<td>Image</td>
<td>View</td>
<td><input type="submit" value="Delete" name="submit"></td>

</tr>


<?php
for($i=1;$i<=$rowcount;$i++)
{
	  $row=mysqli_fetch_array($query);
?>
<tr>
<td><?php echo $row["upload_rollno"] ?></td>
<td><?php echo $row["file"] ?></td>
<td><?php echo $row["type"] ?></td>.
<td><a href="password.php">Print</a></td>
<td><img src="uploads/<?php echo $row["file"] ?>" height="150" width="150"></td>
<td><input type="checkbox" name="chk[]" value="<?php echo $row["id_images"] ?>"></td>
<td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>


</tr>
<?php
}


?>

</table>
</form>