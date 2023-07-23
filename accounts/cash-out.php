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
<meta name="viewport" content="width=device-width, initial-scale=1">

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
	<link href="assets/css/modal.css" rel="stylesheet" />
</head>

<body class="">
	<div class="wrapper ">
		<?php
		$page = "Cash Out";
		include "slice/sidebar.php";

		?>
		<div class="main-panel">
			<!-- Navbar -->
			<?php    	include "slice/nav.php";  ?>
			<!-- End Navbar -->
			<div class="content">
				<div class="container-fluid">
								<div class="row">
						<div class="col-md-6">
							<?php
							$msg = uri_data('3');
							if(!empty($msg) and $msg =='Amount-low'){ ?>
								<div class="alert alert-warning  "> <a class="close" data-dismiss="alert" href="#">×</a>
									<h4 class="alert-heading"> Amount too low! </h4>
								You cannot withdraw less than $100 USD. </div>
							<?php }
							?>

							<?php
							
							if(!empty($msg) and $msg =='Successful'){ ?>
								<div class="alert alert-success  "> <a class="close" data-dismiss="alert" href="#">×</a>
									<h4 class="alert-heading"> Successful! </h4>
								Your requested amount will be credited to your wallet after verification and approval. </div>
							<?php }
							?>
							<div class="card">
								<div class="card-header card-header-primary">
									<h4 class="card-title">Cash Out</h4>
									<p class="card-category"> Payment Request</p>
								</div>
								<div class="card-body">
									<form action="../management/methods.php" method="post">

										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label class="bmd-label-floating">Amount</label>
													<input type="text" name="amt" class="form-control">
												</div>
											</div>


										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group form-file-upload form-file-simple">
													<input type="file" class="">
												</div>
											</div>

										</div>

										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Notes</label>
													<div class="form-group">
														<label class="bmd-label-floating">Extra Notes to reference withdrawal. (Optional)</label>
														<textarea class="form-control" rows="5" name="notes"></textarea>
													</div>
												</div>
											</div>
										</div>
										<input type="hidden" name="cashout">
												
										<?php if($ar['status'] == 1): ?>
										<button type="submit" class="btn btn-primary pull-right">Request Payment</button>
									<?php endif ?>
										<!-- <button type="submit" class="btn btn-primary pull-right">Request Payment</button> -->
										<div class="clearfix"></div>
									</form>
								<!-- Trigger/Open The Modal -->
								<!-- <button class= " btn myBtn" id="myBtn">Reguest Payment</button> -->
								<!-- <button class="trigger btn myBtn">Reguest Payment</button> -->
								<?php if($ar['status'] == 2): ?>
							<button type="button" class="open-modal btn myBtn" data-open="modal1">Reguest Payment</button>
							<?php endif ?>
	
								</div>
								
							</div>
						</div>
						<div class="col-lg-6 col-md-12">
							<div class="card">
								<div class="card-header card-header-warning">
									<h4 class="card-title">My Requests</h4>
									<p class="card-category">Cash out requests</p>
								</div>
								<div class="card-body table-responsive">
									<table class="table table-hover">
										<thead class="text-warning">
											<th>S/N</th>
											<th>Amount</th>
											<th>Date</th>
											<th>Status</th>
										</thead>
										<tbody>

											<?php

											$queryr = "select * from `paymentrequests` where uid = '".$_SESSION['user']."'";
											$avr = $co->query($queryr);
											$arvr = $avr->fetch();
											$arvrn = $avr->size();


											if($arvrn>0){ $n=0; do{ ?>
												<tr>
													<td><?php echo ++$n ?></td>
													<td><?php echo $arvr['amt'] ?></td>
													<td><?php echo date('d-M-Y', $arvr['requestDate']) ?></td>
													<th>
														<?php 
														if($arvr['status'] ==0)echo "PENDING";
														if($arvr['status'] ==1)echo "APPROVED";
														if($arvr['status'] ==2)echo "PAID";
														?>
													</th>
												</tr>

											<?php }while($arvr = $avr->fetch()); }else{


												echo "<tr><td>You have not made any requests yet.</td></tr>";}?>


											</tbody>
										</table>
									</div>
								</div>
							</div>
							
						</div>
						<div class="col-lg-6 col-md-12">
							<div class="card">
								<div class="card-header card-header-warning">
									<h4 class="card-title">Supported Payment Methods</h4>
									<p class="card-category">There are the supported payment gateways for cash outs</p>
								</div>
								<div class="card-body table-responsive">
									<ul>
									<li>BITCOINS <span><img src="assets/img/LogoMakr-8eSkKc.png"></span></li>
									<li>BITCOIN CASH <span><img src="assets/img/Bitcoin-Cash-Btc-kryptowaluta.png"></span></li>
									<li>ETHREREUM <span><img src="assets/img/Ethereum.png"></span></li>
									<li>USDT (TRON) <span><img src="assets/img/825.png"></span></li>
									<li>PAYONEER <span><img src="assets/img/925881212s.png"></span></li>
									</ul>
									</div>
								</div>
							</div>
							
					</div>
					<!-- The Modal -->
<!-- <div id="myModal" class="modal"> -->

<!-- Modal content -->
<!-- <div class="modal-content">
<span class="close">&times;</span>
  <p>Please Upgarde your account! <br>Your Current investment does not support this acction.<br> check your email for more info!</p>
		</div>

</div> -->
<div class="modal" id="modal1">
  <div class="modal-dialog">
    <header class="modal-header">
	Please Upgarde your account!
      <button class="close-modal" aria-label="close modal" data-close>✕</button>
    </header>
    <section class="modal-content">Your Current investment does not support this acction.</section>
    <footer class="modal-footer">check your email for more info!</footer>
  </div>
</div>
				</div>
				<?php include 'slice/footer.php'; ?>
			</div>
		</div>

		<!--   Core JS Files   -->
		<script src="assets/js/modal.js"></script>
		<!-- Modal script -->
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

</html>
