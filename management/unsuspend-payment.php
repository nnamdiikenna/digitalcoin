<?php
include 'conn/cos.php';

if(isset($_GET['id'])){$id = $_GET['id'];}
$query = "update `transactions` set confirmed = 1 where id = '".$id."'";
$av = $co->query($query);

header("location:transaction-history?/Success");

?>