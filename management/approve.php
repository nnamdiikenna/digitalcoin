<?php
include 'conn/cos.php';

if(isset($_GET['id'])){$id = $_GET['id'];}

$dateConfirmed = time();

$query2 = "SELECT * from `payments` where id = '".$id."'";
$av2 = $co->query($query2);
$arv2 = $av2->fetch();

$query3 = "SELECT referrer from `users` where uid = '".$arv2['uid']."'";
$av3 = $co->query($query3);
$arv3 = $av3->fetch();

if($arv3['referrer'] !=''){

	// $query4 = "select uid from `users` where email = '".$arv3['referrer']."'";
	// $av4 = $co->query($query4);
	// $arv4 = $av4->fetch();

	$referralAmt = $arv2['amt'] * $arv2['referalAmt'] / 100 ;


	$refSQL = "INSERT INTO referrals set  amt='$referralAmt', referrer='".$arv3['referrer']."', referree='".$arv2['uid']."', refDate = '$dateConfirmed', paid = 0";
	$Result2 = $co->query($refSQL);
}


$query4 = "SELECT * from `transactions` where uid='".$arv2['uid']."'";
$av4 = $co->query($query4);
$arv4 = $av4->fetch();
$tnum = $av4->size();

if ($tnum==0) {

	$amtf = $arv2['amt'] + 50;
	$query = "INSERT INTO `transactions` set transID='".$arv2['transID']."', amt='".$amtf."', currentBalance='".$amtf."', datePosted='".$arv2['datePosted']."', uid='".$arv2['uid']."', notes='".$arv2['notes']."', accountType='".$arv2['id']."', duration='".$arv2['duration']."', interest='".$arv2['interest']."', referalAmt='".$arv2['referalAmt']."', confirmed = 1";
}else{

	$newamt= $arv4['amt'] + $arv2['amt'];
	$newbal = $arv4['currentBalance'] + $arv2['amt'];
	$query = "UPDATE transactions set amt = '$newamt', currentBalance = '$newbal' where uid = '".$arv2['uid']."'";
	
}
$av = $co->query($query);



$updatePayments = "UPDATE payments set confirmed = 1, dateConfirmed = '$dateConfirmed' where transID = '".$arv2['transID']."'";
$co->query($updatePayments);

header("location:transaction-history?/Success");

?>