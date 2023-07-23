<?php
include 'conn/cos.php';

if(isset($_GET['uid'])){$uid = $_GET['uid'];}
$query = "update `users` set status = 2 where uid = '".$uid."'";
$co->query($query);

$query2 = "update `transactions` set confirmed = 2 where uid = '".$uid."'";
$co->query($query2);

header("location:account-details.php?b=e&uid=$uid");

?>