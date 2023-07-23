<?php session_start();

include "../management/conn/cos.php";

$msg = uri_data('3');

if(isset($_POST['resetp'])){


    $email = addslashes(trim($_POST['email']));

    $qe = "select * from `users` where email = '$email'";
    $ae = $co->query($qe);
    $are = $ae->fetch();
    $arre = $ae->size();

    if($arre>0){

        $confCode = md5(date('his'). rand(23444,99994));
        $tmodi = time();

        if($msg ==''){
            $insertSQL = "INSERT INTO pwreset set email = '$email', tmodi='$tmodi', confCode='$confCode'";
            $co->query($insertSQL);



            $to = $email;
            $from = 'Profit Coin Traders <accounts@digitalcoinplace.com';
            $subject = 'Password Reset';
            $message = 'Recently a request was submitted to reset your password for your Account. If you did not request this, please ignore this email. It will expire and become useless in 2 hours time. .<br />
            <p>To reset your password, please visit the url below or copy and paste it on your browser:</p>
            <p><a href="digitalcoinplace.com/account/password-reset?/'.$confCode.'"> digitalcoinplace.com/account/password-reset?/'.$confCode.
            '</a> </p>

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


            $err = mail($to, $subject, $message, $headers);

            $msg = "A password reset email has been sent to you.";
            $mailsent = 1;

        }
    }else{

        $msg = "Sorry, we can't seem to find your email registered.";
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
    <link rel="shortcut icon" href="../img/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="../img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="../img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="../img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="../img/apple-touch-icon-144x144-precomposed.png">

    <!-- BASE CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
	<link href="../css/vendors.css" rel="stylesheet">
	<link href="../css/icon_fonts/css/all_icons.min.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="../css/custom.css" rel="stylesheet">

</head>

<body id="login_bg">
	
	<nav id="menu" class="fake_menu"></nav>
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
	<div style="position: absolute;right: 0;top: 568px; background: #22284a63;color: white;padding: 10px;margin-right: 35px;"><blockquote>
									<p>This is a realistic program for anyone looking for site to invest. <br>Paid to me regularly, keep up good work!</p>
									<footer><span>Lucy Smith</span>, England</footer>
								</blockquote></div>
	<div id="login">
		<aside>
			<figure>
				<a href="../index.php"><img src="../img/logo.png" width="192" height="42" data-retina="true" alt=""></a>
			</figure>
            <?php if($mailsent != 1){ ?>
			  <form action="" method="post" style="color:#fff">
				<div class="access_social">
				<input type="hidden" name="ci_csrf_token" value="" />
						<b style="width: 100%; text-align: center; color: orange;display: block;"><?php if(isset($msg)) echo $msg ?></b>
						<hr>
				
				</div>
				<h2 style="color:#3f9fff; font-size:37px">RESET PASSWORD</h2>
				<div class="divider">
				</div>
				
				<div class="form-group">
					<span class="input">
					<input class="input_field" type="email" autocomplete="off" name="email"  value="" required>
						<label class="input_label">
						<span class="input__label-content">Your email</span>
					</label>
					</span>

					<!-- <span class="input">
					<input class="input_field" type="password" autocomplete="new-password" name="pass">
						<label class="input_label">
						<span class="input__label-content">Your password</span>
					</label>
					</span>
					<small><a href="accounts/reset-password.php">Forgot password?</a></small> -->
				</div>
                <input type="hidden" name="resetp" value="1">
				<button class="btn_1 rounded full-width add_top_60" type="submit">Reset</button>
				<!-- <a href="#0" class="btn_1 rounded full-width add_top_60">Login</a> -->
				<div class="text-center add_top_10" style="color:#fff">New to Digital Coin Place? <strong><a href="../register.php">Sign up!</a></strong> 
        </div>
			</form>
            <?php } ?>
            <div class="text-center " style="color:#fff"><strong><a href="../login.php">Login</a></strong>&nbsp; &nbsp;<span>Back to <a href="../index.php">&nbsp; Home</span></div><br>
			<div class="copy">Copyright &copy; <script>document.write(new Date().getFullYear())</script> Digital Coin Place. All Rights Reserved</div>
		</aside>
	</div>
	<!-- /login -->
		
	<!-- COMMON SCRIPTS -->
    <script src="../js/jquery-2.2.4.min.js"></script>
    <script src="../js/common_scripts.js"></script>
    <script src="../js/main.js"></script>
	<script src="../assets/validate.js"></script>	
  
</body>
</html>