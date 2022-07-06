<?php

session_start();
if (isset($_SESSION['docid'])) 
{
    unset($_SESSION['docid']);
    session_destroy();
}

header("Location:health.php");
die;