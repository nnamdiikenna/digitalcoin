<?php
session_start();
include 'conn/cos.php';

$username =$_SESSION['username'];

//$date =date('l, jS M, Y - h:ia');
//$timeDate = time();

//$ip = getenv("REMOTE_ADDR");

//$qa = "insert into logz set time_date = '$timeDate', user = '$username' , activity = 'Logout', ip = '$ip' ";
//$aa = $co->query($qa);


session_destroy();
header("location:../");


?>