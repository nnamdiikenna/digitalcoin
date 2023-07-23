<!--
=========================================================
 Material Dashboard - v2.1.1
=========================================================

 Product Page: https://www.creative-tim.com/product/material-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/material-dashboard/blob/master/LICENSE.md)

 Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="/image/apple-icon.png">
	<!-- <link rel="icon" type="image/png" href="assets/img/icon.png"> -->
	<link rel="shortcut icon" href="/images/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>
		Digital Coin Place
	</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
	<!-- CSS Files -->
	<link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/demo/demo.css" rel="stylesheet" />
	
</head>

<body class="">
	<div class="wrapper ">

		<?php
		$page = "Dashboard";
		include "slice/sidebar.php";

		?>
		<div class="main-panel">
			<!-- Navbar -->
			<?php    	include "slice/nav.php"; 
	$query = "select * from `transactions` where uid = '".$_SESSION['user']."'";
	$av = $co->query($query);
	$arv = $av->fetch();
						?>
			<!-- End Navbar -->
			<div class="content">
				<div class="container">
					
				<div class="row">
				<p style="font-weight: bold;font-size: larger;"> Hello <?php echo $ar['fname']; ?>!</p>
				<div class="col-md-12">
					<!-- TradingView Widget BEGIN -->
					
					<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
  <div id="tradingview_39b21"></div>
  <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/symbols/BTCUSD/?exchange=BITSTAMP" rel="noopener" target="_blank"><span class="blue-text">BTCUSD Chart</span></a> by TradingView</div>
  <script type="text/javascript" src="https://s3.tradingview.com/tv.js"></script>
  <script type="text/javascript">
  new TradingView.widget(
  {
  "width": 980,
  "height": 480,
  "symbol": "BITSTAMP:BTCUSD",
  "interval": "D",
  "timezone": "Etc/UTC",
  "theme": "dark",
  "style": "9",
  "locale": "en",
  "toolbar_bg": "#f1f3f6",
  "enable_publishing": false,
  "allow_symbol_change": true,
  "details": true,
  "show_popup_button": true,
  "popup_width": "1000",
  "popup_height": "650",
  "container_id": "tradingview_39b21"
}
  );
  </script>
</div>
<!-- TradingView Widget END -->
<!-- TradingView Widget END -->
</div>
</div>
</div>
				<div class="container-fluid">
					<div class="row">
						
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header card-header-warning card-header-icon">
									<div class="card-icon">
										<i class="fa fa-money"></i>
									</div>
									<p class="card-category">Investment Amount</p>
									<h3 class="card-title">$ <?php echo number_format($arv['amt'], 2) ?> </h3>
									<h3 class="card-title"><?php 

									if($arv['amt']>0){
										$cct= $arv['amt'] / $currentBTC;
										echo substr($cct, 0,6);}else{echo "0.00";}
										?> BTC</h3>

									</div>
								<!-- <div class="progress-container">
									<span class="progress-badge">Default</span>
									<div class="progress">
										<div class="progress-bar" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
										</div>
									</div>
								</div> -->
								<div class="card-footer">

									<div class="stats">
										<i class="material-icons ">date_range</i>
										<a href="#pablo"><?php echo $arv['datePosted']; 
										if($arv['confirmed']==0 ){echo " <b style='color:red'>(UNCONFIRMED)</b>";}
										?></a><br> 



									</div>

								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header card-header-success card-header-icon">
									<div class="card-icon">
										<i class="fa fa-money"> </i>
									</div>
									<p class="card-category">Current Balance</p>
									<?php if($arv['currentBalance'] ==""){
										$currentBalance = 50;
									}else {$currentBalance = $arv['currentBalance'];}

									?>
									<h3 class="card-title">$ <?php echo number_format($currentBalance, 2) ?> </h3>
									<h3 class="card-title"><?php 

									if($currentBalance>0){
										$cc= $currentBalance / $currentBTC;
										echo substr($cc, 0,6);}else{echo "0.00";}
										?> BTC</h3>
									</div>
									<div class="card-footer">
										<div class="stats">
											<i class="material-icons">update</i> <?php echo $arv['interest'] ?>%/day
										</div>
									</div>
								</div>
							</div>
					<!-- Total withdrawal -->

								<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="card card-stats">
									<div class="card-header card-header-warning card-header-icon">
										<div class="card-icon">
											<i class="fa fa-money"></i>
										</div>
										<p class="card-category">Total Withdrawal</p>
										<h3 class="card-title">$ <?php 

										$queryr = "SELECT SUM(amt) as amt from `paymentrequests` where uid = '".$_SESSION['user']."' and status = 2";
										$avr = $co->query($queryr);
										$arvr  = $avr->fetch();
										$arvrn = $avr->size();
										echo number_format($arvr['amt'], 2) ?> </h3>
										<h3 class="card-title"><?php 

										if($arvr['amt']>0){
											$tmt= $arvr['amt'] / $currentBTC;
											echo substr($tmt, 0,6);}else{echo "0.00";}
											?> BTC</h3>
										</div>
										<div class="card-footer">
											<div class="stats">
												<i class="material-icons">local_offer</i>confirmed payout(s)
											</div>
										</div>
									</div>
								</div>


							<!-- total withdrawal -->
							<div class="col-lg-3 col-md-6 col-sm-6">
								<div class="card card-stats">
									<div class="card-header card-header-danger card-header-icon">
										<div class="card-icon">
											<i class="fa fa-money"></i>
										</div>
										<p class="card-category">Referral Bonus</p>
										<h3 class="card-title">$ <?php 

										$queryr = "SELECT SUM(amt) as amt from `referrals` where referrer = '".$_SESSION['user']."' and paid = 0";
										$avr = $co->query($queryr);
										$arvr  = $avr->fetch();
										$arvrn = $avr->size();
										echo number_format($arvr['amt'], 2) ?> </h3>
										<h3 class="card-title"><?php 

										if($arvr['amt']>0){
											$tmt= $arvr['amt'] / $currentBTC;
											echo substr($tmt, 0,6);}else{echo "0.00";}
											?> BTC</h3>
										</div>
										<div class="card-footer">
											<div class="stats">
												<i class="material-icons">local_offer</i> <?php echo $arvrn ?> Referral(s)
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-3 col-md-6 col-sm-6">
									<div class="card card-stats">
										<div class="card-header card-header-info card-header-icon">
											<div class="card-icon">
												<i class="fa fa-money"></i>
											</div>
											<p class="card-category">Grand Total</p>
											<h3 class="card-title">$
												<?php  
												$grandTotal = $currentBalance + $arvr['amt'];
												echo number_format($grandTotal,2);
												?>
											</h3>
											<h3 class="card-title"><?php 

											if($grandTotal>0){
												$gt= $grandTotal / $currentBTC;
												echo substr($gt, 0,6);}else{echo "0.00";}
												?> BTC</h3>
											</div>
											<div class="card-footer">
												<div class="stats">
													<i class="material-icons">money</i> Balance + Referrals
												</div>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-lg-6 col-md-12">
										<div class="card">
											<div class="card-header card-header-tabs card-header-primary">
												<div class="nav-tabs-navigation">
													<div class="nav-tabs-wrapper">
														<!-- <span class="nav-tabs-title">Rates:</span> -->
														<ul class="nav nav-tabs" data-tabs="tabs">
															<li class="nav-item">
																<a class="nav-link active" href="#profile" data-toggle="tab">
																	<i class="material-icons">bug_report</i> Popular Crypto Rates
																	<div class="ripple-container"></div>
																</a>
															</li>

														</ul>
													</div>
												</div>
											</div>
											<div class="card-body">
												<div class="tab-content">
													<div class="tab-pane active" id="profile" style="height: 400px;">

														<script src="https://widgets.coingecko.com/coingecko-coin-list-widget.js"></script>
														<coingecko-coin-list-widget  coin-ids="bitcoin,ethereum,eos,ripple,litecoin" currency="usd" locale="en"></coingecko-coin-list-widget>
											
										</div>

									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-12">
							<div class="card">
								<div class="card-header card-header-tabs card-header-primary">
									<div class="nav-tabs-navigation">
										<div class="nav-tabs-wrapper">
											<ul class="nav nav-tabs" data-tabs="tabs">
												<li class="nav-item">
													<a class="nav-link active" href="#profile" data-toggle="tab">
														<i class="material-icons">bug_report</i> Crypto Price Comparison
														<div class="ripple-container"></div>
													</a>
												</li>

											</ul>
										</div>
									</div>
								</div>
								<div class="card-body table-responsive">
									<script src="https://widgets.coingecko.com/coingecko-coin-compare-chart-widget.js"></script>
									<coingecko-coin-compare-chart-widget  coin-ids="bitcoin,ethereum,eos,ripple,litecoin" currency="usd" locale="en"></coingecko-coin-compare-chart-widget>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-12">
							<div class="card">
								<div class="card-header card-header-warning">
									<h4 class="card-title">My Referral Bonuses</h4>
									<p class="card-category">Investments i have brought in.</p>
								</div>
								<div class="card-body table-responsive">
									<table class="table table-hover">
										<thead class="text-warning">
											<th>S/N</th>
											<th>Name</th>
											<th>My Bonus</th>
											<th>Date</th>
										</thead>
										<tbody>
											<?php

											$queryr3 = "SELECT  * from `referrals` where referrer = '".$_SESSION['user']."' and paid = 0";
											$avr3 = $co->query($queryr3);
											$arvr3  = $avr3->fetch();
											$arvrn3 = $avr3->size();

											if($arvrn3>0){ $n=0; do{ ?>
												<tr>
													<td><?php echo ++$n ?></td>
													<td><?php 

													$query2 = "select * from `users` where uid = '".$arvr3['referree']."'";
													$av2 = $co->query($query2);
													$arv2 = $av2->fetch();


													echo ucwords($arv2['fname'])." ".ucwords($arv2['lname']) ?></td>
													<td><?php echo $arvr3['amt'] ?></td>
													<td><?php echo date('d-M-Y', $arvr3['refDate']) ?></td>
												</tr>

											<?php }while($arvr3 = $avr3->fetch()); }else{


												echo "<tr><td>No Referral Investments Yet.</td></tr>";}?>


											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php include 'slice/footer.php'; ?>
			</div>
		</div>
	
      <!--   Core JS Files   -->
      <script src="assets/js/core/jquery.min.js"></script>
      <script src="assets/js/core/popper.min.js"></script>
      <script src="assets/js/core/bootstrap-material-design.min.js"></script>
      <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
      <!-- Plugin for the momentJs  -->
      <script src="assets/js/plugins/moment.min.js"></script>
      <!--  Plugin for Sweet Alert -->
      <script src="assets/js/plugins/sweetalert2.js"></script>
      <!-- Forms Validations Plugin -->
      <script src="assets/js/plugins/jquery.validate.min.js"></script>
      <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
      <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
      <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
      <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
      <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
      <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
      <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
      <script src="assets/js/plugins/jquery.dataTables.min.js"></script>
      <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
      <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
      <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
      <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
      <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
      <script src="assets/js/plugins/fullcalendar.min.js"></script>
      <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
      <script src="assets/js/plugins/jquery-jvectormap.js"></script>
      <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
      <script src="assets/js/plugins/nouislider.min.js"></script>
      <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
      <!-- Library for adding dinamically elements -->
      <script src="assets/js/plugins/arrive.min.js"></script>
      <!--  Google Maps Plugin    -->
      <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
      <!-- Chartist JS -->
      <script src="assets/js/plugins/chartist.min.js"></script>
      <!--  Notifications Plugin    -->
      <script src="assets/js/plugins/bootstrap-notify.js"></script>
      <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
      <script src="assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
      <!-- Material Dashboard DEMO methods, don't include it in your project! -->
      <script src="assets/demo/demo.js"></script>
      <script>
      	$(document).ready(function() {
      		$().ready(function() {
      			$sidebar = $('.sidebar');

      			$sidebar_img_container = $sidebar.find('.sidebar-background');

      			$full_page = $('.full-page');

      			$sidebar_responsive = $('body > .navbar-collapse');

      			window_width = $(window).width();

      			fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

      			if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
      				if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
      					$('.fixed-plugin .dropdown').addClass('open');
      				}

      			}

      			$('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
          	if (event.stopPropagation) {
          		event.stopPropagation();
          	} else if (window.event) {
          		window.event.cancelBubble = true;
          	}
          }
      });

      			$('.fixed-plugin .active-color span').click(function() {
      				$full_page_background = $('.full-page-background');

      				$(this).siblings().removeClass('active');
      				$(this).addClass('active');

      				var new_color = $(this).data('color');

      				if ($sidebar.length != 0) {
      					$sidebar.attr('data-color', new_color);
      				}

      				if ($full_page.length != 0) {
      					$full_page.attr('filter-color', new_color);
      				}

      				if ($sidebar_responsive.length != 0) {
      					$sidebar_responsive.attr('data-color', new_color);
      				}
      			});

      			$('.fixed-plugin .background-color .badge').click(function() {
      				$(this).siblings().removeClass('active');
      				$(this).addClass('active');

      				var new_color = $(this).data('background-color');

      				if ($sidebar.length != 0) {
      					$sidebar.attr('data-background-color', new_color);
      				}
      			});

      			$('.fixed-plugin .img-holder').click(function() {
      				$full_page_background = $('.full-page-background');

      				$(this).parent('li').siblings().removeClass('active');
      				$(this).parent('li').addClass('active');


      				var new_image = $(this).find("img").attr('src');

      				if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
      					$sidebar_img_container.fadeOut('fast', function() {
      						$sidebar_img_container.css('background-image', 'url("' + new_image + '")');
      						$sidebar_img_container.fadeIn('fast');
      					});
      				}

      				if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
      					var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

      					$full_page_background.fadeOut('fast', function() {
      						$full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
      						$full_page_background.fadeIn('fast');
      					});
      				}

      				if ($('.switch-sidebar-image input:checked').length == 0) {
      					var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
      					var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

      					$sidebar_img_container.css('background-image', 'url("' + new_image + '")');
      					$full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
      				}

      				if ($sidebar_responsive.length != 0) {
      					$sidebar_responsive.css('background-image', 'url("' + new_image + '")');
      				}
      			});

      			$('.switch-sidebar-image input').change(function() {
      				$full_page_background = $('.full-page-background');

      				$input = $(this);

      				if ($input.is(':checked')) {
      					if ($sidebar_img_container.length != 0) {
      						$sidebar_img_container.fadeIn('fast');
      						$sidebar.attr('data-image', '#');
      					}

      					if ($full_page_background.length != 0) {
      						$full_page_background.fadeIn('fast');
      						$full_page.attr('data-image', '#');
      					}

      					background_image = true;
      				} else {
      					if ($sidebar_img_container.length != 0) {
      						$sidebar.removeAttr('data-image');
      						$sidebar_img_container.fadeOut('fast');
      					}

      					if ($full_page_background.length != 0) {
      						$full_page.removeAttr('data-image', '#');
      						$full_page_background.fadeOut('fast');
      					}

      					background_image = false;
      				}
      			});

      			$('.switch-sidebar-mini input').change(function() {
      				$body = $('body');

      				$input = $(this);

      				if (md.misc.sidebar_mini_active == true) {
      					$('body').removeClass('sidebar-mini');
      					md.misc.sidebar_mini_active = false;

      					$('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

      				} else {

      					$('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

      					setTimeout(function() {
      						$('body').addClass('sidebar-mini');

      						md.misc.sidebar_mini_active = true;
      					}, 300);
      				}

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
          	window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
          	clearInterval(simulateWindowResize);
          }, 1000);

      });
      		});
});
</script>
<script>
	$(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

  });
</script>
<script src="//code.tidio.co/wb5hkllw9mdx7hyewz93vo9aygug02wo.js" async></script>
</body>

</html>
