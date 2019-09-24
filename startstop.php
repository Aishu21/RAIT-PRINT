<!--?php
if(!empty($_POST['stop'])) {
    // elapsed time in seconds
    $etime=time() - $_POST['starttime'];
    echo "elapsed time $etime<br>";
}
?>
<form method="post">
<input type="hidden" name="starttime" value="<!--?php echo !empty($_POST['start']) ? time() : $_POST['starttime']; ?-->">
<!--input type="submit" name="start" value="start">
<!--input type="submit" name="stop" value="stop">
</from-->
<?php
$time = time();
      $_SESSION['time_started'] = $time;
      $_SESSION['time_remaining'] = 20; //45 minutes
$oldtime = $_SESSION['time_started'];
      $newtime = time();
      $difference = $newtime - $oldtime;
      $_SESSION['time_remaining'] = $_SESSION['time_remaining'] - $difference;
      if ($_SESSION['time_remaining'] > 0)
      { 
          $_SESSION['time_started'] = $newtime; `
		  echo $newtime;
         //continue
      } else {
         //out of time
		 echo "time up";
      }
	  ?>