<?php
session_start();
$connection=mysqli_connect("localhost","root","mysql","gem");

if (isset($_SESSION['userid'])) {

$id = $_SESSION['userid'];
$query = "select * from gem.patients where userid='$id' or email='$id' limit 1";

$result = mysqli_query($connection, $query);

if ($result && mysqli_num_rows($result) > 0) 
{

    $userdata = mysqli_fetch_assoc($result);
   
}
}else{
//redirect to login    
header("Location: say.php"); }   

if($_POST['go']!=""){
if($_POST['apploc']!="" && $_POST['appspec']!=""){
$_SESSION['apploc']=$_POST['apploc'];
$_SESSION['appspec']=$_POST['appspec'];
header("Location: getdoc.php");

}else{$errrmsg="<center>select valid options</center>";}



}



$queryrr = "select * from gem.app where userid='$id'";

$resultrr = mysqli_query($connection, $queryrr);

if ($resultrr && mysqli_num_rows($resultrr) > 0) 
{$not="Reminder! you have(".mysqli_num_rows($resultrr) .") active appointment".' <button id="goal">Click to view</button>';
  
}
  


$selecta=mysqli_query($connection, "SELECT * FROM gem.spec");
$select=mysqli_query($connection, "SELECT * FROM gem.location");
?>



<?php
if(date('H')<12){
    $greet="Good morning";
}elseif (date('H')==12) {

    $greet="Lunch time";
}else{$greet="Good evening";}

$userid=$userdata['userid'];
$sname=$userdata['sname'];
$email=$userdata['email'];
$fname=$userdata['fname'];
$oname=$userdata['oname'];
$phone=$userdata['phone'];
$dob=$userdata['dateofbirth'];
$gender=$userdata['gender'];
$password=$userdata['password'];
$bg=$userdata['bloodgroup'];
$gn=$userdata['genotype'];






if($_POST["update"]!=""){
  if($_POST["sname"]!="" 
  && $_POST["fname"]!="" 
 // && $_POST["oname"]!=""   
  && $_POST["email"]!="" 
  && $_POST["dob"]!="" 
  && $_POST["phone"]!="" 
  && $_POST["gender"]!="" 
  //&& $_POST["genotype"]!="" 
 // && $_POST["bloodgroup"]!="" 
  && $_POST["password"]!=""){
      $update= mysqli_query($connection,"UPDATE gem.patients set sname="."'".$_POST["sname"]."'".", fname="."'".$_POST["fname"] ."'".", oname="."'".$_POST["oname"] ."'".", email="."'".$_POST["email"]."'".", bloodgroup="."'".$_POST["bloodgroup"]."'".", genotype="."'".$_POST["genotype"]."'".", gender="."'".$_POST["gender"]."'".", dateofbirth="."'".$_POST["dob"]."'".", phone="."'".$_POST["phone"]."'".", password="."'".$_POST["password"]."'"." where userid='$userid';");
if($update==1){
  $msg="UPDATE MADE SUCCESSFULLY".' <span class="cls">&times;</span>'."<br>";
}else{
$msg="FAILED TO UPDATE USER DETAILS".' <span class="cls">&times;</span>'."<br> ";
}    }else{
  $msg="Fill all fields and try again".' <span class="cls">&times;</span>'."<br>";
}
}



?>

<html><meta name="viewport" content="width=device-width, initial-scale=1"><head>



<title>Gem Stone- Your #1 plug for healthcare. ID-<?php  echo $userdata['userid'];  ?></title>

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
.mod{display:none;
position:fixed;
z-index: 1;
left: 0;
right: 0;
width: 100%;
height: 100%;
overflow: auto;
background-color: rgb(0, 0, 0);
background-color: rgba(0,0, 0, 0.94);
}
.close{color: #aaa;

float: right;
font-size: 5vw;
font-weight: bold;}
.close:hover,.close:focus{color: white;text-decoration:  none;cursor: pointer;}

.moda{display:none;
position:fixed;
z-index: 1;
left: 0;
right: 0;
width: 100%;
height: 100%;
overflow: auto;
background-color: rgb(0, 0, 0);
background-color: rgba(0,0, 0, 0.99);
}
.modat{background-color: wheat;}
.modat:hover {background-color: #D6EEEE;}
.closea{color: #aaa;
float: right;
font-size: 5vw;
font-weight: bold;
;}
.closea:hover,.closea:focus{color: white;text-decoration:  none;cursor: pointer;}

.upd{
  border: 2px solid green;
  background: none;
  border-radius: 10px;
  padding: 1vw;
  color:white;
}
.tttt{background: none;
}
.tttt:hover{background: none;}
.ttttt{background: none;
}
.ttttt:hover{background: none; cursor: not-allowed;}

.upd:hover{background-color: #D6EEEE; color: black; cursor: pointer;}
.cls:hover,.cls:focus{font-size: 2vw; cursor: pointer;}


.moder{display:none;
position:fixed;
z-index: 1;
left: 0;
right: 0;
width: 100%;
height: 100%;
overflow: auto;
background-color: rgb(0, 0, 0);
background-color: rgba(0,0, 0, 0.94);
}
.closeer{color: #aaa;

float: right;
font-size: 5vw;
font-weight: bold;}
.closeer:hover,.closeer:focus{color: white;text-decoration:  none;cursor: pointer;}

.modera{display:none;
position:fixed;
z-index: 1;
left: 0;
right: 0;
width: 100%;
height: 100%;
overflow: auto;
background-color: rgb(0, 0, 0);
background-color: rgba(0,0, 0, 0.94);
}
.closeera{color: #aaa;

float: right;
font-size: 5vw;
font-weight: bold;}
.closeera:hover,.closeera:focus{color: white;text-decoration:  none;cursor: pointer;}

</style>


</head>





<body >
  

<div class="moder" id="moder">
<center>
    <span class="closeer">&times;</span>
<table align="center" border="1px" style="width:100% ; height: 40%;overflow: auto; font-size: 2vw; color: white; border: 1px solid;" cellpadding="2vw">
<tr>
<th colspan="6" style="border:none ;">Active appointments</th> 

</tr>
<tr>
<th>Appointment ID</th> 
<th>Doctor</th>
<th>Date</th>
<th>Time</th>
<th>Location</th>
</tr>
<?php
while($userdatarr = mysqli_fetch_array($resultrr)){ ?>



<tr>
  
<td><?php echo $userdatarr['apid'] ;  ?></td>

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
<?php    $_SESSION['apid']= $userdatarr['apid'];   ?>
<td><a href="cancel.php?nmy=<?php echo $userdatarr['apid'] ;  ?>" onclick="return confirm('Do you really want to cancel this appointment?');">Cancel appointment</a></td>
</tr>
<?php
}

?>
</table></center>
</div>








<div class="mod" id="mod">
<center>
    <span class="close">&times;</span>
<table align="center" border="1px" style="width:100% ; height: 40%;overflow: auto; font-size: 2vw; color: white; border: 1px solid;" cellpadding="2vw">
<tr>
<th>RegID</th> 
<td ><?php echo $userid ;?></td>
</tr>
<tr>
<th>Surname</th> 
<td ><?php echo $sname ;?></td>
</tr>
<tr>
<th>Firstname</th> 
<td ><?php echo $fname ;?></td>
</tr>
<tr>
<th>Other names</th> 
<td ><?php echo $oname ;?></td>
</tr>
<tr>
<th>Email</th> 

<td> <?php echo $email ;?></td>

</tr>

<tr>
<th>Phone Number</th> 
<td ><?php echo $phone ;?></td>
</tr>

<tr>
<th>Gender</th> 
<td ><?php echo $gender ;?></td>
</tr>
<!--<th>Marital status</th>--> 
<!--<td ><?php //echo $m ;?></td>-->


<tr>
<th>Date of birth</th> 


<td ><?php echo $dob ;?></td>

</tr>
<tr>
<th>Genotype</th> 

<td ><?php echo $gn ;?></td>
</tr>
<tr>
<th>Blood group</th> 

<td ><?php echo $bg ;?></td>

</tr>
<tr>
<th>Password</th> 

<td ><?php echo $password ;?></td>


</tr>

<tr>
  <td colspan="10" align="center" style="border:none ;"><button id="goa" style=" font-size: 2vw;">Edit</button></td>
</tr>

</table>
</center>


</div>


<div class="moda" id="moda">
<center>
    <span class="closea">&times;</span>
<table align="center" border="1px" style="width:100% ; height: 40%;overflow: auto; font-size: 2vw; color: white; border: 1px solid;" cellpadding="2vw">
<form method="POST">
<tr>
<th>RegID</th> 

<td class="ttttt"><input type="text" class="ttttt" value="<?php echo $userid ;?>" name="userid" disabled style="color:white;font-family: 'Times New Roman', Times, serif ;background:none; font-size: 2vw; border: none; width: 100%" ></td>


</tr>
<tr>
<th>Surname</th> 
<td  class="modat" ><input type="text" value="<?php echo $sname ;?>" name="sname" style="color:black;font-family: 'Times New Roman', Times, serif ;background:none; font-size: 2vw; border: none; width: 100%" ></td>

</tr>
<tr>
<th>Firstname</th> 
<td  class="modat"><input type="text" value="<?php echo $fname ;?>"name="fname" style="color:black;font-family: 'Times New Roman', Times, serif ;background:none; font-size: 2vw; border: none; width: 100%" ></td>


</tr>
<tr>
<th>Other names</th> 
<td  class="modat"><input type="text" value="<?php echo $oname ;?>"name="oname" style="color:black;font-family: 'Times New Roman', Times, serif ;background:none; font-size: 2vw; border: none; width: 100%" ></td>


</tr>
<tr>
<th>Email</th> 
<td class="modat"> <input type="text" value="<?php echo $email ;?>"name="email" style="color:black;font-family: 'Times New Roman', Times, serif ;background:none; font-size: 2vw; border: none; width: 100%" ></td>

</tr>
<tr>
<th>Phone Number</th> 
<td  class="modat"><input type="text" value="<?php echo $phone ;?>"name="phone" style="color:black;font-family: 'Times New Roman', Times, serif ;background:none; font-size: 2vw; border: none; width: 100%" ></td>


</tr>
<tr>
<th>Gender</th>
<td  class="modat"><select name="gender"  style="color:black;font-family: 'Times New Roman', Times, serif ;background:none; font-size: 2vw; border: none; width: 100%">
<option value="">Select gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Others">Others</option></td>

</tr>
<tr>
<!--<th>Marital status</th>--> 
<th>Date of birth</th> 
<td  class="modat"><input type="date" value="<?php echo $dob ;?>"name="dob" style="color:black;font-family: 'Times New Roman', Times, serif ;background:none; font-size: 2vw; border: none; width: 100%" ></td>

</tr>
<tr>
<th>Genotype</th> 

<td  class="modat">
<select name="genotype" style="color:black;font-family: 'Times New Roman', Times, serif ;background:none; font-size: 2vw; border: none; width: 100%">
<option value="">Select your genotype</option>
<option value="AA">AA</option>
<option value="AS">AS</option>
<option value="SS">SS</option>

</select></td>

</tr>
<tr>
<th>Blood group</th> 
<td  class="modat"><select name="bloodgroup"  style="color:black;font-family: 'Times New Roman', Times, serif ;background:none; font-size: 2vw; border: none; width: 100%">
<option value="">Select your blood group</option>
<option value="O">O</option>
<option value="A">A</option>
<option value="AB">AB</option>
<option value="B">B</option>
</select></td>

</tr>
<tr>
<th>Password</th> 
<td  class="modat"><input type="password" value="<?php echo $password ;?>"name="password" style="color:black;font-family: 'Times New Roman', Times, serif ;background:none; font-size: 2vw; border: none; width: 100%;" ></td>

</tr>
<!--<td ><?php //echo $m ;?></td>-->

<tr>
  <td class="tttt" colspan="10" align="center" style="border:none ;"><input type="submit" name="update" class="upd" value="Save"  style="font-family: 'Times New Roman', Times, serif ; font-size: 2vw; width: 100%"></td>
</tr>
</form>
</table>
</center>


</div>








    <div id="top">
<table width="100%"  class="d" cellspacing="10%">
<TR >
<td width="70%">
<a href="sayl.php" title="home">
<img src="gem.png" width="40%" alt="Logo" /></a></td>
<td width="14%" id="re">
  <div align="center"><a href="history.php">History</a>
    
  </div></td>
  
<td width="8%" id="er"><div align="center"><button id="go">Details</button>
    
    </div>

<td width="8%" id="er"><div align="center"><a href="logout.php">Logout</a>
    
  </div>
</td>

<td width="8%" id="re"><div align="center"><a href="help.php">Help</a>
    
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
	  
	  <h1 class="rr">Welcome back, <?php echo $fname; ?>.<br>Reg ID: <?php echo $userid; ?></h1>
	  
	  
	  
	  
	  
	  
	  
	  </td>
    </tr>
  </table>

  <table width="80%" height="20%" align="center">
    <tr>
      <td valign="top" >
	  
	  
	  <p class="rrr">Book an appointment today</p>
	  
	  
	  
	  
	  
	  
	  </td>
    </tr>
  </table>


  <form method="POST">
<center><p><?php  echo $errrmsg; ?></p></center>
  <table width="80%" height="60%" align="center">
    <tr height="80%">
    <form method="POST">  
    <td valign="top">
	  

	  
	  <select name="apploc"  class="in" > 
	  
  
    <option value="">Select Location</option>
    <?php while($locs=mysqli_fetch_array($select)){ ?>
<option value="<?php echo $locs["locid"]; ?>"><?php echo $locs["location"]; ?></option>
<?php }?>

</select>

	  
	  
	  
	  
	  </td>
	  <td valign="top">
	  
	  
    <select name="appspec"  class="in" >
	  
  
    <option value="">Select Specialty</option>
    <?php while($specs=mysqli_fetch_array($selecta)){ ?>
<option value="<?php echo $specs["specid"]; ?>"><?php echo $specs["specialty"]; ?></option>
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
var mod=document.getElementById("mod");

var btn=document.getElementById("go");

var span=document.getElementsByClassName("close")[0];

btn.onclick=function(){mod.style.display="block";}
span.onclick=function(){mod.style.display="none";}
window.onclick=function(event){if(event.target ==modal){mod.style.display="none";}}


</script>
<script>
var moda=document.getElementById("moda");

var btna=document.getElementById("goa");

var spana=document.getElementsByClassName("closea")[0];

btna.onclick=function(){moda.style.display="block";}
spana.onclick=function(){moda.style.display="none";}
window.onclick=function(event){if(event.target ==modal){moda.style.display="none";}}


</script>

<script>
var mmm=document.getElementById("mmm");



var cls=document.getElementsByClassName("cls")[0];


cls.onclick=function(){mmm.style.display="none";}
window.onclick=function(event){if(event.target ==modal){mmm.style.display="none";}}


</script>


<script>
var moder=document.getElementById("moder");

var btner=document.getElementById("goal");

var spaner=document.getElementsByClassName("closeer")[0];

btner.onclick=function(){moder.style.display="block";}
spaner.onclick=function(){moder.style.display="none";}
window.onclick=function(event){if(event.target ==modal){moder.style.display="none";}}


</script>


</body></html>
