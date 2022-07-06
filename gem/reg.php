<?php
session_start();
$connection=mysqli_connect('localhost','root','mysql','gem');

function random_numm($length)
{
    $text = "";    if ($length < 5) 
{
        $length = 5;    }    $len = rand(4, $length);
    for ($i = 0; $i < $len; $i++) {
        # code...

        $text .= rand(0, 9);    }    return 'HTC'. $text;
}



function random_nummm($length)
{
    $text = "";    if ($length < 5) 
{
        $length = 5;    }    $len = rand(4, $length);
    for ($i = 0; $i < $len; $i++) {
        # code...

        $text .= rand(0, 9);    }    return $text;
}



























if ($_POST['reg']!="") { //something was posted    
    //variabes to hold values

    $sname = $_POST['sname']; 
       $fname = $_POST['fname'];
       $oname = $_POST['oname'];
       $email = $_POST['email'];
       $location = $_POST['location'];
 
       $marital = $_POST['marital'];
       $gender = $_POST['gender'];
       $dob = $_POST['dob'];
       $phone = $_POST['phone'];
      
      $queryj= mysqli_query($connection,"select*from gem.doc where email='$email'");
     
$querys = "select * from gem.doc where email ="."'".$_POST['email']."'"." limit 1";
$results = mysqli_query($connection, $querys);
if ($results && mysqli_num_rows($results) > 0) {

    $userdata = mysqli_fetch_assoc($results);}
    if ($sname !=""  
    && $fname !=""  
   // && $oname !=""
     && $email !=""  
     && $location !=""  
    
      
       && $marital !="" 
       &&  $gender !="" 
       && $dob !="" 
        && $phone !=""
         ) {
        if($queryj && mysqli_num_rows($queryj) > 0){//start2c
            $msgerr="Email already in use by another user";}else{


        
        
        
        //save to database        
        $docid = random_numm(7);    
        $key = random_nummm(8);       
        $queryd = "insert into gem.doc(userid, sname, fname, oname, email, locid, bloodgroup, genotype, disabilities, marital, gender, dateofbirth, phone, password) values('$userid','$sname','$fname','$oname','$email','$location','$bloodgroup','$genotype','$disabilities','$marital','$gender','$dob','$phone','$password')";        
        $sendd=mysqli_query($connection, $queryd);
        if ($sendd == 1) { //start 4
            $msgsuc = "Registered Successfully. Below is your login <br>Your Staff ID is ".'<u>'.  $docid.'</u>'." Your Key is ".'<u>'.  $key.'</u>';
        }
        else { //else 4
            $msgerr = "registeration failed, please try again";
        }}}
    else {
        $msgerr= "please fill all fields";
    }
}














//select element values
$select=mysqli_query($connection, "SELECT * FROM gem.location");


?>
<?php
if(date('H')<12){
    $greet="Good morning Doc";
}elseif (date('H')==12) {

    $greet="Lunch time Doc";
}else{$greet="Good evening Doc";}


?>

<html><meta name="viewport" content="width=device-width, initial-scale=1"><head>



<title>Register-GemStone#Healthcare Provider</title>

<style>
   body{margin: 0;}
body .d{ color:white ;
    height:20%;
}

#top{width: 100%;
    
    background-color: black;
}
@media only screen and (max-width:999px){td div a{ font-size: 1.6vw;}
.in{width: 100%;
padding: 2.5vw;
font-size:16px;

}
.lab{
    display: inline-block;
    font-size: 16px;
}
}


@media only screen and (max-width:768px){
    .d{width:96%;}
#re{display: none;}
#er div button{padding: 10%;
border: 1px solid white;
border-radius: 5px;
font-size: 2vw;

}
.lab{
    display: none;
}
.in{width: 100%;
display: block;

}
#er div button:hover{
    border: 1px solid black;
border-radius: 5px;
background-color: white;
color: black;
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

color: mediumvioletred;
}

td div a{

text-decoration: none;
color: white;
font-family: Arial, Helvetica, sans-serif;

}


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
.labd{font-size:1.5vw;}
.lab{font-size:1.5vw;}


</style>


</head>





<body >
  
    <div id="top">
<table width="100%"  class="d" cellspacing="10%">
<TR >
<td width="70%">
<a href="say.php" title="home">
<img src="gem.png" width="40%" alt="Logo" /></a></td>
<td width="14%" id="re">
  <div align="center"><a href="health.php">Healthcare Provider</a>
    
  </div></td>

<td width="8%" id="er"><div align="center"><button> <a href="health.php">Login</a></button>
    
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
  <table width="80%"  align="center" class="ty">
    <tr>
      <td>
	  
	  <h1 class="rr">H.P Registeration form</h1>
	  
	  
	  
	  
	  
	  
	  
	  </td>
    </tr>
  </table>
</div>

  <table width="80%" height="20%" align="center">
  <tr>
    <td>
        <form method="POST">
<center><p>Please ensure the accuracy of your inputted details before submitting</p></center>
<center><p style="color: red;"><?php echo $msgerr;  ?></p></center>
<center><p style="color: green;"><?php echo $msgsuc;  ?></p></center>
<br>
<label for="sname" class="lab">Surname:</label>
<input type="text" id="sname" class="in" name="sname" placeholder="Enter your Surname">
<br>
<label for="fname" class="lab">Firstname:</label>
<input type="text" id="fname" class="in" name="fname" placeholder="Enter your Firstname">
<br>
<label for="oname" class="lab">Other names:</label>
<input type="text" id="oname" class="in" name="oname" placeholder="Enter your Other names">
<br>
<label for="email" class="lab">Email address:</label>
<input type="text" id="email" class="in" name="email" placeholder="Enter your Email address">
<br>
<label for="phone" class="lab">Phone Number:</label>
<input type="text" id="phone" class="in" name="phone" placeholder="Enter your Phone Number">
<br>
<label for="address" class="lab">Address:</label>
	  <select id="address" name="location"  class="in">
	  
  
    <option value="">Select Location</option>
    <?php while($locs=mysqli_fetch_array($select)){ ?>
<option value="<?php echo $locs["locid"]; ?>"><?php echo $locs["location"]; ?></option>
<?php }?>

</select>
<br>
<label for="blg" class="lab">Blood group:</label>
<select id="blg" class="in" name="bloodgroup" >
<option value="">Select your blood group</option>
<option value="O">O</option>
<option value="A">A</option>
<option value="AB">AB</option>
<option value="B">B</option>
</select>
<br>
<label for="gen" class="lab">Genotype:</label>
<select id="gen" class="in" name="genotype" >
<option value="">Select your genotype</option>
<option value="AA">AA</option>
<option value="AS">AS</option>
<option value="SS">SS</option>

</select>
<br>
<label for="disa" class="labd">Disabilities:</label><br>
<label for="none" class="labd">None</label>
<input id="none" name="disabilities" class="rad"  type="radio" value="none">&nbsp;&nbsp; <!--<label for="dis" class="labd">If any</label>-->
<label for="yes" class="labd">If any</label>
<input id="yes" name="disabilities" class="rad"  type="radio" value="yes">
        <!--<input type="text" id="dis" name="disabilities" placeholder="input disability(ies)" style=" padding:1.4vw; font-size:1.3vw; width:50%; border-radius:10px">-->
		<br>
		<label for="marital" class="lab">Marital status:</label>
<select id="marital" class="in" name="marital" >
<option value="Single">Single</option>
<option value="Married">Married</option>
<option value="Prefer not to say">Prefer not to say</option>


</select>
<br>
		<label for="gend" class="lab">Gender:</label>
<select id="gend" class="in" name="gender" >
<option value="">Select gender</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Others">Others</option>


</select>
<br>

<label for="dob" class="lab">Date of Birth:</label>
<input type="date" id="dob" class="in" name="dob" placeholder="Enter your Date of birth">
<br>
<label for="pass" class="lab">Password:</label>
<input type="password" id="pass" class="in" name="password" placeholder="Enter a Password">
<br>
<label for="con" class="lab">Confirm Password:</label>
<input type="password" id="con" class="in" name="confirm" placeholder="Re-enter Password">
<br>
<br>

        
	  
	 
<tr><td><div align="center">
  <input  type="submit" class="in" name="reg" value="Register" style="background-color:mediumvioletred;width: 60%;">
</div></td></tr>
</form>
  </table>







</body></html>



