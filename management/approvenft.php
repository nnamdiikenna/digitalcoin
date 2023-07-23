<?php
include 'conn/cos.php';

if(isset($_GET['id'])){$id = $_GET['id'];}
$query = "UPDATE `nft` set status = 1 where id = '".$id."'";
$av = $co->query($query);

header("location:nft?/Success");

?>