<?php
include 'conn/cos.php';

if(isset($_GET['id'])){$id = $_GET['id'];}

$dateApproved = time();



$query = "update `paymentrequests` set status = 1, dateApproved = '$dateApproved' where id = '".$id."'";
$av = $co->query($query);



header("location:payment-requests?/Success");

?>