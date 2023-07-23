<?php
include 'conn/cos.php';

if(isset($_GET['uid'])){$uid = $_GET['uid'];}

$confirmationDate = time();
$query = "update `users` set status = 1, confirmationDate = $confirmationDate where uid = '".$uid."'";
$av = $co->query($query);

$query2 = "update `transactions` set confirmed = 1 where uid = '".$uid."'";
$co->query($query2);

header("location:account-details.php?b=e&uid=$uid");

?>