<?php 
include 'conn/cos.php';

?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Digital Coin Place Admin</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="css/fullcalendar.css" />
	<link rel="stylesheet" href="css/matrix-style.css" />
	<link rel="stylesheet" href="css/matrix-media.css" />
	<link rel="stylesheet" href="css/uniform.css" />
	<link rel="stylesheet" href="css/select2.css" />
	<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<!-- 	<link rel="stylesheet" href="css/jquery.gritter.css" />
-->	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>

	<!--Header-part-->

	<!--close-Header-part-->


	<!--top-Header-menu-->
	<?php
	$page = 'home';
	include 'slice/nav.php';
	include 'slice/sidebar.php';
	?>



	<!--main-container-part-->
	<div id="content">
		<!--breadcrumbs-->
		<div id="content-header">
			<div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
		</div>
		<!--End-breadcrumbs-->

		<!--Action boxes-->
		<div class="container-fluid">
			<div class="quick-actions_homepage">
				<ul class="quick-actions">
					<li class="bg_lb span3"> <a href=" "> <i class="icon-dashboard"></i> <span class="label label-important">

						<?php $qp = "select * from `users` where status = 0;";
						$ap = $co->query($qp);
						echo $arp = $ap->size(); 

						?>
					</span> Pending Accounts </a> </li>
					<li class="bg_lg span4"> <a href=" "> <i class="icon-inbox"></i><span class="label label-success">
						<?php 
						$qa = "select * from `users` where status = 1;";
						$aa = $co->query($qa);
						echo $ara = $aa->size(); 

						?>

					</span> Active Accounts </a> </li>
					<li class="bg_lo span3"> <a href=" "> <i class="icon-th"></i><span class="label label-success">
						<?php 
						$qs = "select * from `users` where status = 2;";
						$as = $co->query($qs);
						echo $ars = $as->size(); ?>

					</span> Suspended Account</a> </li>


				</ul>
			</div>

			<hr/>
			<?php 
			$q = "select * from `users`";
			$a = $co->query($q);
			$ar = $a->fetch();
			$arr = $a->size();
			?>

			<div class="widget-box ">
				<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
					<h5>Accounts [ Total Number - <?php echo $arr; ?> ]</h5>
				</div>
				<div class="widget-content nopadding table-responsive">
					<table class="table table-bordered data-table ">
						<thead>
							<tr>
								<th>Name</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Reg Date</th>
								<th>Account Type</th>
								<th>Account Bal</th>
								<th>Referrer</th>
								<th>Account Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							<?php 

							do{
								?>
								<tr class="gradeX">
									<td><?php echo $ar['fname']." ".$ar['lname'] ?></td>
									<td><?php echo $ar['phone'] ?></td>
									<td><?php echo $ar['email'] ?></td>
									<td><?php echo  date('d-m-Y', $ar['regDate']) ?></td>
									<td><?php
									$qs = "select * from `accounttype` where id = '".$ar['accountType']."'";
									$as = $co->query($qs);
									$ars = $as->fetch();

									echo strtoupper($ars['name']) ?></td>
									<td><a href="creditacc.php"><?php
									$qs = "select * from `transactions` where id = '".$ar['id']."'";
									$as = $co->query($qs);
									$ars = $as->fetch();

									echo strtoupper($ars['currentBalance']) ?></a></td>
									<td><?php echo  $ar['referrer'] ?></td>
									<td>
										<?php if($ar['status'] == 0) { ?>							
											<span class="badge badge-warning">Pending</span>
										<?php } ?>

										<?php if($ar['status'] == 1) { ?>							
											<span class="badge badge-success">Active</span>
										<?php } ?>
										<?php if($ar['status'] == 2) { ?>							
											<span class="badge badge">Suspended</span>
										<?php } ?>

									</td>

									<td> <a href="account-details.php?uid=<?php echo $ar['uid'] ?> " class="btn btn-info btn-small">View Details</a></td>
								</tr>

							<?php } while ($ar = $a->fetch()); ?>
							

						</tbody>
					</table>
				</div>
			</div>
			<hr>

		</div>
	</div>

	<!--end-main-container-part-->

	<!--Footer-part-->

	<?php include 'slice/footer.php'; ?>
	<!--end-Footer-part-->

	<script src="js/excanvas.min.js"></script>
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.ui.custom.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/matrix.tables.js"></script>
	<script src="js/jquery.flot.min.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	<script src="js/jquery.peity.min.js"></script>
	<script src="js/fullcalendar.min.js"></script>
	<script src="js/matrix.js"></script>
<!-- 		<script src="js/jquery.gritter.min.js"></script>
-->		<script src="js/matrix.interface.js"></script>
<script src="js/matrix.chat.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/matrix.form_validation.js"></script>
<script src="js/jquery.wizard.js"></script>
<script src="js/jquery.uniform.js"></script>
<script src="js/select2.min.js"></script>
<script src="js/matrix.popover.js"></script>
<!-- 					<script src="js/matrix.dashboard.js"></script>
-->

<script type="text/javascript">
  // This function is called from the pop-up menus to transfer to
  // a different page. Ignore if the value returned is a null string:
  function goPage (newURL) {

      // if url is empty, skip the menu dividers and reset the menu selection to default
      if (newURL != "") {

          // if url is "-", it is this page -- reset the menu:
          if (newURL == "-" ) {
          	resetMenu();
          }
          // else, send page to designated URL
          else {
          	document.location.href = newURL;
          }
        }
      }

// resets the menu selection upon entry to this page:
function resetMenu() {
	document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
