<?php 
include 'conn/cos.php';

if(isset($_GET['uid'])){$uid = $_GET['uid'];}
$query = "select * from `users` where uid = '".$uid."'";
$av = $co->query($query);
$arv = $av->fetch();
//$msg = uri_data('3');

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

		<hr/>
		<div class="container-fluid">

			<?php if(isset($_GET['b']) and $_GET['b']=='e'){ ?>
				<div class="alert alert-success  "> <a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading">Success!</h4>
				Account Successfully Updated </div>
			<?php } ?>

			<div class="widget-box">
				<div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
					<h5>Account Details</h5>
					<span class="" style="float:right">
						<a href="edit.php?uid=<?php echo  $uid ?> " class="btn btn-info">Edit</a>
						<?php if($arv['status'] == 1) { ?>
							<a onclick=" return confirm('Are you sure you want to SUSPEND this account?')" href="suspend.php?uid=<?php echo $arv['uid'] ?> " class="btn btn-warning">Suspend</a>
						<?php }else{ ?>	
							<a onclick=" return confirm('Are you sure you want to ACTIVATE this account?')" href="activate.php?uid=<?php echo $arv['uid'] ?> " class="btn btn-success">Activate</a>
						<?php } ?>
						<a onclick=" return confirm('Are you sure you want to DELETE this account?')" href="delete.php?uid=<?php echo  $uid ?> " class="btn btn-danger">Delete</a>
					</span>
				</div>
				<div class="widget-content nopadding">
					<table class="table table-bordered table-striped">

						<tbody>
							<tr>

								<td>
									<style>
									.info{
										border-bottom: 1px dashed #ccc;
										display: block;
										clear: both;
										font-weight: bold;
									}
									p span.span2{
										font-weight: 100;
									}

								</style>
								<p  class="info"><span class="span2">First Name:</span>&nbsp; <?php echo $arv['fname'] ?> </p> 
								<p class="info"><span class="span2">Last Name:</span>&nbsp;  <?php echo $arv['lname'] ?> 	</p>
								<p class="info"><span class="span2">Email:</span>&nbsp;   <?php echo $arv['email'] ?> 	</p>
								<p class="info"><span class="span2">Password:</span>&nbsp; <?php echo $arv['passme'] ?>	</p>
								<p class="info"><span class="span2">Phone:</span> &nbsp; <?php echo $arv['phone'] ?></p>
								<p class="info"><span class="span2">Zipcode:</span> &nbsp; <?php echo $arv['zipcode'] ?> 	</p>
								<p class="info"><span class="span2">Country:</span>&nbsp;  <?php echo $arv['country'] ?> </p>
								<span class="span2">Valid ID:</span><img src="../en/upl/<?php echo $arv['pic']; ?>" alt="" style="width: 70%;">

							</td>
							<td>
								<p class="info"><span class="span2">Account Type:</span>&nbsp;  <?php 
								$query_acc = "select * from `accounttype` where id = '".$arv['accountType']."'";
								$avc = $co->query($query_acc);
								$arvc = $avc->fetch();

								echo strtoupper($arvc['name']); ?>  	</p>
								<p class="info"><span class="span2">Referrer:</span> &nbsp;  <?php


								$query_ref= "select * from `users` where uid = '".$arv['referrer']."'";
								$avrr = $co->query($query_ref);
								$arvref = $avrr->fetch();

								echo ucwords($arvref['fname'])." ".ucwords($arvref['lname'])." (". $arv['referrer'].")"; ?>	</p>
								<p class="info"><span class="span2">Status:</span> &nbsp; <?php if($arv['status'] == 0) { ?>							
									<span class="badge badge-warning">Pending</span>
								<?php } ?>

								<?php if($arv['status'] == 1) { ?>							
									<span class="badge badge-success">Active</span>
								<?php } ?>
								<?php if($arv['status'] == 2) { ?>							
									<span class="badge badge">Suspended</span>
									<?php } ?> 	</p>
									<p class="info"><span class="span2">Date Registered:</span> &nbsp;  <?php echo date('d-m-Y', $arv['regDate'])?></p>
									<p class="info"><span class="span2">Confirmation Date:</span>&nbsp; <?php if(isset($arv['confirmationDate'])) echo date('d-m-Y', $arv['confirmationDate']) ?>	</p>
									<p class="info"><span class="span2">Last Login:</span>&nbsp;  <?php if(isset($arv['lastLogin	'])) echo  date('d-m-Y', $arv['lastLogin']) ?>  </p>
									<p class="info"><span class="span2">Btc Address:</span> &nbsp; <?php echo $arv['btc'] ?>  </p>
								</td>

							</tr>


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
