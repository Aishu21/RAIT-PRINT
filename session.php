<!--?php
session_start();
// set time-out period (in seconds)
$inactive = 10;


// check to see if $_SESSION["timeout"] is set
if (isset($_SESSION["timeout"])) {
    // calculate the session's "time to live"
    $sessionTTL = time() - $_SESSION["timeout"];
	echo $inactive;
    if ($sessionTTL > $inactive) {
        session_destroy();
        header("Location: home4.php");
    }
}
--?>
<?php
$_SESSION["timeout"] = time();

<html>
 <head>
 </head>
 
 <script>
  time = 10
  function timer(){
   if(!time<1){
   time = time - 1
   result.innerHTML = "please wait for "+time+" seconds"
   }else{
    window.clearInterval(update);
    result.innerHTML = "<h1>Countdown done</h1>"
   }
  }
  update = setInterval("timer()",60)
 </script>
 
 <body>
  <div id="result"></div>
 </body>

 </html>﻿
 ?>