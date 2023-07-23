<?php

include 'conn/cos.php';

$q = "SELECT * from `transactions` where confirmed = 1";
$a = $co->query($q);
$ar = $a->fetch();
$arr = $a->size();

if($arr>0){

	do{

		$amt = $ar['amt'] * $ar['interest'] / 100;

		$newbal = $ar['currentBalance'] + $amt;

		if($ar['status'] = 1){

			$qu = "UPDATE transactions set currentBalance = '$newbal' WHERE id = '".$ar['id']."' ";
			$co->query($qu);

		}

	}while($ar = $a->fetch());
}



?>