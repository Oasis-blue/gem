<?php
session_start();
$connection=mysqli_connect("localhost","root","mysql","gem");

if (isset($_SESSION['docid'])) {

$id = $_SESSION['docid'];
$query = "select * from gem.doc where id='$id' or email='$id' limit 1";

$result = mysqli_query($connection, $query);

if ($result && mysqli_num_rows($result) > 0) 
{

    $userdata = mysqli_fetch_assoc($result);
   
}
}else{
//redirect to login    
header("Location: health.php"); } 