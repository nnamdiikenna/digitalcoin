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
	$page = 'product-details';
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

			<?php 	$qp = "select * from `products` where compID = '".$_SESSION['compID']."'";


			$ap = $co->query($qp);
			$arp = $ap->fetch();
			$arps = $ap->size();
			?>

			<div class="widget-box">
				<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
					<h5>Product Details (<?php echo $arps ?>)</h5>
				</div>
				<div class="widget-content nopadding">
					<table class="table table-bordered data-table">
						<thead>
							<tr>
								<th>Name</th>
								<th>Category</th>
								<th>Subcategory</th>

								<th>Cost Price</th>
								<th>Selling Price</th>
								<th>Promo Price</th>
								<th>Qty</th>
								<th>pic</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php


							if(!empty($arp))
								do{
									?>
									<tr class="gradeX">
										<td><?php echo ucwords($arp['prodName']); ?></td>
										<td><?php echo ucwords($arp['cat']); ?></td>
										<td><?php echo ucwords($arp['subCat']); ?></td>
										<td class="center"><?php echo $arp['cp']; ?></td>
										<td class="center"><?php echo $arp['sp']; ?></td>
										<td class="center"><?php echo $arp['pp']; ?></td>
										<td class="center"><?php echo $arp['qty']; ?></td>
										<td class="center"><img style="height: 50px;" src="../prods/<?php echo $arp['pic']; ?>" alt=""></td>

										<td> &nbsp;&nbsp;&nbsp; <a href="#" class="tip-top" data-original-title="Approve"><i class="icon-ok"></i></a> &nbsp;&nbsp;&nbsp; <a href="#" class="tip-top" data-original-title="Reject"><i class="icon-remove"></i></a></td>
									</tr>
								<?php } while($arp = $ap->fetch()); ?>

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
