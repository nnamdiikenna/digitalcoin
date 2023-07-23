<?php 
include 'conn/cos.php';


if(isset($_POST['donft'])){

	$nftdetails = addslashes(trim($_POST['nftdetails']));

	$msg = '';

  #..................CHECK EMPTY IMPORTANT FIELDS
	if($nftdetails ==''){
		$msg .="Please enter nft name.";
	}
	else{

		if($msg !=''){
			$msg .="Unable to Process";
		}else{

			$uid = "nftpics";
            // $target_file = $target_dir . basename($_FILES["nftpics"]["name"]);
			$location = "../nft/";

			$name = $_FILES["file"]["name"];
			$size = $_FILES["file"]["size"];
			$type = $_FILES["file"]["type"];


			if(!empty($_FILES["file"]["name"])){

				$ext = strrchr($name, ".");

				$extt = str_replace(" ","",$ext);

				$pname = strtolower($name).$ext;
                // $pname = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

				$location = $location . basename($pname);

				if($ext !=""){

					if($ext !='.gif' and $ext !='.GIF' and $ext !='.png' and $ext !='.PNG' and $ext !='.jpg' and $ext !='.JPG' and $ext !='.jpeg' and $ext !='.JPEG' ) {
						$msg .=  "Error: Invalid Picture Format Selected. - [Allowed Format .gif, .png, .jpg, .jpeg]";



					}
				}

				
			} 
$status = $_POST['status'];
$price = $_POST['price'];
$views = $_POST['views'];
$favourite = $_POST['favourite'];

		}

		if($msg ==''){
			$qll = "INSERT INTO `nft` set nftdetails = '$nftdetails', nftpics = '$pname', status = '$status', price = '$price', views = '$views', favourite = '$favourite'";

			$succ = $co->query($qll);
			move_uploaded_file($_FILES["file"]["tmp_name"], $location);

			if($succ)header("location:nft?/Successfully-Updated");
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
	$page = 'nft';
	include 'slice/nav.php';
	include 'slice/sidebar.php';


	$q = "select * from `nft`";
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
				NFT details Successfully Updated </div>
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
								<h5>NFT Details</h5>
							</div>

							<div class="widget-content nopadding">
								<form action="" method="post" class="form-horizontal"  enctype="multipart/form-data">
									<div class="control-group">
										<label class="control-label"> NFT Address:</label>
										<div class="controls">
											<input type="text" class="span11" name="nftdetails"   />
										</div>
									</div>

									<!-- <div class="control-group">
										<label class="control-label">Current NFT:</label>
										<div class="controls numbers">
											<img src="../nft/<?php echo $ar['nftpics']; ?> " alt="">
										</div>
									</div> -->

									<div class="control-group">
										<label class="control-label">Change NFT:</label>
										<div class="controls numbers">
											<input type="file" class="span11" name="file"  />
										</div>
									</div>
                                    <div class="control-group">
										<label class="control-label">NFT Amount:</label>
										<div class="controls numbers">
											<input type="text" class="span11" name="price"  />
										</div>
									</div>
                                    <div class="control-group">
										<label class="control-label">NFT Views:</label>
										<div class="controls numbers">
											<input type="text" class="span11" name="views"  />
										</div>
									</div>
                                    <div class="control-group">
										<label class="control-label">Favourites:</label>
										<div class="controls numbers">
											<input type="text" class="span11" name="favourite"  />
										</div>
									</div>
                                    <div class="control-group">
										<label class="control-label">Status</label>
										<div class="controls numbers">
                                       
                                        <h5 style="color:green;"><input type="radio" id="on" class="span11" name="status" value="1" /> Online </h5>
                                            
                                        <h5 style="color:red;">  <input type="radio" id="off" class="span11" name="status" value="0"> Offline </h5>
										</div>
									</div>

									<input type="hidden" name="id" value="<?php echo $ar['id'] ?>">
									<input type="hidden" name="donft" value="1">
									<div class="form-actions">
										<button type="submit" class="btn btn-success">Create</button>
									</div>

								</div></form>
							</div> </div>

						



						</div>
                        <!-- All NFT's Are listed here -->
                        <div class="widget-box">
				<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
					<h5>View All NFT's </h5>
				</div>
				<div class="widget-content nopadding">
					<table class="table table-bordered data-table">
						<thead>
							<tr>
								<th>NFT Name</th>
								<th> Price</th>
								<!-- <th>Date</th> -->
								<th>Image</th>
								<th>Status</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							<?php 
							$q = "select * from `nft`";
							$a = $co->query($q);
							$ar = $a->fetch();
							$arr = $a->size();
							do{
								?>
								<tr class="gradeX">
									<td><?php
										echo ucwords($ar['nftdetails'])
									?>


								</td>
								<td>$ <?php echo number_format($ar['price'],2)  ?></td>
								

								<td><?php echo ucfirst($ar['nftpics']) ?></td>
								<td><?php
								if($ar['status'] ==0){ ?>

									<span class="label label-warning"><?php echo "OFFLINE"; ?></span>

								<?php }  
								if($ar['status'] ==1){ ?>

									<span class="label label-success"><?php echo "ONLINE"; ?></span>

								<?php }  
								 ?>

							</td>
							<td> 
								<?php if($ar['status'] ==0){ ?>
									&nbsp;&nbsp;&nbsp; <a onclick="return confirm('Are you sure you want to publish this NFT?')" href="approvenft.php?id=<?php echo $ar['id'] ?>" class="btn btn-success btn-small">PUBLISH 
									<?php } 
									if($ar['status'] ==1){ 
										?>
										&nbsp;&nbsp;&nbsp; <a onclick="return confirm('Are you sure you want to Suspend this NFT?')" href="suspend-nft.php?id=<?php echo $ar['id'] ?>" class="btn btn-warning btn-small">SUSPEND
										<?php } 
										 ?>
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
