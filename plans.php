<!DOCTYPE html>
<html lang="en">
<?php include "management/conn/cos.php"; ?>
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
		
<?php require "header.php"; ?>
	<!-- /header -->
	
	<main>
		<section id="hero_in" class="general">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Our Plans</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<div class="container margin_default">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Cryptocurrency Investment Mining</h2>
				<p>Select any of our plans suitable for you and get ROI in days..</p>
			</div>
			<div class="row">
            <?php
						$query = "select * from `accounttype`";
						$av = $co->query($query);
						$arv = $av->fetch();
						do{
							?>
        	<div class="col-md-6">
				<div class="box_service_single_2" style="background:url(../img/Bitcoinjourney-59bb395bfc544bec875ede47429e7b9a.png)";>
                <h4 style="color: skyblue;font-size: xxx-large;"><?php echo ucwords($arv['name']) ?></h4>
					<figure style="color:#ffff; font-weight:bold;font-size: xx-large;">
                                       <span>Duration: 7 Days </span>
                                            <div class="price">
                                            <span> Min. Deposit: </span> &nbsp;
                                                <!-- <span class="value"></span> -->
                                                <span class="value"><i class=" icon-dollar"></i><?php echo $arv['minAmt'] ?> </span><br>
                                                <span> Max. Deposit: </span> &nbsp;
                                                <!-- <span class="value"><i class=" icon-dollar"></i></span> -->
                                                <span class="value"><i class=" icon-dollar"></i><?php echo $arv['maxAmt'] ?></span><br>
                                               
                                                <span>@<?php echo $arv['interest'] ?> % Interest</span><br>
                                                <span> <?php echo $arv['referalAmt'] ?>% Referals </span>
                                            </div>
                                            <a href="login.php" class="btn btn-primary">Invest Now</a>
                    </figure>
					                    
				</div>
      		</div>
              <?php }while($arv = $av->fetch()); ?>
           
        </div><!--/row-->
		</div>
		<!-- /container -->

		<div class="bg_content">
			<div class="mask">
				<div class="container margin_default">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="content_center">
								<h3>The Strategy</h3>
								<p class="lead">We have carefully outline the best ways to give customers satisfaction to our investors and traders.</p>
								<p>We are here because we are passionate about open, transparent markets and aim to be a major driving force in widespread adoption, we are the first and the best in cryptocurrency.</p>
							</div>
						</div>
						<div class="col-lg-6">

							<div class="barWrapper">
								<span class="progressText">Marketing Strategy</span>
								<div class="progress">
								  <div class="progress-bar" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
								</div>
							</div>
							<!--/bar-->

							<div class="barWrapper">
								<span class="progressText">Target success</span>
								<div class="progress">
									<div class="progress-bar" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">95%</div>
								</div>
							</div>
							<!--/bar-->

							<div class="barWrapper">
								<span class="progressText">Consumer increase</span>
								<div class="progress">
									<div class="progress-bar" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
								</div>
							</div>
							<!--/bar-->

							<div class="barWrapper">
								<span class="progressText">Maximum ROI</span>
								<div class="progress">
									<div class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
								</div>
							</div>
							<!--/bar-->

						</div>
					</div>
					<!--/row-->
				</div>
				<!--/container-->
			</div>
			<!--/mask-->
		</div>
		<!--/bg_content-->
		
	
	</main>
	<!--/main-->
	
	<?php require "footer.php"; ?>
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