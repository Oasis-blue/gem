<?php
$connection=mysqli_connect("localhost","root","mysql","gem");

$select=mysqli_query($connection, "SELECT location FROM gem.location");
while($getdata=mysqli_fetch_array($select)){$a[]="<br>".$getdata["location"];}

// Array with names


// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";

// lookup all hints from array if $q is different from ""
if ($q !== "") {
  $q = strtolower($q);
  $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name, 0, $len))) {
      if ($hint === "") {
        $hint = $name;
      } else {
        $hint .= ", $name";
      }
    }
  }
}

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "no suggestion" : $hint;
?>

<html><head><title></title></head>
<body>
<select name="loc">
    <option value="Select Specialty"></option>
    <?php while($locs=mysqli_fetch_array($selecta)){ ?>
<option value="<?php echo $locs["location"]; ?>"></option>
<?php }?>

</select>


</body>

</html>





