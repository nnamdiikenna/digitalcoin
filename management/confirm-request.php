<?php
include 'conn/cos.php';

if(isset($_GET['id'])){$id = $_GET['id'];}

$datePaid = time();

$sel = "select * from paymentrequests where id = '".$id."'";
$psel = $co->query($sel);
$vsel = $psel->fetch();

$ubal = "select * from transactions where uid = '".$vsel['uid']."'";
$pubal = $co->query($ubal);
$vubal = $pubal->fetch();

 $nubal = $vubal['currentBalance'] - $vsel['amt'];


  $qt = "update `transactions` set currentBalance = '$nubal' where uid = '".$vsel['uid']."'"; 
$aqt = $co->query($qt);

$query = "update `paymentrequests` set status = 2, datePaid = '$datePaid' where id = '".$id."'";
$av = $co->query($query);



header("location:payment-requests?/Paid");

?>