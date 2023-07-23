<?php
session_start();

$url = 'https://api.coingecko.com/api/v3/exchange_rates'; // path to your JSON file
$client = curl_init($url);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
$response = curl_exec($client);

$result = json_decode($response, true);


$currentBTC = $result['rates']['usd']['value'];


if(empty($_SESSION['user'])){

	header("location:/login.php");
	exit;
}

include '../management/conn/cos.php';

$q = "select * from `users` where uid = '".$_SESSION['user']."'";

$a = $co->query($q);
$ar = $a->fetch();
?>


<div>
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
	<div class="container-fluid">
		<div class="navbar-wrapper">
			<a class="navbar-brand" href="#pablo"><?php echo $page; ?></a>
			<!-- google translate -->
<div id="google_translate_element"></div>
<!-- google translate ends here -->
		</div>
		<button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
			<span class="sr-only">Toggle navigation</span>
			<span class="navbar-toggler-icon icon-bar"></span>
			<span class="navbar-toggler-icon icon-bar"></span>
			<span class="navbar-toggler-icon icon-bar"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-end">
			<form class="navbar-form">
				<div class="input-group no-border">
					My Referral Code - : -  <?php echo $_SESSION['user'];  ?>
				</div>
			</form>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="#pablo">
						<i class="material-icons">dashboard</i>
						<p class="d-lg-none d-md-block">
							Stats
						</p>
					</a>
				</li>
				<!-- <li class="nav-item dropdown">
					<a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="material-icons">notifications</i>
						<span class="notification">5</span>
						<p class="d-lg-none d-md-block">
							Some Actions
						</p>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="#">Mike John responded to your email</a>
						<a class="dropdown-item" href="#">You have 5 new tasks</a>
						<a class="dropdown-item" href="#">You're now friend with Andrew</a>
						<a class="dropdown-item" href="#">Another Notification</a>
						<a class="dropdown-item" href="#">Another One</a>
					</div>
				</li> -->
				<li class="nav-item dropdown">
					<a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<i class="material-icons">person</i>
						<p class="d-lg-none d-md-block">
							Account
						</p>
					</a>
					<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
						<a class="dropdown-item" href="Profile">Profile</a>
						<!-- <a class="dropdown-item" href="#">Settings</a> -->
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="logout">Log out</a>
					</div>
				</li>
			</ul>
		</div>
	</div>
</nav>

</div>