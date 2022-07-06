<?php
session_start();
if (isset($_SESSION['userid'])) {

}
else{
//redirect to login    
header("Location: say.php"); }   
$connection=mysqli_connect("localhost","root","mysql","gem");
$select=mysqli_query($connection, "SELECT * FROM gem.time ");
$userid=$_SESSION['userid'];
$docid=$_GET["ttf"];
$locid=$_SESSION['apploc'];


function random_nums($length)
{
    $text = "";    if ($length < 5) 
{
        $length = 5;    }    $len = rand(4, $length);
    for ($i = 0; $i < $len; $i++) {
        # code...

        $text .= rand(0, 9);    }    return $text;
}


$sql="select * from gem.doc where id='$docid'";
$result = mysqli_query($connection,$sql);
$docdets=mysqli_fetch_assoc($result);
$timestr=$docdets['timesrt'];
$timedis=$docdets['timedis'];
$select=mysqli_query($connection, "SELECT * FROM gem.time where timeid>='$timestr' and timeid<'$timedis'");


if($_POST['go']!=""
){
if($_POST['date']=="Select Date"){
    $errt="select a valid date";
}else{

    if($_POST['time']==""){
        $errt="please select a time for appointment";
    }else{
        $date=$_POST['date'];
$timeid=$_POST['time'];
        $querysa = "select * from gem.time where timeid='$timeid'";
        $resultsa = mysqli_query($connection, $querysa);
        $timeget=mysqli_fetch_assoc($resultsa);
        $time=$timeget['time'];
        $querys = "select * from gem.app where docid = '$docid' and date='$date' and timeid='$timeid'";
        $results = mysqli_query($connection, $querys);
        if ($results && mysqli_num_rows($results) > 0) {
$errt="Doctor booked for $time on the $date. please select another time";
    }else{

        $appid = random_nums(5);        
        $queryd = "insert into gem.app(apid, userid, docid, date, timeid, locid) values('$appid','$userid','$docid','$date','$timeid','$locid')";        
        $sendd=mysqli_query($connection, $queryd);
        if ($sendd == 1) {
            $msgsucs = "Successful. Your Booking code is ".'<u>'.  $appid.'</u>'.'<br><a href="sayl.php">Go to homepage</a>';
        }
        else { 
            $errt = "error booking appointment, please try again";}
    }
}

}
}

?>

<html><meta name="viewport" content="width=device-width, initial-scale=1"><head>



<title>Gem Stone- Your #1 plug for healthcare. ID-<?php  echo $_SESSION['userid'];  ?></title>

<style>
   body{margin: 0;}
body .d{ color:white ;
    height:20%;
}

#top{width: 100%;
    
    background-color: black;
}
@media only screen and (max-width:999px){td div a{ font-size: 1.6vw;}}


@media only screen and (max-width:768px){
    .d{width:96%;}
#re{display: none;}
#er div a{padding: 10%;
border: 1px solid white;
border-radius: 5px;
font-size: 2vw;

}
#er div a:hover{
    border: 1px solid black;
border-radius: 5px;
background-color: white;
color: black;
}
#er div button{padding: 10%;
border: 1px solid white;
border-radius: 5px;
font-size: 2vw;

}
#er div button:hover{
    border: 1px solid black;
border-radius: 5px;
background-color: white;
color: black;
}

#tt table{
    max-height: 15%;
}

}

#goa{

border: none;
background-color: rgba(0,0, 0, 0);
color: white;
font-family: Arial, Helvetica, sans-serif;
}
#goa:hover{

color: mediumvioletred;}

td div button{

border: none;
background-color: rgba(0,0, 0, 0);
color: white;
font-family: Arial, Helvetica, sans-serif;
font-size: 16px;
}
td div button:hover{

color: mediumvioletred;}

td div a{

border: none;
background-color: rgba(0,0, 0, 0);
color: white;
font-family: Arial, Helvetica, sans-serif;
font-size: 16px;
}
td div a:hover{

color: mediumvioletred;}

td div a{

text-decoration: none;
color: white;
font-family: Arial, Helvetica, sans-serif;

}

#tt{width: 100%;
height: 80%;
background-color: white;}
.rr{
    text-align: center;
    font-size: 4vw;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
}
.rrr{
    text-align: center;
    font-size: 2vw;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
.in{width: 100%;
padding: 1.8vw;
font-size: 1.5vw;

}

</style>


</head>





<body >
  





    <div id="top">
<table width="100%"  class="d" cellspacing="10%">
<TR >
<td width="70%">
<a href="sayl.php" title="home">
<img src="gem.png" width="40%" alt="Logo" /></a></td>
<td width="14%" id="re">
  <div align="center"><a href="getdoc.php">Go back</a>
    
  </div></td>


<td width="8%" id="er"><div align="center"><a href="logout.php">Logout</a>
    
  </div>
</td>

    
  </div>
</td>
</TR>
</table>
    </div>
<br>



<p class="mmm" id="mmm" style="text-align: center"><?php echo $msg;?></p>
<center><p><?php echo $not; ?></p></center>

<div id="tt">
  <table width="80%" height="30%" align="center" class="ty">
    <tr>
      <td>
	  
	  <h1 class="rr">Finish booking</h1>
	  
	  
	  
	  
	  
	  
	  
	  </td>
    </tr>
  </table>

  <table width="80%" height="20%" align="center">
    <tr>
      <td valign="top" >
	  
	  
	  <p class="rrr">You are about to book an appointment with <?php echo "DR.".$docdets['surname']." ".$docdets['firstname'];   ?>
    <br> </p>
	  
	  
	  
	  
	  
	  
	  </td>
    </tr>
  </table>


  <form method="POST">

  <center><p><?php  echo $errt; echo $msgsucs; ?></p></center>
  <table width="80%" height="60%" align="center">
    <tr height="80%">
    <form method="POST">
        
    
    <td valign="top">
	  
	  
      <input type="date" name="date"  class="in" id="date" value="Select Date">
        
    

  </select>
  
        
        
        
        
        </td>




    <td valign="top">
	  

	  
	  <select name="time"  class="in" > 
	  
  
    <option value="">Select Time</option>
    <?php while($gettime=mysqli_fetch_array($select)){ ?>
<option value="<?php echo $gettime["timeid"]; ?>"><?php echo $gettime["time"]; ?></option>
<?php }?>

</select>

	  
	  
	  
	  
	  </td>
	

    <td valign="top"><input type="submit" class="go" name="go" value="Go" id="goala" style=" padding:1.5vw 1.2vw;background-color:#FF3300; border:none; font-size: 2vw; font-family:Verdana, Arial, Helvetica, sans-serif; color:#FFFFFF;" />
	  
	  </td>
    </form>
    </tr>
	    <tr>
      <td valign="top" >
	  
	  
      
      
	  
	  
	  
	  
	  </td>
    </tr>
  </table>
    </form>
</div>


<script>

var currentDateTime = new Date();
var year = currentDateTime.getFullYear();
var month = (currentDateTime.getMonth() + 1);
var date = (currentDateTime.getDate() + 1);



if(date < 10) {
  date = '0' + date;
}
if(month < 10) {
  month = '0' + month;
}

var dateTomorrow = year + "-" + month + "-" + date;

var checkinElem = document.querySelector("#date");


checkinElem.setAttribute("min", dateTomorrow);


</script>

</body>

</html>
