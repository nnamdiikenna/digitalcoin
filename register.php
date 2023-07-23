<?php session_start();

include "management/conn/cos.php";

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
	// $regNum = addslashes(trim($_POST['regNum']));
	$country = addslashes(trim($_POST['country']));
	$zip = addslashes(trim($_POST['zip']));
	$accountType = addslashes(trim($_POST['accountType']));
	$referrer = addslashes(trim($_POST['referrer']));
	$btc = addslashes(trim($_POST['btc']));

	$uidx = md5(date('his'). rand(23444,99994));

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

	$confirmationCode = md5(date('his'). rand(23444,99994));

	if($msg ==''){
		$insertSQL = "INSERT INTO users set uid = '$uid', fname='$fname', lname='$lname', email='$email', phone='$phone', zipcode='$zip', passme='$pass', country='$country',accountType='$accountType',  referrer='$referrer',regDate='$regDate',status='0',confirmationCode='$confirmationCode',btc='$btc'";

		$result = $co->query($insertSQL);



		$to = $email;
		$from = 'Digital Coin Place <accounts@digitalcoinplace.com>';
		$subject = 'Registration Confirmation';
		$message = 'Congratulations, your account has been created.<br />
		<p>One final step.</p>
		<p style="color:blue">Please click on the following link or copy and paste it on your browser to confirm your email: </p><a href="digitalcoinplace.com/confirmation?/'.$confirmationCode.'"> digitalcoinplace.com/confirmation?/'.$confirmationCode.
		'</a>

		<p style="color:blue; font-size:10px; margin-top:30px; padding-top:30px; border-top:1px solid blue;">
		-----------------------------------------Disclaimer--------------------------------------------------------------------<br />

		This e-mail is intended solely for the person or organisation to which it is addressed. It may contain privileged and confidential information. If you are not the intended recipient, you are prohibited from copying, disclosing or distributing this e-mail or its contents (as it may be unlawful for you to do so) or taking any action in reliance on it.

		If you have received this e-mail in error, please delete it then advise the sender immediately by sending an e-mail to info@digitalcoinplace.com.

		</p>
		';

		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		$headers .= "Content-Transfer-Encoding: 7bit\r\n";
		$headers .= "From: " . $from . "\r\n";


		//$err = mail($to, $subject, $message, $headers);

		if ($_SESSION['settings-requestID']==1) {
			header("location:en/auth/id?/$uid");
		}else{
			header("location:confirmation.php");
		}
	}

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="DIGITAL COIN PLACE Cryptocurrency Investment Site">
    <meta name="author" content="Ansonika">
    <title>DIGITAL COIN PLACE | Cryptocurrency Investment Site</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">
	<link href="css/icon_fonts/css/all_icons.min.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="css/custom.css" rel="stylesheet">

</head>

<body id="register_bg">
	
	<nav id="menu" class="fake_menu"></nav>
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
	<div style="position: absolute;right: 0;top: 568px; background: #22284a63;color: white;padding: 10px;margin-right: 35px;"><blockquote>
	<p>Bitcoin doubled in 7 days. You should not expect anything more. Excellent customer service!</p>
									<footer><span>Slim Hamdi</span>, Tunisia</footer>
								</blockquote></div>
	<div id="login">
		<aside>
			<figure>
				<a href="index.php"><img src="img/logo.png" width="192" height="42" data-retina="true" alt=""></a>
			</figure>
			<form autocomplete="off" action="" method="post">
			<div class="access_social">
				<input type="hidden" name="ci_csrf_token" value="" />
						<b style="width: 100%; text-align: center; color: orange;display: block;"><?php if(isset($msg)) echo $msg ?></b>
						<!-- <hr> -->
				
				</div>
				<h2 style="color:#3f9fff; font-size:37px">USER REGISTRATION </h2>
				<div class="divider">
				</div>
				<div class="form-group">
					<span class="input">
					<input class="input_field" type="text"  name="fname" id="fname" value="<?php if(isset($fname)) echo $fname; ?>" required>
						<label class="input_label">
						<span class="input__label-content">Your Name</span>
					</label>
					</span>

					<span class="input">
					<input class="input_field" type="text"  name="lname" id="lname"  value="<?php if(isset($lname)) echo $lname; ?>" required>
						<label class="input_label">
						<span class="input__label-content">Your Last Name</span>
					</label>
					</span>

					<span class="input">
					<input class="input_field" type="email" name="email" id="email" value="<?php if(isset($emil)) echo $email; ?>" required>
						<label class="input_label">
						<span class="input__label-content">Your Email</span>
					</label>
					</span>

					<span class="input">
					<input class="input_field" type="text" name="phone"  value="<?php if(isset($phone)) echo $phone; ?>" required="required">
						<label class="input_label">
						<span class="input__label-content">Your Phone</span>
					</label>
					</span>

					<span class="input">
					<!-- <input class="input_field" type="text" > -->
						<!-- <label class="input_label">
						<span class="input__label-content">Your Country</span>
					</label> -->
					<select name="country" required class="form-control input-border" >
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
					</span>

					<span class="input">
					<input class="input_field" type="text" name="zip" value="<?php if(isset($zip)) echo $zip; ?>">
						<label class="input_label">
						<span class="input__label-content">Your Zip</span>
					</label>
					</span>

					<span class="input">
					<select name="accountType" required class="form-control input-border" >
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
						<!-- <label class="input_label">
						<span class="input__label-content">Account Type</span>
					</label> -->
					</span>

					<span class="input">
					<input class="input_field" type="text" name="referrer" value="<?php if(isset($referrer)){ echo $referrer;}else{echo '';} ?>">
						<label class="input_label">
						<span class="input__label-content">Referal</span>
					</label>
					</span>

					<span class="input">
					<input class="input_field" type="text" name="btc" value="<?php if(isset($btc)){ echo $btc;}else{echo '';} ?>">
						<label class="input_label">
						<span class="input__label-content">BTC Address</span>
					</label>
					</span>

					<span class="input">
					<input class="input_field" type="password" id="password"  name="password"  required>
						<label class="input_label">
						<span class="input__label-content">Your password</span>
					</label>
					</span>

					<span class="input">
					<input class="input_field" type="password"name="cPassword" required="required">
						<label class="input_label">
						<span class="input__label-content">Confirm password</span>
					</label>
					</span>
					
					<div id="pass-info" class="clearfix"></div>
				</div>
				<input type="hidden" name="regst" value="1">
								<button class="btn_1 rounded full-width add_top_30" type="submit">create account</button>
				<!-- <a href="#0" class="btn_1 rounded full-width add_top_30">Register</a> -->
				<div class="text-center add_top_10" style="color:#fff">Already have an acccount? <strong><a href="login.php">Sign In</a></strong></div>
			</form>
			<div class="copy">Copyright &copy; <script>document.write(new Date().getFullYear())</script> Digital Coin Place. All Rights Reserved</div>
		</aside>
	</div>
	<!-- /login -->
	
	<!-- COMMON SCRIPTS -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/common_scripts.js"></script>
    <script src="js/main.js"></script>
	<script src="assets/validate.js"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="js/pw_strenght.js"></script>
  
</body>
</html>