<?php


session_start();




if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //something was posted
 
    $password = $_POST['password'];

    if (!empty($password)) {
        //read to database

      
       
                if ($password==16347) {


                    $_SESSION['admin'] = $password;
                    header("Location: stafflogs.php");
                  
                }
            
         $errrr= "wrong password";
    } else {
        $errrr= "please enter some valid information";
    }
}

?>



<html>

<head>
    <title>Access logs</title>
</head>

<body>
    <style type="text/css">
        #text {
            height: 19%;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 50%;
            font-size: 3vw;
        }

        #button {
            padding: 1%;
            width: 8%;
            font-weight: 4vw;
            color: white;
            background-color: green;
            border: none;
        }
#box{height: 50vh;
display: flex;
align-items: center;
justify-content: center;}
      
    </style>
   
        <form method="POST">
            <div style="font-size: 4vw; margin: 10px;">Please enter your password to access requested page</div>
            <p style="color: red;font-size:2vw ; text-align: center;"><?php echo $errrr;?></p>
            <div id="box">
           
            <input id="text" type="password" name="password" placeholder="********"><br><br>

            <input id="button" type="submit" value="Proceed"><br><br>




        </form>


    </div>




</body>



</html>