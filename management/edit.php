<?php 
include 'conn/cos.php';

if(isset($_GET['uid'])){$uid = $_GET['uid'];}
$query = "select * from `users` where uid = '".$uid."'";
$av = $co->query($query);
$are = $av->fetch();




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
	<link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />

	<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link rel="stylesheet" href="css/jquery.gritter.css" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>


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



			<hr/>
			<?php if(!empty($_REQUEST['b'])) if($_REQUEST['b']=='s'){ ?>
				<div class="alert alert-success  "> <a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading">Success!</h4>
				Account Successfully Updated </div>
			<?php } ?>
			<hr>
			<div class="row-fluid">

				<div class="span6">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
							<h5>Account Update</h5>

							<span class="" style="float:right">

								<a onclick=" return confirm('Are you sure you want to CANCEL editing this account?')" href="account-details.php?id=<?php echo  $id ?> " class="btn btn-warning">Cancel Editing</a></span>
							</div>

							<div class="widget-content nopadding">
								<form action="methods.php" method="post" class="form-horizontal"  enctype="multipart/form-data">
									<div class="control-group">
										<label class="control-label">First Name :</label>
										<div class="controls">
											<input type="text" class="span11" name="fname" value="<?php echo  $are['fname']; ?>">
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Last Name :</label>
										<div class="controls">
											<input type="text" class="span11" name="lname" value="<?php echo  $are['lname']; ?> " />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Email :</label>
										<div class="controls">
											<input type="text" class="span11" name="email" value="<?php echo  $are['email']; ?> "  />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Password :</label>
										<div class="controls">
											<input type="text" class="span11" name="passme"  value="<?php echo  $are['passme']; ?> "  />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Phone:</label>
										<div class="controls">
											<input type="text" class="span11" name="phone" value="<?php echo  $are['phone']; ?>"  />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Zip Code :</label>
										<div class="controls">
											<input type="text" class="span11" name="zipcode"   value="<?php echo  $are['zipcode']; ?> " />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Country:</label>
										<div class="controls">
											<input type="text" class="span11" name="country"  value="<?php echo  $are['country']; ?>" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Account Type:</label>
										<div class="controls">
											<input type="text" class="span11" name="accountType"   value="<?php echo  $are['accountType']; ?>"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Registration Date:</label>
										<div class="controls">
											<input type="text" class="span11" name="regDate"   value="<?php echo  $are['regDate']; ?>" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Confirmation Date :</label>
										<div class="controls">
											<input type="text" class="span11" name="confirmationDate"   value="<?php echo  $are['confirmationDate']; ?>" />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Last Login :</label>
										<div class="controls">
											<input type="text" class="span11" name="lastLogin"  value="<?php echo  $are['lastLogin']; ?>" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Btc Address :</label>
										<div class="controls">
											<input type="text" class="span11" name="btc"  value="<?php echo  $are['btc']; ?>" />
										</div>
									</div>

									<input type="hidden" name="uid" value="<?php echo  $uid ?>">
									<input type="hidden" name="acctedit" value="1">
									<div class="form-actions">
										<button type="submit" class="btn btn-success">Update Account</button>
									</div>

								</div></form>
							</div> </div>








						</div>
					</div>
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
<script src="js/matrix.form_common.js"></script>
<script src="js/wysihtml5-0.3.0.js"></script>
<script src="js/bootstrap-wysihtml5.js"></script>
<script>
	$('.textarea_editor').wysihtml5();
</script>
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
