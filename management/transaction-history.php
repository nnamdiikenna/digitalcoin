<?php 
include 'conn/cos.php';

$msg = uri_data('3');
?>
<!DOCTYPE html>
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
	$page = 'transaction-history';
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

		<hr/>
		<div class="container-fluid">

			<?php if(!empty($msg)){ ?>
				<div class="alert alert-success  "> <a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading">Success!</h4>
				Account Successfully Activated </div>
			<?php } ?>

			<div class="widget-box">
				<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
					<h5>Transaction History</h5>
				</div>
				<div class="widget-content nopadding">
					<table class="table table-bordered data-table">
						<thead>
							<tr>
								<th>Account Name</th>
								<th> Amount Paid</th>
								<th>Date</th>
								<th>Notes</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							<?php 
							$q = "select * from `payments`";
							$a = $co->query($q);
							$ar = $a->fetch();
							$arr = $a->size();
							do{
								?>
								<tr class="gradeX">
									<td><?php
									$qn = "select * from `users` where uid = '".$ar['uid']."'";
									$an = $co->query($qn);
									$arn = $an->fetch();
									$arrn = $an->size();

									echo ucwords($arn['fname'])." ".ucwords($arn['lname'])
									?>


								</td>
								<td>$ <?php echo number_format($ar['amt'],2)  ?></td>
								<td><?php

								echo  $ar['datePosted']  ?></td>
								<td><?php echo ucfirst($ar['notes']) ?></td>
								<td><?php
								if($ar['confirmed'] ==0){ ?>

									<span class="label label-warning"><?php echo "UNCONFIRMED"; ?></span>

								<?php }  
								if($ar['confirmed'] ==1){ ?>

									<span class="label label-success"><?php echo "CONFIRMED"; ?></span>

								<?php }  
								if($ar['confirmed'] ==3){ ?>

									<span class="label label-danger"><?php echo "SUSPENDED"; ?></span>

								<?php } ?>

							</td>
							<td> 
								<?php if($ar['confirmed'] ==0){ ?>
									&nbsp;&nbsp;&nbsp; <a onclick="return confirm('Are you sure you want to Approve this payment?')" href="approve.php?id=<?php echo $ar['id'] ?>" class="btn btn-success btn-small">CONFIRM PAYMENT 
									<?php } 
									if($ar['confirmed'] ==1){ 
										?>
										<!-- &nbsp;&nbsp;&nbsp; <a onclick="return confirm('Are you sure you want to Suspend this payment?')" href="suspend-payment.php?id=<?php echo $ar['id'] ?>" class="btn btn-warning btn-small">SUSPEND -->
										<?php } 
										if($ar['confirmed'] ==3){ 
											?>
											<!-- &nbsp;&nbsp;&nbsp; <a onclick="return confirm('Are you sure you want to unsuspend this payment?')" href="unsuspend-payment.php?id=<?php echo $ar['id'] ?>" class="btn btn-success btn-small">UNSUSPEND -->
											<?php } ?>
										</td>
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
