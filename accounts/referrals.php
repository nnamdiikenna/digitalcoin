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
		$page = "My Referrals";
		include "slice/sidebar.php";

		?>
		<div class="main-panel">
			<!-- Navbar -->
			<?php    	include "slice/nav.php";  ?>

			<!-- End Navbar -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="card">

								<?php 

								$query2 = "select * from `users` where referrer = '".$ar['uid']."'";
								$av2 = $co->query($query2);
								$arv2 = $av2->fetch();
								$arvc = $av2->size();
								?>
								<div class="card-header card-header-primary">
									<h4 class="card-title ">My Referrals</h4>
									<p class="card-category"> Registrations under me.</p>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table">
											<thead class=" text-primary">
												<th>S/N</th>
												<th>Name</th>
												<th>Account Status</th>	
												<!-- <th>Invested Amount</th> -->
												<!-- <th>My Bonus</th> -->
											</thead>	
											<tbody>
												<?php if($arvc>0){ 
													$n =0;
													do{ ?>
														<tr>
															<td><?php echo ++$n; ?></td>
															<td><?php echo ucfirst($arv2['fname'])." ".ucwords($arv2['lname']); ?>	</td>

															<td>
																<?php 
																if($arv2['status']==0){
																	echo "INACTIVE";
																} 
																if($arv2['status']==1){
																	echo "ACTIVE";
																} 
																if($arv2['status']==2){
																	echo "SUSPENDED";
																} 
																?>
															</td>
														<!-- 	<td>
																<?php 
																$query3 = "select * from `transactions` where uid = '".$arv2['uid']."'";
																$av3 = $co->query($query3);
																$arv3 = $av3->fetch();
																$arvc3 = $av3->size(); 
																echo "$ ". number_format($arv3['amt']);
																?>
															</td>
															<td class="text-primary">
																<?php 
																$query3 = "select * from `referrals` where referree = '".$arv2['uid']."'";
																$av3 = $co->query($query3);
																$arv3 = $av3->fetch();
																$arvc3 = $av3->size(); 
																echo "$ ". number_format($arv3['amt']);
																?>
															</td> -->
														</tr>

													<?php }while($arv2 = $av2->fetch()); }?>


												</tbody>
											</table>
										</div>
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
