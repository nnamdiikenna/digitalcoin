<?php
session_start();
include '../../management/conn/cos.php';

$regConf = uri_data('4');



if($regConf !=''){
	$q = "select * from `users` where confirmationCode = '$regConf'";
	$a = $co->query($q);
	$ar = $a->fetch();
	$arr = $a->size();

	if($arr>0){

		if($ar['status']=='0'){

			$q2 = "update `users` set status = 1 where confirmationCode = '$regConf'";
			$co->query($q2);
			header("location:../auths?/success");
		}else{
			header("location:../auths?/alreadyConfirmed");
		}

	}else{
		$msg = "Enter Valid Confirmation Code";
	}

}


?>
<!DOCTYPE html>
<html lang="en">

<!-- auth/signup  08:48:56 GMT -->
<!--  --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- / -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
	<title>Digital Coin Place - Bitcoin | Binary | CFD Trading - 100x Leverage</title></title>
	<meta name="description" content="Digital Coin Place allows you to actively trade most popular cryptocurrencies such as Bitcoin, Ethereum, Ripple, Litecoin and more, profit from market rallies and declines, or hedge your existing cryptocurrency holdings.">
	<link rel="stylesheet" href="../../maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="apple-touch-icon" sizes="57x57" href="../../assets/home/assets/favicon/apple-icon-57x5721f621f6.html?rev=018374558bc9312c8d9d9cf39a563b4b">
	<link rel="apple-touch-icon" sizes="60x60" href="../../assets/home/assets/favicon/apple-icon-60x60e0aae0aa.html?rev=2436b17913edd87b02e0ca4d6beadb5c">
	<link rel="apple-touch-icon" sizes="72x72" href="../../assets/home/assets/favicon/apple-icon-72x72468f468f.html?rev=a19f8dc08da7c9b19346f23b70e32fde">
	<link rel="apple-touch-icon" sizes="76x76" href="../../assets/home/assets/favicon/apple-icon-76x76cd9acd9a.html?rev=8f997250e222a053c6b056ae9cb7b3df">
	<link rel="apple-touch-icon" sizes="114x114" href="../../assets/home/assets/favicon/apple-icon-114x1148ab98ab9.html?rev=b5a4abf2d4bbeea8f316acc36892d7a7">
	<link rel="apple-touch-icon" sizes="120x120" href="../../assets/home/assets/favicon/apple-icon-120x120eeedeeed.html?rev=8bb4ed421c20243309447d0a28a21cf7">
	<link rel="apple-touch-icon" sizes="144x144" href="../../assets/home/assets/favicon/apple-icon-144x144f5fbf5fb.html?rev=2800934bd5bf8b773322744034635ed0">
	<link rel="apple-touch-icon" sizes="152x152" href="../../assets/home/assets/favicon/apple-icon-152x152d199d199.html?rev=570cbe5be44997d7212810c6435396f4">
	<link rel="apple-touch-icon" sizes="180x180" href="../../assets/home/assets/favicon/apple-icon-180x180ea50ea50.html?rev=7880c3c7b53ecdb76f9116688c6a9a3f">
	<link rel="icon" type="image/png" sizes="192x192" href="../../assets/home/assets/favicon/android-icon-192x192c90fc90f.html?rev=b230148cd138aa0db2da49ed4aca2424">
	<link rel="icon" type="image/png" sizes="32x32" href="../../assets/home/assets/favicon/favicon-32x32beb5beb5.html?rev=efedfc83c04eab08a2e27b4b0bdb7993">
	<link rel="icon" type="image/png" sizes="96x96" href="../../assets/home/assets/favicon/favicon-96x967b407b40.html?rev=0bc6ec2dbb5a6a346062d4bc3eec4922">
	<link rel="icon" type="image/png" sizes="16x16" href="../../assets/home/assets/favicon/favicon-16x16a6f9a6f9.html?rev=5375b9cdd48f85de1a43bf3e3ae2f81c">
	<script src="../../ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../../maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
		body {
			color: #fff;
			background: #3b5175;
			font-family: 'Roboto', sans-serif;
		}
		.form-control, .form-control:focus, .input-group-addon {
			border-color: #e1e1e1;
		}
		.form-control, .btn {
			border-radius: 3px;
		}
		.signup-form {
			width: 390px;
			margin: 0 auto;
			padding: 30px 0;
		}
		.signup-form form {
			color: #999;
			border-radius: 3px;
			margin-top: 8px;
			margin-bottom: 0px;
			background: #fff;
			box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
			padding: 30px;
		}
		.signup-form h2 {
			color: #333;
			font-weight: bold;
			margin-top: 0;
		}
		.signup-form hr {
			margin: 0 -30px 20px;
		}
		.signup-form .form-group {
			margin-bottom: 20px;
		}
		.signup-form label {
			font-weight: normal;
			font-size: 13px;
		}
		.signup-form .form-control {
			min-height: 38px;
			box-shadow: none !important;
		}
		.signup-form .input-group-addon {
			max-width: 42px;
			text-align: center;
		}
		.signup-form input[type="checkbox"] {
			margin-top: 2px;
		}
		.signup-form .btn{
			font-size: 16px;
			font-weight: bold;
			background: #19aa8d;
			border: none;
			min-width: 140px;
		}
		.signup-form .btn:hover, .signup-form .btn:focus {
			background: #179b81;
			outline: none;
		}
		.signup-form a {
			color: #fff;
			text-decoration: underline;
		}
		.signup-form a:hover {
			text-decoration: none;
		}
		.signup-form form a {
			color: #19aa8d;
			text-decoration: none;
		}
		.signup-form form a:hover {
			text-decoration: underline;
		}
		.signup-form .fa {
			font-size: 21px;
		}
		.signup-form .fa-paper-plane {
			font-size: 18px;
		}
		.signup-form .fa-check {
			color: #fff;
			left: 17px;
			top: 18px;
			font-size: 7px;
			position: absolute;
		}
		.float{
			position:fixed;
			width:60px;
			height:60px;
			bottom:40px;
			right:40px;
			background-color:#25d366;
			color:#FFF;
			border-radius:50px;
			text-align:center;
			font-size:30px;
			box-shadow: 2px 2px 3px #999;
			z-index:100;
		}

		.my-float{
			margin-top:16px;
		}
	</style>
</head>
<body>
	<div class="signup-form" style="text-align: center;">
		<a href="../../index.html">
			<img src="../../../assets/landing/Content/Images/logo.png" style="margin-top: 15px" class="img-responsive center-block">
		</a>
		<br><br><br>

		<h1>CONGRATULATIONS!!!</h1>
		<H3>You are one step away from accessing your account.</H3>
		<p>The details you provided is being reviewed and verified. This process can take a few minutes or several hours. Once approved, you will be able to login to your investment account.</p><br>
		<p>Already confirmed your account, <a href="../auths">LOGIN HERE</a></p>
<!-- 		<p>Can't find the email, <a href="../home/resend-confirmation">CLICK HERE</a> and we will resend it to you.</p>
	<div class="text-center">Already have an account? <a href="../auths">Login here</a></div>-->	
	</div>
	

	<!--Start of Tawk.to Script-->
	<script type="text/javascript">
		var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
		(function(){
			var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
			s1.async=true;
			s1.src='https://embed.tawk.to/5f935921194f2c4cbeb88b9c/default';
			s1.charset='UTF-8';
			s1.setAttribute('crossorigin','*');
			s0.parentNode.insertBefore(s1,s0);
		})();
	</script>
	<!--End of Tawk.to Script-->
</body>

<!-- auth/signup  08:48:56 GMT -->
</html>