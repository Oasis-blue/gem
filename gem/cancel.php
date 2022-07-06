<?php
session_start();
if (isset($_SESSION['userid'])) {

}
else{
//redirect to login    
header("Location: say.php"); }   
$connection=mysqli_connect("localhost","root","mysql","gem");


$appid=$_GET["nmy"];

$queryrr = "select * from gem.app where apid='$appid'";

$resultrr = mysqli_query($connection, $queryrr);
$getappp=mysqli_fetch_assoc($resultrr);
$userid=$getappp['userid'];
$docid=$getappp['docid'];
$date=$getappp['date'];
$timeid=$getappp['timeid'];
$locid=$getappp['locid'];
$concid="can";

$quer="insert into gem.history (userid, docid, date, timeid, locid, concid) values('$userid','$docid','$date','$timeid','$locid','$concid')";
$res=mysqli_query($connection,$quer);
if ($res==1){
$quern="delete from gem.app where apid='$appid'";
$resn=mysqli_query($connection,$quern);
header("Location:sayl.php");
}else{ echo '<h1>Something went wrong. <a href="sayl.php">Go Back</a>'; }

?>
