<?php
session_start();
$connection = mysqli_connect("localhost", "root", "mysql", "gem");
$userid=$_POST["id"];
$password=$_POST["password"];

$query="select*from gem.patients where userid='$userid' and password='$password' or email='$userid' and password='$password'";
$result=mysqli_query($connection,$query);
if ($_POST["login"] != "") {
    if($_POST["id"]!="" && $_POST["password"]!=""){
        if($result && mysqli_num_rows($result) > 0){
            $userdata = mysqli_fetch_assoc($result);
            $userid=$userdata['userid'];
            $_SESSION['userid'] = $userid;
header("Location:sayl.php");
}else{$err="incorrect Reg ID, email or password";
}
}else{
       $err= "fill all fields";}
}
   

//login
if ($_POST["log"] != "") {
  if($_POST["staffid"]!="" && $_POST["key"]!=""){
      $docid=$_POST["staffid"];
$keyd=$_POST["key"];
//
//$querye="select*from gem.patients where userid='$userid' email='$userid' ";
//$resulte=mysqli_query($connection,$querye);
//
//if($resulte && mysqli_num_rows($resulte) == 0){

  $queryb="select*from gem.doc where id='$docid' and keyy='$keyd' or email='$docid' and keyy='$keyd'";
$resultb=mysqli_query($connection,$queryb);
      if($resultb && mysqli_num_rows($resultb) > 0){
          $userdataa = mysqli_fetch_assoc($resultb);
          $docid=$userdataa['id'];
          $_SESSION['docid'] = $docid;
header("Location:doc.php");
}else{$errr="Incorrect Staff ID, email or Key";
}
//
//}else{$err="account does not exist";}

}else{
     $errr= "fill all fields";}
}
?>


<html><meta name="viewport" content="width=device-width, initial-scale=1"><head>



<title>Healthcare Providers section</title>

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

#tt table{
    max-height: 15%;
}

}
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

text-decoration: none;
color: white;
font-family: Arial, Helvetica, sans-serif;

}

#tt{width: 100%;
height: 60%;
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
background-color: rgba(0,0, 0, 0.4);
}
.close{color: #aaa;
float: right;
font-size: 5vw;
font-weight: bold;}
.close:hover,.close:focus{color: white;text-decoration:  none;cursor: pointer;}


.but{padding:1.3vw 1.6vw;
}

</style>


</head>





<body >
  
<div class="mod" id="mod">
<center>
    <span class="close">&times;</span>
<div style="color:#FFFFFF; width:40%">
<p style="color:black"><?php echo $msg ?></p>
<div align="left">
    <form method="post" autocomplete="off">
        <br /><br />
        <center>
        <p style="color:#FF6600"><?php echo $err; ?></p>
        
</center>
        <label for="email"><b style="font-size:18px; font-family:Arial, Helvetica, sans-serif">Email address or Reg ID:</b></label>
        <br />
        <input type="text" id="email" name="id" placeholder="Enter your email address or Reg ID" style="width:100%; padding:14px" value="<?php echo $_GET["sn"]; ?>" />
        <br /><br />
        
        <label for="password"><b style="font-size:18px; font-family:Arial, Helvetica, sans-serif">Password:</b></label><input type="password" id="password" placeholder="Password" name="password" style="padding: 14px; border:none;border-bottom: solid green;  width:100%;">
        <br><br>
       
     <center>
        <input type="submit" name="login" value="Login" style="padding:10px; background-color:#FF3300; border:none; font-family:Verdana, Arial, Helvetica, sans-serif; color:#FFFFFF;" />&nbsp;&nbsp;&nbsp;or&nbsp;&nbsp;<a href="createacc.php" style="color: white">Create an account</a></center>

        <br /><br />
    </form>
</div>
</div>
</center>


</div>

    <div id="top">
<table width="100%"  class="d" cellspacing="10%">
<TR >
<td width="70%">
<a href="say.php" title="home">
<img src="gem.png" width="40%" alt="Logo" /></a></td>
<td width="14%" id="er">
  <div align="center"><a href="say.php">Go back</a>
    
  </div></td>

<td width="8%" id="re"><div align="center"><button id="go">Login/Signup</button>
    
  </div>
</td>

<td width="8%" id="re"><div align="center"><a href="help.php">Help</a>
    
  </div>
</td>
</TR>
</table>
    </div>
<br>






<div id="tt">
  <table width="80%" height="30%" align="center" class="ty">
    <tr>
      <td>
	  
	  <h1 class="rr">Welcome Doc,</h1>
	  
	  
	  
	  
	  
	  
	  
	  </td>
    </tr>
  </table>

  <table width="80%" height="20%" align="center">
    <tr>
      <td valign="top" >
	  
	  
	  <p class="rrr">Enter your Staff ID and key to log in</p>
	  
	  
	  
	  
	  
	  
	  </td>
    </tr>
  </table>


  <form method="POST">  
  <table width="80%" height="36%" align="center" cellspacing="10vw">
    <tr height="80%">
    <center>
        <p style="color:#FF6600"><?php echo $errr; ?></p>
        
</center>
    <td valign="bottom" width="50%">
	  
	  
	  <input type="text" name="staffid" placeholder="Enter Staff ID or Email address" class="in">	  </td>
	  <td rowspan="3" valign="middle">
	  
	  
	  <p style="font-size: 3vw; text-align:center">&nbsp;&nbsp;&nbsp;or&nbsp;&nbsp;&nbsp;<a href="reg.php">Register</a></p>	  </td>
    
    </tr>
    <tr height="20%">
      <td height="8" valign="top"> 
       <input type="password" name="key" placeholder="Enter your key" class="in"> 
      </div></td>
    </tr>
    <tr height="20%">
      <td height="8" valign="top" align="right"><input type="submit" class="but" name="log" value="Login" style=" background-color:#FF3300; border:none; font-family:Verdana, Arial, Helvetica, sans-serif; color:#FFFFFF;" />	</td>
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
</body></html>
