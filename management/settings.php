<?php 
include 'conn/cos.php';


if(isset($_POST['setn'])){

	$msg = '';

	if (isset($_POST['requestID'])) {
		$requestID =1;
	}else{
		$requestID =0;
	}

	$qsettings=" UPDATE settings set requestID = '$requestID' ";
	$qsp = $co->query($qsettings);

	if($qsp)header("location:settings?/Successfully-Updated");


}

if(isset($_POST['doAdd'])){


	$name = addslashes(trim($_POST['name']));
	$minAmt = addslashes(trim($_POST['minAmt']));
	$duration = addslashes(trim($_POST['duration']));
	$interest = addslashes(trim($_POST['interest']));
	$referalAmt = addslashes(trim($_POST['referalAmt']));
	// $id = addslashes(trim($_POST['id']));




	$msg = '';

  #..................CHECK EMPTY IMPORTANT FIELDS
	if($name ==''or $minAmt =='' or $duration =='' or $interest =='' or $referalAmt ==''){
		$msg .="All fields must be filled.";
	}
	else{

		if($msg !=''){
			$msg .="Unable to Process";
		}else{



			$qll = "INSERT into `accounttype` set name = '$name', minAmt = '$minAmt', duration = '$duration', interest = '$interest', referalAmt = '$referalAmt' ";
			$succ = $co->query($qll);


			if($succ)header("location:account-types?/Successfully-Edited");
		}
	}
}

if(isset($_POST['changepass'])){

	$msg = '';
	$oldp = trim($_POST['oldp']);
	$newp = trim($_POST['newp']);
	$cnewp = trim($_POST['cnewp']);

	if($oldp == "" or $newp == "" or $cnewp == ""){
		$msg = "Please fill in all fields";

	}else if($newp != $cnewp){
		$msg = "Passwords do not match";

	}
	else{
		$q = "select * from `admin` where passme = '$oldp'";
		$a = $co->query($q);
		$ar = $a->fetch();
		$arr = $a->size();
		if($arr==0){
			$msg = 'Invalid Login Details';

		}else{

			if($msg == ''){
				$qx = "update `admin` set passme='$newp'  where passme = '$oldp'";
				$ax = $co->query($qx);
				$msg = 'Account Access change successful.';
				header("location:settings?/Successfully-Updated");
			}
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

	
	<link rel="stylesheet" href="src/css/netliva_switch.css" />
</head>
<body>


	<?php
	$page = 'settings';
	include 'slice/nav.php';
	include 'slice/sidebar.php';


	$q = "select * from `settings`";
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
			
			<?php
			if( uri_data('3') == "Successfully-Updated"){ ?>
				<div class="alert alert-success  "> <a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading">Success!</h4>
				Settings Successfully Updated </div>
			<?php } ?>

			<?php if(!empty($msg))  { ?>
				<div class="alert alert-danger  "> <a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading">Error</h4>
					<?php echo $msg; ?> </div>
				<?php } ?>
				<hr>
				<div class="row-fluid">
					<div class="span6">
						<div class="widget-box">
							<div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
								<h5>Settings list</h5>
							</div>
							<div class="widget-content">
								<div class="todo">
									<form action="" method="POST">
										<ul>
											<li class="clearfix">
												<div class="txt"> Request ID upload before first login   </div>
												<div class="pull-right">  
													<input name="requestID" type="checkbox"
													netliva-switch
													data-active-text="Yes "
													data-passive-text="No"
													data-active-color="#0A0"
													data-passive-color="#C00"
													<?php 
													if ($ar['requestID']==1) {
														echo "checked";													
													} 
													//echo $ar['requestID'];
													?>
													/> 
													<input type="hidden" name="setn" value="1">
												</div>
											</li>
											<br><br>
											<button type="submit" class="btn btn-success"> Update Settings</button>										</ul>

										</form>
									</div>
								</div>
								<div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
								<h5>Add New Account Type</h5>
							</div>
							<div class="widget-content nopadding">
							<form action="" method="post" class="form-horizontal"  enctype="multipart/form-data">
								<div class="control-group">
									<label class="control-label"> Name:</label>
									<div class="controls">
										<input type="text" class="span11" name="name"  value=" "  />
									</div>
								</div>

								<div class="control-group">
									<label class="control-label">Minimum Amount:</label>
									<div class="controls">
										<input type="number" class="span11" name="minAmt" value="" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Duration: </label>
									<div class="controls">
										<input type="number" class="span11" name="duration" value="" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Daily Interest Rate:</label>
									<div class="controls">
										<input type="text" class="span11" name="interest" value=""  />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Referral percentage :</label>
									<div class="controls numbers">
										<input type="text" class="span11" name="referalAmt" value=""  />
									</div>
								</div>


								<!-- <input type="hidden" name="id" value="<"> -->
								<input type="hidden" name="doAdd" value="1">
								<div class="form-actions">
									<button type="submit" class="btn btn-success">Add Plan</button>
									<a href="account-types" class="btn btn-danger" style="float: right;">Cancel</a>
								</div>

							</div></form>
						</div>
							</div>
						






						<div class="span6">
							<div class="widget-box">
								<div class="widget-title"> <span class="icon"><i class="icon-ok"></i></span>
									<h5>Change Admin Password</h5>
								</div>
								<div class="widget-content">
									<div class="todo">
										<form action="" method="POST">
											<ul>

												<li>
													<div class="control-group">
														<label class="control-label span3"> Old Password:</label>
														<div class="controls">
															<input type="password" class="span8" name="oldp"    />
														</div>
													</div>
												</li>
												<li>
													<div class="control-group">
														<label class="control-label span3"> New Password:</label>
														<div class="controls">
															<input type="password" class="span8" name="newp"   />
														</div>
													</div>
												</li>
												<li>
													<div class="control-group">
														<label class="control-label span3"> Confirm New Password:</label>
														<div class="controls">
															<input type="password" class="span8" name="cnewp"      />
														</div>
													</div>
												</li>

												<input type="hidden" name="changepass" value="1">

												<br><br>
												<button type="submit" class="btn btn-success"> Update Password</button>										</ul>

											</form>
										</div>
									</div>
								</div>
							</div>
							</div>
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
		<script src="js/matrix.interface.js"></script>
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

		<!-- my plugin for checkbox switch  -->
		<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
		<script src="src/js/netliva_switch.js"></script>

		<script>
			$('.textarea_editor').wysihtml5();
		</script>



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
