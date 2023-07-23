<?php session_start();

include "../../management/conn/cos.php";

$id = uri_data('4');


if(!isset($_POST['regst'])){
	$q = "select * from `users` where uid = '$id'";
	$a = $co->query($q);
	$ar = $a->fetch();
	$arr = $a->size();

	if($arr>0){
		$referrer = $ar['email'];
	}else{
		$referrer ='';
	}

}



if(isset($_POST['regst'])){


	$fname = addslashes(trim($_POST['fname']));
	$lname = addslashes(trim($_POST['lname']));
	$email = addslashes(trim($_POST['email']));
	$phone = addslashes(trim($_POST['phone']));
	$pass = addslashes(trim($_POST['password']));
	$cpass = addslashes(trim($_POST['cPassword']));
	$regNum = addslashes(trim($_POST['regNum']));
	$country = addslashes(trim($_POST['country']));
	$zip = addslashes(trim($_POST['zip']));
	$accountType = addslashes(trim($_POST['accountType']));
	$referrer = addslashes(trim($_POST['referrer']));
	$btc = addslashes(trim($_POST['btc']));

	$uidx = md5(date(his). rand(23444,99994));

	$uid = substr($uidx, 10, 10);
	$regDate = time();


	$msg = '';

  #..................CHECK EMPTY IMPORTANT FIELDS
	if($fname ==''or$lname ==''or$email ==''or$pass ==''){
		$msg .="All asterisked fields must be filled.";
	}

  #.................CONFIRM PASSWORD...................#
	if($pass != $cpass){
		$msg .= " - Passwords do not match.";
	}

	#.................CHECK IF EMAIL HAS BEEN USED.
	$qemail = "select * from `users` where email = '$email'";
	$emcheck = $co->query($qemail);
	$eav = $emcheck->size();
	if($eav>0){
		$msg .= " - Email has been used.";
	}

	#.................CHECK IF PHONE HAS BEEN USED.
	$qephone = "select * from `users` where phone = '$phone'";
	$pcheck = $co->query($qephone);
	$pav = $pcheck->size(); 
	if($pav>0){
		$msg .= " - Phone Number has been used.";
	}

	$confirmationCode = md5(date(his). rand(23444,99994));

	if($msg ==''){
		$insertSQL = "INSERT INTO users set uid = '$uid', fname='$fname', lname='$lname', email='$email', phone='$phone', zipcode='$zip', passme='$pass', country='$country',accountType='$accountType',  referrer='$referrer',regDate='$regDate',status='0',confirmationCode='$confirmationCode',btc='$btc'";

		$result = $co->query($insertSQL);



		$to = $email;
		$from = 'Digital Coin Place <accounts@netradefx.com>';
		$subject = 'Registration Confirmation';
		$message = 'Congratulations, your account has been created.<br />
		<p>One final step.</p>
		<p style="color:blue">Please click on the following link or copy and paste it on your browser to confirm your email: </p><a href="netradefx.com/confirmation?/'.$confirmationCode.'"> netradefx.com/confirmation?/'.$confirmationCode.
		'</a>

		<p style="color:blue; font-size:10px; margin-top:30px; padding-top:30px; border-top:1px solid blue;">
		-----------------------------------------Disclaimer--------------------------------------------------------------------<br />

		This e-mail is intended solely for the person or organisation to which it is addressed. It may contain privileged and confidential information. If you are not the intended recipient, you are prohibited from copying, disclosing or distributing this e-mail or its contents (as it may be unlawful for you to do so) or taking any action in reliance on it.

		If you have received this e-mail in error, please delete it then advise the sender immediately by sending an e-mail to info@netradefx.com.

		</p>
		';

		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "Content-Transfer-Encoding: 7bit\r\n";
		$headers .= "From: " . $from . "\r\n";


		//$err = mail($to, $subject, $message, $headers);

		if ($_SESSION['settings-requestID']==1) {
			header("location:../../en/auth/id?/$uid");
		}else{
			header("location:../../en/auth/confirmation");
		}
	}

}
?>
<!DOCTYPE html>
<html lang="en">

<!-- home/register  08:48:06 GMT -->
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
			background: url('../../assets/landing/Content/Images/homePage/HeroImage_01_globalxx.jpg')  right;
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
	<div class="signup-form">
		<a href="../../index.html">
			<img src="../../../assets/landing/Content/Images/logo.png" style="margin-top: 15px" class="img-responsive center-block">
		</a><br>
		<form action="" method="post">
			<input type="hidden" name="ci_csrf_token" value="" />
			<h2 class="text-center">Sign Up</h2>
			<p>Please fill in this form to create an account!</p>
			<b style="width: 100%; text-align: center; color: red;display: block;"><?php if(isset($msg)) echo $msg ?></b>
			<hr>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" class="form-control" name="fname" placeholder="Firstname" value="<?php if(isset($fname)) echo $fname; ?>" required="required">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"></i></span>
					<input type="text" class="form-control" name="lname" placeholder="Lastname" value="<?php if(isset($lname)) echo $lname; ?>" required="required">
				</div>
			</div>

			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
					<input type="email" class="form-control" name="email" placeholder="Email Address" value="<?php if(isset($email)) echo $email; ?>" required="required">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-phone"></i></span>
					<input type="text" class="form-control" name="phone" placeholder="Phone Number" value="<?php if(isset($phone)) echo $phone; ?>" required="required">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-lock"></i></span>
					<input type="password" class="form-control" name="password" placeholder="Password" required="required">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-lock"></i></span>
					<input type="password" class="form-control" name="cPassword" placeholder="Confirm Password" required="required">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-map-pin"></i></span>
					<input type="text" class="form-control" name="zip" placeholder="Zip Code [Optional]" value="<?php if(isset($zip)) echo $zip; ?>">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-cubes"></i></span>
					<input placeholder="Referral Code" type="text" class="form-control" name="referrer" value="<?php if(isset($referrer)){ echo $referrer;}else{echo '';} ?>">
				</div>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-map"></i></span>
					<select name="country" required class="form-control input-border" />
					<option value="">Select Country *</option>
					<option value="United States">United States</option>
					<option value="United Kingdom">United Kingdom</option>
					<option value="Afghanistan">Afghanistan</option>
					<option value="Albania">Albania</option>
					<option value="Algeria">Algeria</option>
					<option value="American Samoa">American Samoa</option>
					<option value="Andorra">Andorra</option>
					<option value="Angola">Angola</option>
					<option value="Anguilla">Anguilla</option>
					<option value="Antarctica">Antarctica</option>
					<option value="Antigua and Barbuda">Antigua and Barbuda</option>
					<option value="Argentina">Argentina</option>
					<option value="Armenia">Armenia</option>
					<option value="Aruba">Aruba</option>
					<option value="Australia">Australia</option>
					<option value="Austria">Austria</option>
					<option value="Azerbaijan">Azerbaijan</option>
					<option value="Bahamas">Bahamas</option>
					<option value="Bahrain">Bahrain</option>
					<option value="Bangladesh">Bangladesh</option>
					<option value="Barbados">Barbados</option>
					<option value="Belarus">Belarus</option>
					<option value="Belgium">Belgium</option>
					<option value="Belize">Belize</option>
					<option value="Benin">Benin</option>
					<option value="Bermuda">Bermuda</option>
					<option value="Bhutan">Bhutan</option>
					<option value="Bolivia">Bolivia</option>
					<option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
					<option value="Botswana">Botswana</option>
					<option value="Bouvet Island">Bouvet Island</option>
					<option value="Brazil">Brazil</option>
					<option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
					<option value="Brunei Darussalam">Brunei Darussalam</option>
					<option value="Bulgaria">Bulgaria</option>
					<option value="Burkina Faso">Burkina Faso</option>
					<option value="Burundi">Burundi</option>
					<option value="Cambodia">Cambodia</option>
					<option value="Cameroon">Cameroon</option>
					<option value="Canada">Canada</option>
					<option value="Cape Verde">Cape Verde</option>
					<option value="Cayman Islands">Cayman Islands</option>
					<option value="Central African Republic">Central African Republic</option>
					<option value="Chad">Chad</option>
					<option value="Chile">Chile</option>
					<option value="China">China</option>
					<option value="Christmas Island">Christmas Island</option>
					<option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
					<option value="Colombia">Colombia</option>
					<option value="Comoros">Comoros</option>
					<option value="Congo">Congo</option>
					<option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
					<option value="Cook Islands">Cook Islands</option>
					<option value="Costa Rica">Costa Rica</option>
					<option value="Cote D'ivoire">Cote D'ivoire</option>
					<option value="Croatia">Croatia</option>
					<option value="Cuba">Cuba</option>
					<option value="Cyprus">Cyprus</option>
					<option value="Czech Republic">Czech Republic</option>
					<option value="Denmark">Denmark</option>
					<option value="Djibouti">Djibouti</option>
					<option value="Dominica">Dominica</option>
					<option value="Dominican Republic">Dominican Republic</option>
					<option value="Ecuador">Ecuador</option>
					<option value="Egypt">Egypt</option>
					<option value="El Salvador">El Salvador</option>
					<option value="Equatorial Guinea">Equatorial Guinea</option>
					<option value="Eritrea">Eritrea</option>
					<option value="Estonia">Estonia</option>
					<option value="Ethiopia">Ethiopia</option>
					<option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
					<option value="Faroe Islands">Faroe Islands</option>
					<option value="Fiji">Fiji</option>
					<option value="Finland">Finland</option>
					<option value="France">France</option>
					<option value="French Guiana">French Guiana</option>
					<option value="French Polynesia">French Polynesia</option>
					<option value="French Southern Territories">French Southern Territories</option>
					<option value="Gabon">Gabon</option>
					<option value="Gambia">Gambia</option>
					<option value="Georgia">Georgia</option>
					<option value="Germany">Germany</option>
					<option value="Ghana">Ghana</option>
					<option value="Gibraltar">Gibraltar</option>
					<option value="Greece">Greece</option>
					<option value="Greenland">Greenland</option>
					<option value="Grenada">Grenada</option>
					<option value="Guadeloupe">Guadeloupe</option>
					<option value="Guam">Guam</option>
					<option value="Guatemala">Guatemala</option>
					<option value="Guinea">Guinea</option>
					<option value="Guinea-bissau">Guinea-bissau</option>
					<option value="Guyana">Guyana</option>
					<option value="Haiti">Haiti</option>
					<option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
					<option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
					<option value="Honduras">Honduras</option>
					<option value="Hong Kong">Hong Kong</option>
					<option value="Hungary">Hungary</option>
					<option value="Iceland">Iceland</option>
					<option value="India">India</option>
					<option value="Indonesia">Indonesia</option>
					<option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
					<option value="Iraq">Iraq</option>
					<option value="Ireland">Ireland</option>
					<option value="Israel">Israel</option>
					<option value="Italy">Italy</option>
					<option value="Jamaica">Jamaica</option>
					<option value="Japan">Japan</option>
					<option value="Jordan">Jordan</option>
					<option value="Kazakhstan">Kazakhstan</option>
					<option value="Kenya">Kenya</option>
					<option value="Kiribati">Kiribati</option>
					<option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
					<option value="Korea, Republic of">Korea, Republic of</option>
					<option value="Kuwait">Kuwait</option>
					<option value="Kyrgyzstan">Kyrgyzstan</option>
					<option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
					<option value="Latvia">Latvia</option>
					<option value="Lebanon">Lebanon</option>
					<option value="Lesotho">Lesotho</option>
					<option value="Liberia">Liberia</option>
					<option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
					<option value="Liechtenstein">Liechtenstein</option>
					<option value="Lithuania">Lithuania</option>
					<option value="Luxembourg">Luxembourg</option>
					<option value="Macao">Macao</option>
					<option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
					<option value="Madagascar">Madagascar</option>
					<option value="Malawi">Malawi</option>
					<option value="Malaysia">Malaysia</option>
					<option value="Maldives">Maldives</option>
					<option value="Mali">Mali</option>
					<option value="Malta">Malta</option>
					<option value="Marshall Islands">Marshall Islands</option>
					<option value="Martinique">Martinique</option>
					<option value="Mauritania">Mauritania</option>
					<option value="Mauritius">Mauritius</option>
					<option value="Mayotte">Mayotte</option>
					<option value="Mexico">Mexico</option>
					<option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
					<option value="Moldova, Republic of">Moldova, Republic of</option>
					<option value="Monaco">Monaco</option>
					<option value="Mongolia">Mongolia</option>
					<option value="Montserrat">Montserrat</option>
					<option value="Morocco">Morocco</option>
					<option value="Mozambique">Mozambique</option>
					<option value="Myanmar">Myanmar</option>
					<option value="Namibia">Namibia</option>
					<option value="Nauru">Nauru</option>
					<option value="Nepal">Nepal</option>
					<option value="Netherlands">Netherlands</option>
					<option value="Netherlands Antilles">Netherlands Antilles</option>
					<option value="New Caledonia">New Caledonia</option>
					<option value="New Zealand">New Zealand</option>
					<option value="Nicaragua">Nicaragua</option>
					<option value="Niger">Niger</option>
					<option value="Nigeria">Nigeria</option>
					<option value="Niue">Niue</option>
					<option value="Norfolk Island">Norfolk Island</option>
					<option value="Northern Mariana Islands">Northern Mariana Islands</option>
					<option value="Norway">Norway</option>
					<option value="Oman">Oman</option>
					<option value="Pakistan">Pakistan</option>
					<option value="Palau">Palau</option>
					<option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
					<option value="Panama">Panama</option>
					<option value="Papua New Guinea">Papua New Guinea</option>
					<option value="Paraguay">Paraguay</option>
					<option value="Peru">Peru</option>
					<option value="Philippines">Philippines</option>
					<option value="Pitcairn">Pitcairn</option>
					<option value="Poland">Poland</option>
					<option value="Portugal">Portugal</option>
					<option value="Puerto Rico">Puerto Rico</option>
					<option value="Qatar">Qatar</option>
					<option value="Reunion">Reunion</option>
					<option value="Romania">Romania</option>
					<option value="Russian Federation">Russian Federation</option>
					<option value="Rwanda">Rwanda</option>
					<option value="Saint Helena">Saint Helena</option>
					<option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
					<option value="Saint Lucia">Saint Lucia</option>
					<option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
					<option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
					<option value="Samoa">Samoa</option>
					<option value="San Marino">San Marino</option>
					<option value="Sao Tome and Principe">Sao Tome and Principe</option>
					<option value="Saudi Arabia">Saudi Arabia</option>
					<option value="Senegal">Senegal</option>
					<option value="Serbia and Montenegro">Serbia and Montenegro</option>
					<option value="Seychelles">Seychelles</option>
					<option value="Sierra Leone">Sierra Leone</option>
					<option value="Singapore">Singapore</option>
					<option value="Slovakia">Slovakia</option>
					<option value="Slovenia">Slovenia</option>
					<option value="Solomon Islands">Solomon Islands</option>
					<option value="Somalia">Somalia</option>
					<option value="South Africa">South Africa</option>
					<option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
					<option value="Spain">Spain</option>
					<option value="Sri Lanka">Sri Lanka</option>
					<option value="Sudan">Sudan</option>
					<option value="Suriname">Suriname</option>
					<option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
					<option value="Swaziland">Swaziland</option>
					<option value="Sweden">Sweden</option>
					<option value="Switzerland">Switzerland</option>
					<option value="Syrian Arab Republic">Syrian Arab Republic</option>
					<option value="Taiwan, Province of China">Taiwan, Province of China</option>
					<option value="Tajikistan">Tajikistan</option>
					<option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
					<option value="Thailand">Thailand</option>
					<option value="Timor-leste">Timor-leste</option>
					<option value="Togo">Togo</option>
					<option value="Tokelau">Tokelau</option>
					<option value="Tonga">Tonga</option>
					<option value="Trinidad and Tobago">Trinidad and Tobago</option>
					<option value="Tunisia">Tunisia</option>
					<option value="Turkey">Turkey</option>
					<option value="Turkmenistan">Turkmenistan</option>
					<option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
					<option value="Tuvalu">Tuvalu</option>
					<option value="Uganda">Uganda</option>
					<option value="Ukraine">Ukraine</option>
					<option value="United Arab Emirates">United Arab Emirates</option>
					<option value="United Kingdom">United Kingdom</option>
					<option value="United States">United States</option>
					<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
					<option value="Uruguay">Uruguay</option>
					<option value="Uzbekistan">Uzbekistan</option>
					<option value="Vanuatu">Vanuatu</option>
					<option value="Venezuela">Venezuela</option>
					<option value="Viet Nam">Viet Nam</option>
					<option value="Virgin Islands, British">Virgin Islands, British</option>
					<option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
					<option value="Wallis and Futuna">Wallis and Futuna</option>
					<option value="Western Sahara">Western Sahara</option>
					<option value="Yemen">Yemen</option>
					<option value="Zambia">Zambia</option>
					<option value="Zimbabwe">Zimbabwe</option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<div class="input-group">
				<span class="input-group-addon"><i class="fa fa-compress"></i></span>
				<select name="accountType" required class="form-control input-border" />
				<option value="" selected>Account Type *</option>
				<?php 
				$query2 = "select * from `accounttype`";
				$av2 = $co->query($query2);
				$arv = $av2->fetch();
				do{ 
					?>

					<option value="<?php echo $arv['id'] ?>"><?php echo ucwords($arv['name'])." - $".number_format($arv['minAmt'])." (Minimum)" ?></option>
				<?php }while($arv = $av2->fetch()); ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-cubes"></i></span>
			<input placeholder="Bitcoin Address" type="text" class="form-control" name="btc" value="<?php if(isset($btc)){ echo $btc;}else{echo '';} ?>">
		</div>
	</div>
	<!-- <div class="form-group">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-dollar"></i></span>
			<select name="currency" required class="form-control input-border" />
			<option value="">Account Currency *</option>
			<option value="$">$ USD</option>
			<option value="&euro;">&euro; EUR</option>
			<option value="&pound;">&pound; GBP</option>
			<option value="&#3647;">&#3647; Bitcoin</option>
		</select>
	</div>
</div> -->
<div class="form-group">
	<label class="checkbox-inline"><input type="checkbox" name="tos" checked required="required"> I have read and accept the <a href="terms.html">Terms of Use</a> &amp; <a target="_blank" href="instructions.php">Instructions</a></label>
</div>
<div class="form-group">
	<input type="hidden" name="regst" value="1">
	<button type="submit" class="btn btn-primary btn-lg">Sign Up</button>
</div>
</form>
<div class="text-center">Already have an account? <a href="../auths">Login here</a></div>
</div>
<!-- <a href="https://api.whatsapp.com/send?phone=447436857027" class="float" target="_blank">
	<i class="fa fa-whatsapp my-float"></i>
</a> -->

<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
	var _smartsupp = _smartsupp || {};
	_smartsupp.key = '3e7ae186de920eec60f4b9e1c78fa72905b9c6a3';
	window.smartsupp||(function(d) {
		var s,c,o=smartsupp=function(){ o..push(arguments)};o.=[];
		s=d.getElementsByTagName('script')[0];c=d.createElement('script');
		c.type='text/javascript';c.charset='utf-8';c.async=true;
		c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
	})(document);
</script>
</body>

<!-- home/register  08:48:28 GMT -->
</html>