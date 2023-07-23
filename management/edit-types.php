<?php 
include 'conn/cos.php';


if(isset($_POST['doEdit'])){


	$name = addslashes(trim($_POST['name']));
	$minAmt = addslashes(trim($_POST['minAmt']));
	$maxAmt = addslashes(trim($_POST['maxAmt']));
	$duration = addslashes(trim($_POST['duration']));
	$interest = addslashes(trim($_POST['interest']));
	$referalAmt = addslashes(trim($_POST['referalAmt']));
	$id = addslashes(trim($_POST['id']));




	$msg = '';

  #..................CHECK EMPTY IMPORTANT FIELDS
	if($name ==''or $minAmt =='' or $maxAmt =='' or $duration =='' or $interest =='' or $referalAmt ==''){
		$msg .="All fields must be filled.";
	}
	else{

		if($msg !=''){
			$msg .="Unable to Process";
		}else{



			$qll = "UPDATE `accounttype` set name = '$name', minAmt = '$minAmt', maxAmt = '$maxAmt', duration = '$duration', interest = '$interest', referalAmt = '$referalAmt' where id = '$id'";
			$succ = $co->query($qll);


			if($succ)header("location:account-types?/Successfully-Edited");
		}
	}


}



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
	$page = 'account-types';
	include 'slice/nav.php';
	include 'slice/sidebar.php';


	$q = "select * from `accounttype` where id = '".$_REQUEST['id']."'";
	$a = $co->query($q);
	$ar = $a->fetch();
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
			
			<?php if(!empty($_REQUEST['b'])) if($_REQUEST['b']=='e'){ ?>
				<div class="alert alert-success  "> <a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading">Success!</h4>
				Product Successfully Edited </div>
			<?php } ?>
			<hr>
			<div class="row-fluid">

				<div class="span6">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
							<h5>Edit Packages</h5>
						</div>

						<div class="widget-content nopadding">
							<form action="" method="post" class="form-horizontal"  enctype="multipart/form-data">
								<div class="control-group">
									<label class="control-label"> Name:</label>
									<div class="controls">
										<input type="text" class="span11" name="name"  value="<?php echo $ar['name'] ?> "  />
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Minimum Amount:</label>
									<div class="controls">
										<input type="number" class="span11" name="minAmt" value="<?php echo $ar['minAmt'] ?>" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Maximum Amount:</label>
									<div class="controls">
										<input type="number" class="span11" name="maxAmt" value="<?php echo $ar['maxAmt'] ?>" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Duration: </label>
									<div class="controls">
										<input type="number" class="span11" name="duration" value="<?php echo $ar['duration'] ?>" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Daily Interest Rate:</label>
									<div class="controls">
										<input type="text" class="span11" name="interest" value="<?php echo $ar['interest'] ?>"  />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Referral percentage :</label>
									<div class="controls numbers">
										<input type="text" class="span11" name="referalAmt" value="<?php echo $ar['referalAmt'] ?>"  />
									</div>
								</div>


								<input type="hidden" name="id" value="<?php echo $ar['id'] ?>">
								<input type="hidden" name="doEdit" value="1">
								<div class="form-actions">
									<button type="submit" class="btn btn-success">Update</button>
									<a href="account-types" class="btn btn-danger" style="float: right;">Cancel</a>
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
