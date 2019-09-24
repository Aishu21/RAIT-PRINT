
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


$wallet = $row['wallet'];
$filepath="SNMR updated Manual Final 28072016 (2).pdf";
$pagecount=getNumPagesPdf($filepath);
if($wallet == 0){
	echo "Refill your wallet first. Your balance is Rs.0";
}
if($pagecount > $wallet)
{
	echo "Refill your wallet to take print";
}
//echo $pagecount;
else{
$wallet = $wallet-$pagecount*1;
echo $wallet;
	$sql_wallet = "UPDATE signup SET wallet= $wallet WHERE  rollno= '".$_SESSION['id']."'";
	$res = mysqli_query($conn,$sql_wallet) or die("could not update.mysqli_error()");
header("Location:myaccount.php");}
function getNumPagesPdf($filepath) {
    $fp = @fopen(preg_replace("/\[(.*?)\]/i", "", $filepath), "r");
    $max = 0;
    if (!$fp) {
        return "Could not open file";
    } else {
        while (!@feof($fp)) {
            $line = @fgets($fp, 255);
            if (preg_match('/\/Count [0-9]+/', $line, $matches)) {
                preg_match('/[0-9]+/', $matches[0], $matches2);
                if ($max < $matches2[0]) {
                    $max = trim($matches2[0]);
                    break;
                }
            }
        }
        @fclose($fp);
    }

    return $max;
}

?>