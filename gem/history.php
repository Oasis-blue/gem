<?php
session_start();
if (isset($_SESSION['userid'])) {

}
else{
//redirect to login    
header("Location: say.php"); }   
$id=$_SESSION['userid'];
$connection=mysqli_connect("localhost","root","mysql","gem");
$queryrr = "select * from gem.history where userid='$id'";

$resultrr = mysqli_query($connection, $queryrr);
?>

<html>
<head><title>History</title></head>
<body>
<center><h1><a href="sayl.php">Go back</a></h1></center>
<div class="moder" id="moder">
<center>
    
<table align="center" border="1px" style="width:100% ; height: 40%;overflow: auto; font-size: 2vw; color: black; border: 1px solid;" cellpadding="2vw">
<tr>
<th colspan="5" style="border:none ;">History</th> 

</tr>
<tr>

<th>Doctor</th>
<th>Date</th>
<th>Time</th>
<th>Location</th>
<th>Conclusion</th> 
</tr>
<?php
while($userdatarr = mysqli_fetch_array($resultrr)){ ?>



<tr>
  


<td><?php $q2=mysqli_query($connection, "select * from gem.doc where id="."'".$userdatarr['docid']."'");
$getdoc= mysqli_fetch_assoc($q2);
echo "DR.".$getdoc['surname']." ".$getdoc['firstname'];   ?></td> 

<td><?php echo $userdatarr['date'] ;  ?></td>


<td><?php $q1=mysqli_query($connection, "select * from gem.time where timeid="."'".$userdatarr['timeid']."'");
$gettime=mysqli_fetch_assoc($q1);
echo $gettime['time'];   ?></td>


<td><?php   $q3=mysqli_query($connection, "select * from gem.location where locid="."'".$userdatarr['locid']."'");
$getloc=mysqli_fetch_assoc($q3);
echo $getloc['location']; ?></td>

<td><?php $q4=mysqli_query($connection, "select * from gem.conc where concid="."'".$userdatarr['concid']."'");
$getcon=mysqli_fetch_assoc($q4);
echo $getcon['conclusion'];  ?></td>
</tr>
<?php
}

?>
</table></center>
</div>



</body>
</html>