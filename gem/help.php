<?php
session_start();
?>

<?php
if(date('H')<12){
    $greet="Good morning";
}elseif (date('H')==12) {

    $greet="Lunch time";
}else{$greet="Good evening";}


?>

<html><meta name="viewport" content="width=device-width, initial-scale=1"><head>



<title>Gem Stone- Your #1 plug for healthcare</title>

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

#tt table{
    max-height: 15%;
}
}

td div a{

text-decoration: none;
color: white;
font-family: Arial, Helvetica, sans-serif;
font-size: 1.6vw;
}

#tt{width: 100%;
height: 80%;
background-color: white;
background-image: url("gem.png");
background-repeat: no-repeat;
background-position-y: center;
background-position-x: right;
background-image: url("g.png");
background-size: 30% ;
}
.rr{
    text-align: center;
    font-size: 4vw;
    font-family:'Arial Narrow Bold', sans-serif;
}
.rrr{
    text-align: center;
    font-size: 2vw;
    font-family: sans-serif;
}

.po{
    font-size: 1.9vw;
    padding-left: 10vw;
    font-family: Cochin;
}
</style>


</head>





<body >


    <div id="top">
<table width="100%"  class="d" cellspacing="10%">
<TR >
<td width="70%">
<a href="say.php" title="home">
<img src="gem.png" width="33%" alt="Logo" /></a></td>
 

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
	  
	  <h1 class="rr">You are our Priority</h1>
	  
	  
	  
	  
	  
	  
	  
	  </td>
    </tr>
  </table>

  <table width="80%" height="20%" align="center">
    <tr>
      <td valign="top" >
	  
	  
	  <p class="rrr">We are always ready to offer a helping hand.</p>
	  
	  
	  
	  
	  
	  
	  </td>
    </tr>
  </table>



  <table width="80%" height="60%" align="center">
    <tr height="80%">
    <form method="POST">  
    <td valign="top">
	  
	 
	<p class="po">For Enquiries, Guidance or Complaints:</p>
    <p class="po">Call: <u>09139012693</u></p>
    <p class="po">or </p><p class="po">Email: <u>info@gemstonemed.com</u></p>
      
	  
	  
	  
	  
	  </td>
    </tr>
  </table>
</div>






</body></html>
