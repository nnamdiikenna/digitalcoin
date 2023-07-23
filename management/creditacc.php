<?php 
include 'conn/cos.php';


if(isset($_POST['creditacc'])){

	$uid = addslashes(trim($_POST['uid']));
	$amt = addslashes(trim($_POST['amt']));
	$transType = addslashes(trim($_POST['transType']));

	$msg = '';

  #..................CHECK EMPTY IMPORTANT FIELDS
	if($amt ==''){
		$msg .="Please enter amount";
	}
	else{

		if($msg !=''){
			$msg .="Unable to Process";
		}else{

			
			if($msg ==''){

				$q = "SELECT * from transactions where confirmed = 1 and uid = '$uid'";
				$a = $co->query($q);
				$ar = $a->fetch();
				$arr = $a->size();

				if ($transType =="credit") {
					$newbal = $ar['currentBalance'] + $amt;	 
				} else {
					$newbal = $ar['currentBalance'] - $amt;	 
				}

				
				
				$qll = "UPDATE transactions set currentBalance = '$newbal' WHERE uid = '".$uid."' ";

				$succ = $co->query($qll);
				

				if($succ)header("location:creditacc?/Successfully-Updated");
			}
		}
	}

}

if(!empty($_REQUEST['transUpl'])){

	$amt= addslashes(trim($_POST['amt'])) ;
	$transDate=  addslashes(trim($_POST['transDate'])) ;
	$notes=  addslashes(trim($_POST['notes'])) ;

	$uid = addslashes(trim($_POST['uid']));

	$transID = md5(date('his'). rand(23444,99994));
	//$datePosted = time();


	$query = "select * from `users` where uid = '".$uid."'";
	$av = $co->query($query);
	$arv = $av->fetch();


	$query2 = "select * from `accounttype` where id = '".$arv['accountType']."'";
	$av2 = $co->query($query2);
	$arv2 = $av2->fetch();

	// if($arv2['minAmt'] > $amt){

	// 	header("location:../accounts/fund-wallet?/Amount-low");
	// 	exit;
	// } 
	
	$insertSQL = "INSERT INTO payments set transID='$transID', amt='$amt', datePosted='$transDate', uid='$uid', notes='$notes', accountType='".$arv2['id']."', duration='".$arv2['duration']."', interest='".$arv2['interest']."', referalAmt='".$arv2['referalAmt']."', confirmed=0, transtype = 'debit' ";
	

	$Result1 = $co->query($insertSQL);
	header("location:creditacc?/Successfully-Updated");

	exit;
}



?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Profit Coin Traders Admin</title>
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
	$page = 'credit';
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
			<div id="breadcrumb"> <a href="index" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
		</div>
		<!--End-breadcrumbs-->

		<!--Action boxes-->
		<div class="container-fluid">



			<hr/>

			<?php
			if( uri_data('3') == "Successfully-Updated"){ ?>
				<div class="alert alert-success  "> <a class="close" data-dismiss="alert" href="#">×</a>
					<h4 class="alert-heading">Success!</h4>
				Account Successfully Updated </div>
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
							<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
								<h5>CREDIT|DEBIT ACCOUNT</h5>
							</div>

							<div class="widget-content nopadding">
								<form action="" method="post" class="form-horizontal"  enctype="multipart/form-data">

									<div class="control-group">
										<label class="control-label"> Select Account:</label>
										<div class="controls">
											<select name="uid" required="required" >
												<option value="" selected="selected">--Select Client--</option>
												<?php

												$qc = "SELECT * from `transactions` where confirmed = 1";
												$ac = $co->query($qc);
												$arc = $ac->fetch();
												$arrc = $ac->size(); 
												do{
													?>
													<option value="<?php echo $arc['uid'] ?>"><?php 
													$qs = "SELECT * from `users` where uid = '".$arc['uid']."'";
													$as = $co->query($qs);
													$ars = $as->fetch();

													echo ucfirst($ars['fname'])." ".ucfirst($ars['lname']); ?></option>
												<?php }while($arc = $ac->fetch()); ?>
											</select>
										</div>
									</div>


									<div class="control-group">
										<label class="control-label"> Transaction Type:</label>
										<div class="controls">
											<select name="transType" id="">

												<option value="credit">Credit</option>
												<option value="debit">Dedit</option>
											</select>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label"> Amount:</label>
										<div class="controls">
											<input type="number" class="span11" name="amt" required />
										</div>
									</div>



									<input type="hidden" name="id" value="<?php echo $ar['id'] ?>">
									<input type="hidden" name="creditacc" value="1">
									<div class="form-actions">
										<button type="submit" class="btn btn-success">Credit</button>
									</div>

								</div></form>
							</div> </div>

							<div class="span6">
						<div class="widget-box">
							<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
								<h5>FUND ACCOUNTS</h5>
							</div>

							<div class="widget-content nopadding">
								<form action="" method="post" class="form-horizontal"  enctype="multipart/form-data">

									<div class="control-group">
										<label class="control-label"> Select Account:</label>
										<div class="controls">
											<select name="uid" required="required" >
												<option value="" selected="selected">--Select Client--</option>
												<?php

												$qc = "SELECT * from `users` where status = 1";
												$ac = $co->query($qc);
												$arc = $ac->fetch();
												$arrc = $ac->size(); 
												do{
													?>
													<option value="<?php echo $arc['uid'] ?>"><?php 
													$qs = "SELECT * from `users` where uid = '".$arc['uid']."'";
													$as = $co->query($qs);
													$ars = $as->fetch();

													echo ucfirst($ars['fname'])." ".ucfirst($ars['lname']); ?></option>
												<?php }while($arc = $ac->fetch()); ?>
											</select>
										</div>
									</div>
									
									<div class="control-group">
										<label class="control-label"> Amount</label>
										<div class="controls">
										<input type="text" name="amt" class="form-control">
										</div>
									</div>


									<div class="control-group">
										<label class="control-label"> Transaction Date:</label>
										<div class="controls">
										<input name="transDate" type="text" class="form-control"  onfocus="(this.type='date')" onblur="if(!this.value)this.type='text'">
										</div>
									</div>

									<div class="control-group">
										<label class="control-label"> Transaction Note (Optional):</label>
										<div class="controls">
										<textarea class="form-control" rows="5" name="notes"></textarea>

										</div>
									</div>
									<p style="color:red; font-size: 16px; margin-left:20px">Note! You have to <a href="transaction-history.php">confirm</a> the payment b4 it can be recognised</p>
									<input type="hidden" value="1" name="transUpl">
								
									<div class="form-actions">
									<!-- <button class="btn btn-success">Confirm Funds</button> -->
									<button type="submit" class="btn btn-primary pull-right">Upload Payment</button>
									</div>

								</div></form>
							</div> </div>


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
