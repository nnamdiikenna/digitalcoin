<?php
session_start();
include 'management/conn/cos.php';

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
			header("location:login?/success");
		}else{
			header("location:loginauths?/alreadyConfirmed");
		}

	}else{
		$msg = "Enter Valid Confirmation Code";
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

<body>
	
	<div id="page">
		
	<?php require "header.php";?>
	<!-- /header -->
	
	<main>
	<div id="error_page">
			<div class="container">
				<div class="row justify-content-center text-center">
					<div class="col-xl-7 col-lg-9">
                    <h2 style="font-size:xx-large">CONGRATULATIONS!!! </h2>
						<h2><i class="icon_error-triangle_alt"></i></h2>
						<p>You are one step away from accessing your account.</p>
                        <p>The details you provided is being reviewed and verified. This process can take a few minutes or several hours. Once approved, you will be able to login to your investment account.</p>
                        <a href="login.php" class="btn btn-primary">login</a>
						<!-- <form>
							<div class="search_bar_error">
								<input type="text" class="form-control" placeholder="What are you looking for?">
								<input type="submit" value="Search">
							</div>
						</form> -->
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /error_page -->
	</main>
	<!--/main-->
	
	<?php require "footer.php"?>
	<!--/footer-->
	</div>
	<!-- page -->
	
	<!-- COMMON SCRIPTS -->
    <script src="js/jquery-2.2.4.min.js"></script>
    <script src="js/common_scripts.js"></script>
    <script src="js/main.js"></script>
	<script src="assets/validate.js"></script>
	
</body>
</html>