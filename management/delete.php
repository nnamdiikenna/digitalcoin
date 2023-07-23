<?php
include 'conn/cos.php';

if(isset($_GET['uid'])){$uid = $_GET['uid'];}
$query = "delete from `users` where uid = '".$uid."'";
$av = $co->query($query);

header("location:dashboard.php");

?>