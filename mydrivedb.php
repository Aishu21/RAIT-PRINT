<?php
include 'db.php';
session_start();
if(!isset($_SESSION['id']))
{
	//if user hhas logged out in other tab this page will also be logged out
	header("Location:Home4.php");
	
}
$sql = "select * from signup where rollno='".$_SESSION['id']."'";
$query = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($query);

?>

<?php
include_once 'db.php';
if(isset($_POST['btn-upload']))
{    
     
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 $rno=$row['rollno'];
 $pass=$row['password'];
 
 // new file size in KB
 $new_size = $file_size/1024;  
 
 // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
 
 $final_file=str_replace(' ','-',$new_file_name);
 
 if(move_uploaded_file($file_loc,$folder.$final_file))
	{
  $sql="INSERT INTO images (file,type,size,upload_rollno,upload_pass) VALUES('$final_file','$file_type','$new_size','$rno','$pass')";
  mysqli_query($conn,$sql);
  ?>
  <script>
  alert('successfully uploaded');
     <?php header("Location:mydrive.php");?>
        </script>
		  
		<!--a href="user_live.php" target="_blank">My request</a-->
  <?php
 }
 else
 {
  ?>
  <script>
  alert('error while uploading file');
      //  window.location.href='login.php?fail';
        </script>
  <?php
 }
}
?>
<