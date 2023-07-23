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
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/icon.png">
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
		$page = "Buy NFT";
		include "slice/sidebar.php";


		

		?>
		<div class="main-panel">
			<!-- Navbar -->
			<?php    	include "slice/nav.php"; 

			$qWallet = "select * from `settings`";
			$aqWallet = $co->query($qWallet);
			$wallet = $aqWallet->fetch();
			?>
			<!-- End Navbar -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<?php
							$msg = uri_data('3');
							if(!empty($msg) and $msg =='Amount-low'){ ?>
								<div class="alert alert-warning  "> <a class="close" data-dismiss="alert" href="#">×</a>
									<h4 class="alert-heading"> Insufficient Funds! </h4>
								The amount paid is insufficient for the current package. </div>
							<?php }  

							if(!empty($msg) and $msg =='Successful'){ ?>
								<div class="alert alert-success"> <a class="close" data-dismiss="alert" href="#">×</a>
									<h4 class="alert-heading">Upload Successful! </h4>
								Please wait for a confirmation. </div>
							<?php } ?>

							<?php 
							$querytrans = "select * from `transactions` where uid = '".$_SESSION['user']."'";
							$trans = $co->query($querytrans);
							$avail = $trans->size();
							$det = $trans->fetch();
							$a=1;
							if($a==1){
								?>
								<div class="card">

									<div class="card-header card-header-primary">

										<?php 
										$id = ( isset( $_POST['id'] ) && is_numeric( $_POST['id'] ) ) ? intval( $_POST['id'] ) : 0;
										
										// if(isset($_GET['id'])){$id = $_GET['id'];}
										// $id = $_GET['id'];
										$query2 = "SELECT * from `nft` WHERE id = '".$id."'";
										$av2 = $co->query($query2);
										$arv2 = $av2->fetch();
										?>
										<h3 class="card-title">You are Buying:  <?php echo ucfirst($arv2['nftdetails']); ?> NFT</h3>
										<p class="card-category" style="font-size: 20px; font-weight: bold;">Please pay:  <b> $ <?php echo number_format($arv2['price']); ?>  </b></p><br>
										<img src="../nft/<?php echo $arv2['nftpics']; ?> " alt="" style="width: 100%;">
										<!-- <b>1. OUR ETH ADDRESS: <?php echo $wallet['ethAddress'] ?></b><br> -->
										<br>
										<!-- <b>2. OUR BTC ADDRESS: <?php echo $wallet['btcAddress'] ?></b> -->
										<br><br>
										
									</div>
									<div class="card-body">
										<form method="post" action="../management/methods.php">

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="bmd-label-floating">Amount</label>
														<input type="text" name="amt" class="form-control">
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label class="bmd-label-floating">Transaction Date</label>
														<input name="transDate" type="text" class="form-control"  onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'">
													</div>
												</div>


											</div>

											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label>Notes</label>
														<div class="form-group">
															<label class="bmd-label-floating">Extra Notes to reference payment. (Optional)</label>
															<textarea class="form-control" rows="5" name="notes"></textarea>
														</div>
													</div>
												</div>
											</div>
											<input type="hidden" value="1" name="transUpl">
											<button type="submit" class="btn btn-primary pull-right">Upload Payment</button>
											<div class="clearfix"></div>
										</form>
									</div>
								</div>
							<?php }else{ ?>

								<div class="card">
									<div class="card-header card-header-tabs card-header-primary">
										<div class="nav-tabs-navigation">
											<div class="nav-tabs-wrapper">
												<span class="nav-tabs-title">  </span>
												<ul class="nav nav-tabs" data-tabs="tabs">
													<li class="nav-item">
														<a class="nav-link active" href="#profile" data-toggle="tab">
															<i class="material-icons">bug_report</i> Wallet Aready Funded
															<div class="ripple-container"></div>
														</a>
													</li>

												</ul>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="tab-content">
											<div class="tab-pane active" id="profile">
												<table class="table">
													<tbody>
														<tr>
															<td>
																<div class="form-check">
																	<label class="form-check-label">
																		Account Type

																	</label>
																</div>
															</td>
															<td>
																<?php 
																$query2 = "select * from `accounttype` where id = '".$det['accountType']."'";
																$av2 = $co->query($query2);
																$arv2 = $av2->fetch();
																echo strtoupper($arv2['name']);
																?>

															</td>
															<td class=" ">

															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check">
																	<label class="form-check-label">
																		Amount Paid

																	</label>
																</div>
															</td>
															<td>$ <?php echo number_format($det['amt']) ?></td>
															<td class="  ">

															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check">
																	<label class="form-check-label">
																		Date of Payment

																	</label>
																</div>
															</td>
															<td><?php echo   $det['datePosted']  ?></td>
															<td class=" ">

															</td>
														</tr>
														<tr>
															<td>
																<div class="form-check">
																	<label class="form-check-label">
																		Status

																	</label>
																</div>
															</td>
															<td><?php if($det['confirmed'] == 0){ ?>
																
																<b style="color: red">UNCONFIRMED</b>

															<?php } ?>
															<?php if($det['confirmed'] == 1){ ?>
																
																<b style="color: green">CONFIRMED</b>

															<?php } ?>

															<?php if($det['confirmed'] == 3){ ?>
																
																<b style="color: red">SUSPENDED</b>

															<?php } ?>
														</td>
														<td class="td-actions text-right">

														</td>
													</tr>
												</tbody>
											</table>
										</div>

									</div>
								</div>
							</div>

						<?php } ?>
					</div>
					<div class="col-md-4">
						<h4>Our ETH QR code</h4>
						<img src="../<?php echo $wallet['qrCode3']; ?>" alt="" style="width: 70%;"><br>
						<b> OUR ETH ADDRESS: <?php echo $wallet['ethAddress'] ?></b>
					</div>
					<!-- <div class="col-md-4">
						<h4>Our BCH QR code</h4>
						<img src="../<?php echo $wallet['qrCode1']; ?>" alt="" style="width: 70%;">
					</div>
					<div class="col-md-4">
						<h4>Our USDT QR code</h4>
						<img src="../<?php echo $wallet['qrCode2']; ?>" alt="" style="width: 70%;">
					</div> -->
					<div class="col-md-4">
						<h4>Our BTC QR code</h4>
						<img src="../<?php echo $wallet['qrCode']; ?>" alt="" style="width: 70%;"><br>
						<b> OUR BTC ADDRESS: <?php echo $wallet['btcAddress'] ?></b>
					</div>
					<!-- <div class="col-md-4">
						<h4>Other Payoneer details</h4>
						<img src="../<?php echo $wallet['qrCode4']; ?>" alt="" style="width: 70%;">
					</div> -->
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
</body>
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
</html>
