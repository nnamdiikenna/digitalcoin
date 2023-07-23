<?php

//error_reporting(0);
//date_default_timezone_set('Europe/Madrid');
include 'dbc.php';

$co = new MySQL('localhost','root','pstikenna','crypto');
// $co = new MySQL('localhost1','digibzyv_digitalcoin ','g=#kUrLb3NQp','digibzyv_digitalcoin');


function uri_data($n){

	$uri = $_SERVER['REQUEST_URI'];
	$urid = explode('/',$uri);
	if(isset($urid[$n]))return $urid[$n];
}

//////...........SETTINGS............./////////////

 
	$qsetn = "select * from `settings`";
	$pqsetn = $co->query($qsetn);
	$settings = $pqsetn->fetch();

	$_SESSION['settings'] = 1;
	$_SESSION['settings-requestID'] = $settings['requestID'];


 
?>