<?php

session_start();

$connection=mysqli_connect("localhost","root","mysql","gem");



    if (isset($_SESSION['admin'])) {

        if ($_SESSION['admin']==16347) {}
        

    }else{
    
    //redirect to login    
    header("Location: sst.php");    die;
}

//connect to the database
$connection=mysqli_connect("localhost","root","mysql","gem");

$select=mysqli_query($connection, "SELECT*FROM gem.doc");


?>



<html>
<head><title>Staff Logins</title></head>

<style>
body{background-color: blueviolet;
background-image: url("gem.png");
background-repeat: no-repeat;
background-position: 50%;
font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
}
table tr td{font-size: 3vw;
}

</style>
<body>
<a href="out.php" style="text-decoration: none; color: wheat;font-size: 2vw;">Log out</a>
<br>
 <br>

<table align="center" style="border: dotted black;" width="100%" height="150px">
<tr>
    <td>Staff Id</td>
    <td>Key</td>

</tr>




<?php
while($getdata=mysqli_fetch_array($select)){



?>





<tr style="background-color: antiquewhite;">
    <td><?php echo $getdata["id"]?></td>
    <td><?php echo $getdata["keyy"]?></td>
    
</tr>

<?php
}

?>

</table>


</body>    
</html>