<?php 
include 'conn/cos.php';


if(isset($_POST['dobtc'])){

	$btcaddress = addslashes(trim($_POST['btcaddress']));

	$msg = '';

  #..................CHECK EMPTY IMPORTANT FIELDS
	if($btcaddress ==''){
		$msg .="Please enter btc address.";
	}
	else{

		if($msg !=''){
			$msg .="Unable to Process";
		}else{

			$uid = "adminpic";
			$location = "../";

			$name = $_FILES["file"]["name"];
			$size = $_FILES["file"]["size"];
			$type = $_FILES["file"]["type"];


			if(!empty($_FILES["file"]["name"])){

				$ext = strrchr($name, ".");

				$extt = str_replace(" ","",$ext);

				$pname = strtolower($uid).$ext;

				$location = $location . basename($pname);

				if($ext !=""){

					if($ext !='.gif' and $ext !='.GIF' and $ext !='.png' and $ext !='.PNG' and $ext !='.jpg' and $ext !='.JPG' and $ext !='.jpeg' and $ext !='.JPEG' ) {
						$msg .=  "Error: Invalid Picture Format Selected. - [Allowed Format .gif, .png, .jpg, .jpeg]";



					}
				}

				
			} 

		}

		if($msg ==''){
			$qll = "UPDATE `settings` set btcAddress = '$btcaddress', qrCode = '$pname'";

			$succ = $co->query($qll);
			move_uploaded_file($_FILES["file"]["tmp_name"], $location);

			if($succ)header("location:btc?/Successfully-Updated");
		}
	}
}

if(isset($_POST['dobch'])){

	$bchaddress = addslashes(trim($_POST['bchaddress']));

	$msg = '';

  #..................CHECK EMPTY IMPORTANT FIELDS
	if($bchaddress ==''){
		$msg .="Please enter bch address.";
	}
	else{

		if($msg !=''){
			$msg .="Unable to Process";
		}else{

			$uid = "adminbch";
			$location = "../";

			$name = $_FILES["file"]["name"];
			$size = $_FILES["file"]["size"];
			$type = $_FILES["file"]["type"];


			if(!empty($_FILES["file"]["name"])){

				$ext = strrchr($name, ".");

				$extt = str_replace(" ","",$ext);

				$pname = strtolower($uid).$ext;

				$location = $location . basename($pname);

				if($ext !=""){

					if($ext !='.gif' and $ext !='.GIF' and $ext !='.png' and $ext !='.PNG' and $ext !='.jpg' and $ext !='.JPG' and $ext !='.jpeg' and $ext !='.JPEG' ) {
						$msg .=  "Error: Invalid Picture Format Selected. - [Allowed Format .gif, .png, .jpg, .jpeg]";



					}
				}

				
			} 

		}

		if($msg ==''){
			$qll = "UPDATE `settings` set bchAddress = '$bchaddress', qrCode1 = '$pname'";

			$succ = $co->query($qll);
			move_uploaded_file($_FILES["file"]["tmp_name"], $location);

			if($succ)header("location:btc?/Successfully-Updated");
		}
	}
}

if(isset($_POST['dousdt'])){

	$usdtron = addslashes(trim($_POST['usdtron']));

	$msg = '';

  #..................CHECK EMPTY IMPORTANT FIELDS
	if($usdtron ==''){
		$msg .="Please enter usdt address.";
	}
	else{

		if($msg !=''){
			$msg .="Unable to Process";
		}else{

			$uid = "adminusdt";
			$location = "../";

			$name = $_FILES["file"]["name"];
			$size = $_FILES["file"]["size"];
			$type = $_FILES["file"]["type"];


			if(!empty($_FILES["file"]["name"])){

				$ext = strrchr($name, ".");

				$extt = str_replace(" ","",$ext);

				$pname = strtolower($uid).$ext;

				$location = $location . basename($pname);

				if($ext !=""){

					if($ext !='.gif' and $ext !='.GIF' and $ext !='.png' and $ext !='.PNG' and $ext !='.jpg' and $ext !='.JPG' and $ext !='.jpeg' and $ext !='.JPEG' ) {
						$msg .=  "Error: Invalid Picture Format Selected. - [Allowed Format .gif, .png, .jpg, .jpeg]";



					}
				}

				
			} 

		}

		if($msg ==''){
			$qll = "UPDATE `settings` set usdtron = '$usdtron', qrCode2 = '$pname'";

			$succ = $co->query($qll);
			move_uploaded_file($_FILES["file"]["tmp_name"], $location);

			if($succ)header("location:btc?/Successfully-Updated");
		}
	}
}

if(isset($_POST['doeth'])){

	$ethaddress = addslashes(trim($_POST['ethAddress']));

	$msg = '';

  #..................CHECK EMPTY IMPORTANT FIELDS
	if($ethaddress ==''){
		$msg .="Please enter eth address.";
	}
	else{

		if($msg !=''){
			$msg .="Unable to Process";
		}else{

			$uid = "admineth";
			$location = "../";

			$name = $_FILES["file"]["name"];
			$size = $_FILES["file"]["size"];
			$type = $_FILES["file"]["type"];


			if(!empty($_FILES["file"]["name"])){

				$ext = strrchr($name, ".");

				$extt = str_replace(" ","",$ext);

				$pname = strtolower($uid).$ext;

				$location = $location . basename($pname);

				if($ext !=""){

					if($ext !='.gif' and $ext !='.GIF' and $ext !='.png' and $ext !='.PNG' and $ext !='.jpg' and $ext !='.JPG' and $ext !='.jpeg' and $ext !='.JPEG' ) {
						$msg .=  "Error: Invalid Picture Format Selected. - [Allowed Format .gif, .png, .jpg, .jpeg]";



					}
				}

				
			} 

		}

		if($msg ==''){
			$qll = "UPDATE `settings` set ethAddress = '$ethaddress', qrCode3 = '$pname'";
			// $qll = "UPDATE `settings` set ethAddress = '$ethaddress', qrCode = '$pname'";
			$succ = $co->query($qll);
			move_uploaded_file($_FILES["file"]["tmp_name"], $location);

			if($succ)header("location:btc?/Successfully-Updated");
		}
	}
}

if(isset($_POST['dopay'])){

	$payoneer = addslashes(trim($_POST['payoneer']));

	$msg = '';

  #..................CHECK EMPTY IMPORTANT FIELDS
	if($payoneer ==''){
		$msg .="Please enter Payoneer address.";
	}
	else{

		if($msg !=''){
			$msg .="Unable to Process";
		}else{

			$uid = "adminpay";
			$location = "../";

			$name = $_FILES["file"]["name"];
			$size = $_FILES["file"]["size"];
			$type = $_FILES["file"]["type"];


			if(!empty($_FILES["file"]["name"])){

				$ext = strrchr($name, ".");

				$extt = str_replace(" ","",$ext);

				$pname = strtolower($uid).$ext;

				$location = $location . basename($pname);

				if($ext !=""){

					if($ext !='.gif' and $ext !='.GIF' and $ext !='.png' and $ext !='.PNG' and $ext !='.jpg' and $ext !='.JPG' and $ext !='.jpeg' and $ext !='.JPEG' ) {
						$msg .=  "Error: Invalid Picture Format Selected. - [Allowed Format .gif, .png, .jpg, .jpeg]";



					}
				}

				
			} 

		}

		if($msg ==''){
			$qll = "UPDATE `settings` set payoneer = '$payoneer', qrCode4 = '$pname'";
			$succ = $co->query($qll);
			move_uploaded_file($_FILES["file"]["tmp_name"], $location);

			if($succ)header("location:btc?/Successfully-Updated");
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
	$page = 'btc';
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
				Btc Address Successfully Updated </div>
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
								<h5>BTC ADDRESS</h5>
							</div>

							<div class="widget-content nopadding">
								<form action="" method="post" class="form-horizontal"  enctype="multipart/form-data">
									<div class="control-group">
										<label class="control-label"> BTC Address:</label>
										<div class="controls">
											<input type="text" class="span11" name="btcaddress" value="<?php echo $ar['btcAddress'] ?> "  />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Current QR Code:</label>
										<div class="controls numbers">
											<img src="../<?php echo $ar['qrCode']; ?> " alt="">
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Change QR Code:</label>
										<div class="controls numbers">
											<input type="file" class="span11" name="file"  />
										</div>
									</div>


									<input type="hidden" name="id" value="<?php echo $ar['id'] ?>">
									<input type="hidden" name="dobtc" value="1">
									<div class="form-actions">
										<button type="submit" class="btn btn-success">Update</button>
									</div>

								</div></form>
							</div> </div>

							<div class="span6">
						<div class="widget-box">
							<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
								<h5>BITCOIN CASH</h5>
							</div>

							<div class="widget-content nopadding">
								<form action="" method="post" class="form-horizontal"  enctype="multipart/form-data">
									<div class="control-group">
										<label class="control-label"> BCH Address:</label>
										<div class="controls">
											<input type="text" class="span11" name="bchaddress" value="<?php echo $ar['bchAddress'] ?> "  />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Current QR Code:</label>
										<div class="controls numbers">
											<img src="../<?php echo $ar['qrCode1']; ?> " alt="">
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Change QR Code:</label>
										<div class="controls numbers">
											<input type="file" class="span11" name="file"  />
										</div>
									</div>


									<input type="hidden" name="id" value="<?php echo $ar['id'] ?>">
									<input type="hidden" name="dobch" value="1">
									<div class="form-actions">
										<button type="submit" class="btn btn-success">Update</button>
									</div>

								</div></form>
							</div> </div>

							<div class="span6">
						<div class="widget-box">
							<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
								<h5>USDT TRON</h5>
							</div>

							<div class="widget-content nopadding">
								<form action="" method="post" class="form-horizontal"  enctype="multipart/form-data">
									<div class="control-group">
										<label class="control-label"> USDT Address:</label>
										<div class="controls">
											<input type="text" class="span11" name="usdtron" value="<?php echo $ar['usdtron'] ?> "  />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Current QR Code:</label>
										<div class="controls numbers">
											<img src="../<?php echo $ar['qrCode2']; ?> " alt="">
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Change QR Code:</label>
										<div class="controls numbers">
											<input type="file" class="span11" name="file"  />
										</div>
									</div>


									<input type="hidden" name="id" value="<?php echo $ar['id'] ?>">
									<input type="hidden" name="dousdt" value="1">
									<div class="form-actions">
										<button type="submit" class="btn btn-success">Update</button>
									</div>

								</div></form>
							</div> </div>

							<div class="span6">
						<div class="widget-box">
							<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
								<h5> ETHREREUM ADDRESS</h5>
							</div>

							<div class="widget-content nopadding">
								<form action="" method="post" class="form-horizontal"  enctype="multipart/form-data">
									<div class="control-group">
										<label class="control-label"> ETH Address:</label>
										<div class="controls">
											<input type="text" class="span11" name="ethAddress" value="<?php echo $ar['ethAddress'] ?> "  />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Current QR Code:</label>
										<div class="controls numbers">
											<img src="../<?php echo $ar['qrCode3']; ?> " alt="">
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Change QR Code:</label>
										<div class="controls numbers">
											<input type="file" class="span11" name="file"  />
										</div>
									</div>


									<input type="hidden" name="id" value="<?php echo $ar['id'] ?>">
									<input type="hidden" name="doeth" value="1">
									<div class="form-actions">
										<button type="submit" class="btn btn-success">Update</button>
									</div>

								</div></form>
							</div> </div>


							<div class="span6">
						<div class="widget-box">
							<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
								<h5> PAYONEER ACCOUNT</h5>
							</div>

							<div class="widget-content nopadding">
								<form action="" method="post" class="form-horizontal"  enctype="multipart/form-data">
									<div class="control-group">
										<label class="control-label"> PAYONEER Account:</label>
										<div class="controls">
											<input type="text" class="span11" name="payoneer" value="<?php echo $ar['payoneer'] ?> "  />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Other Details:</label>
										<div class="controls numbers">
											<img src="../<?php echo $ar['qrCode4']; ?> " alt="">
										</div>
									</div>

									<div class="control-group">
										<label class="control-label">Change QR Code:</label>
										<div class="controls numbers">
											<input type="file" class="span11" name="file"  />
										</div>
									</div>


									<input type="hidden" name="id" value="<?php echo $ar['id'] ?>">
									<input type="hidden" name="dopay" value="1">
									<div class="form-actions">
										<button type="submit" class="btn btn-success">Update</button>
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
