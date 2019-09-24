<html>
 <head>
 </head>
 
 <script>
$( document ).ready( function(){
   setTime(180001); // set for 3 minute interval scans
});

function setTime(interval){
    setTimeout(startCounter(interval, 0),interval);
}
function startCounter(target, current) {
    var mins, secs;
    if (current >=60) {
        mins = Math.floor(current/60);
        secs = current - (mins*60);
        $('#refresh p').html('Last Scanned: '+ mins + 'm ' + secs + 's ago');
    }else $('#refresh p').html('Last Scanned: '+ current + 's ago');
  if (current >= target/1000) {
    setTime(180001);
    return;
  }
  setTimeout(function(){startCounter(target, current+1);}, 1000);
}
</script>
<body>

<div id="refresh"><p></p></div>

 </body>

 </html>﻿
