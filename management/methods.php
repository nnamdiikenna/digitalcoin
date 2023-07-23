	<?php
	include 'conn/cos.php';
	session_start();



#.................UPDATE PROFILE...................................................................
#
	if(isset($_POST['updateProfile'])){

		$fname=  addslashes(trim($_POST['fname'])) ;
		$lname=  addslashes(trim($_POST['lname'])) ;
		$phone=  addslashes(trim($_POST['phone'])) ;
		$zipcode=  addslashes(trim($_POST['zipcode'])) ;
		$country=  addslashes(trim($_POST['country'])) ;
		$btc=  addslashes(trim($_POST['btc'])) ;



		$updateSQL = "UPDATE users set fname='$fname', lname='$lname', phone='$phone', zipcode='$zipcode',country='$country', btc='$btc' where uid='".$_SESSION['user']."'";


		$co->query($updateSQL);

		header("location:../accounts/profile?/Update-Successful");

		exit;

	}



	//.........................PAYMENT UPLOAD........................../////

	if(!empty($_REQUEST['transUpl'])){

		$amt= addslashes(trim($_POST['amt'])) ;
		$transDate=  addslashes(trim($_POST['transDate'])) ;
		$notes=  addslashes(trim($_POST['notes'])) ;

		$uid = $_SESSION['user'];

		$transID = md5(date('his'). rand(23444,99994));
		//$datePosted = time();


		$query = "select * from `users` where uid = '".$uid."'";
		$av = $co->query($query);
		$arv = $av->fetch();


		$query2 = "select * from `accounttype` where id = '".$arv['accountType']."'";
		$av2 = $co->query($query2);
		$arv2 = $av2->fetch();

		// if($arv2['minAmt'] > $amt){

		// 	header("location:../accounts/fund-wallet?/Amount-low");
		// 	exit;
		// } 
		
		$insertSQL = "INSERT INTO payments set transID='$transID', amt='$amt', datePosted='$transDate', uid='$uid', notes='$notes', accountType='".$arv2['id']."', duration='".$arv2['duration']."', interest='".$arv2['interest']."', referalAmt='".$arv2['referalAmt']."', confirmed=0, transtype = 'debit' ";
		

		$Result1 = $co->query($insertSQL);
		header("location:../accounts/fund-wallet?/Successful");

		exit;
	}



	if(isset($_REQUEST['acctedit'])){

		$fname=  addslashes(trim($_POST['fname'])) ;
		$lname=  addslashes(trim($_POST['lname'])) ;
		$email=  addslashes(trim($_POST['email'])) ;
		$passme=  addslashes(trim($_POST['passme'])) ;
		$phone=  addslashes(trim($_POST['phone'])) ;
		$zipcode=  addslashes(trim($_POST['zipcode'])) ;
		$country=  addslashes(trim($_POST['country'])) ;
		$accountType=  addslashes(trim($_POST['accountType'])) ;
		$regDate=  addslashes(trim($_POST['regDate'])) ;
		$confirmationDate=  addslashes(trim($_POST['confirmationDate'])) ;
		$lastLogin=  addslashes(trim($_POST['lastLogin'])) ;
		$btc=  addslashes(trim($_POST['btc'])) ;
		$uid=  addslashes(trim($_POST['uid'])) ;

		$insertSQL = "UPDATE users set fname='$fname', lname='$lname', email='$email', passme='$passme',phone='$phone', zipcode='$zipcode',country='$country', accountType='$accountType',regDate='$regDate', confirmationDate='$confirmationDate',lastLogin='$lastLogin',btc='$btc' where uid='$uid'";


		$Result1 = $co->query($insertSQL);

		if($Result1){

			header("location:account-details.php?b=e&uid=$uid");
		}else{

			header("location:edit.php?uid=$uid");
		}
		


	}

	if(isset($_REQUEST['cashout'])){

		$amt=  addslashes(trim($_POST['amt'])) ;
		$notes=  addslashes(trim($_POST['notes'])) ;

		if($amt < 100){

			header("location:../accounts/cash-out?/Amount-low");
			exit;
		} 

		$uid = $_SESSION['user'];

		$transID = md5(date('his'). rand(23444,99994));
		$requestDate = time();


		$query = "select * from `users` where uid = '".$uid."'";
		$av = $co->query($query);
		$arv = $av->fetch();


		$query2 = "select * from `accounttype` where id = '".$arv['accountType']."'";
		$av2 = $co->query($query2);
		$arv2 = $av2->fetch();


		$insertSQL = "INSERT INTO paymentrequests set transID='$transID', amt='$amt', requestDate='$requestDate', uid='$uid', notes='$notes', accountType='".$arv2['id']."', status='0' ";
		$Result1 = $co->query($insertSQL);

		header("location:../accounts/cash-out?/Successful");

		exit;
	}

	
	if(isset($_POST['tplans'])){

		$plan=  addslashes(trim($_POST['plan'])) ;
   
		$updateSQL = "UPDATE users set accountType='$plan' where uid='".$_SESSION['user']."'";
   
   
		$co->query($updateSQL);
   
		header("location:../accounts/package?/Successful");
   
		exit;
   
	}
?>