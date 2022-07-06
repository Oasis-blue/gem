<?php
session_start();
if (isset($_SESSION['userid'])) {

    }
    else{
    //redirect to login    
    header("Location: say.php"); }   
$apploc=$_SESSION['apploc'];
$appspec=$_SESSION['appspec'];



?>









<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

th {text-align: left;}



.modera{
position:fixed;
z-index: 1;
left: 0;
right: 0;
width: 100%;
height: 100%;
overflow: auto;
background-color:white;

}
.closeera{color: #aaa;

float: right;
font-size: 5vw;
font-weight: bold;}
.closeera:hover,.closeera:focus{color: white;text-decoration:  none;cursor: pointer;}

</style>
</head>
<body>

<?php


$connection=mysqli_connect("localhost","root","mysql","gem");



$sql="select * from gem.doc where specid='$appspec' and locid='$apploc'";
$result = mysqli_query($connection,$sql);

?>


<div class="modera" id="modera">
<center>
<a href="sayl.php"><span class="closeera">&times;</span></a>
<table align="center" border="1px" style="width:100% ;font-size: 2vw; color: black;" cellpadding="2vw">
<tr>
<th colspan="3" style="border:none ; text-align: center;" >Available doctors</th> 

</tr>
<tr>
<th>Doctor</th> 
<th>Days Active</th>
<th>Hours</th>
</tr>
<?php
while($row = mysqli_fetch_array($result)){ ?>



<tr>
  
<td><?php echo "DR.".$row['surname']." ".$row['firstname'];   ?></td>


<td><?php echo $row['days'] ;  ?></td>


<td><?php $q1=mysqli_query($connection, "select * from gem.time where timeid="."'".$row['timesrt']."'");
$gettime=mysqli_fetch_assoc($q1);
$q2=mysqli_query($connection, "select * from gem.time where timeid="."'".$row['timedis']."'");
$gettimes=mysqli_fetch_assoc($q2);
echo $gettime['time']."-".$gettimes['time'];   ?></td>

<td><a href="comapp.php?ttf=<?php echo $row['id'] ?>">select</a></td>
</tr>
<?php
}

?>
</table></center>
</div>

</body>
</html>