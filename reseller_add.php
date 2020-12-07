  <?php
session_start();
error_reporting(0);
include('includes/config.php');
$cid=intval($_GET['cid']);
if(isset($_GET['action']) && $_GET['action']=="add"){
	$id=intval($_GET['id']);
	if(isset($_SESSION['cart'][$id])){
		$_SESSION['cart'][$id]['quantity']++;
	}else{
		$sql_p="SELECT * FROM products WHERE id={$id}";
		$query_p=mysqli_query($con,$sql_p);
		if(mysqli_num_rows($query_p)!=0){
			$row_p=mysqli_fetch_array($query_p);
			$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);
			header('location:my-cart.php');
		}else{
			$message="Product ID is invalid";
		}
	}
}
// COde for Wishlist
if(isset($_GET['pid']) && $_GET['action']=="wishlist" ){
	if(strlen($_SESSION['login'])==0)
	{   
		header('location:login.php');
	}
	else
	{
		mysqli_query($con,"insert into wishlist(userId,productId) values('".$_SESSION['id']."','".$_GET['pid']."')");
		echo "<script>alert('Product aaded in wishlist');</script>";
		header('location:my-wishlist.php');

	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="keywords" content="MediaCenter, Template, eCommerce">
	<meta name="robots" content="all">

	<title>Kategory Produk</title>

	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link href="assets/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet">

	<!-- Customizable CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/green.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<link rel="stylesheet" href="assets/css/owl.transitions.css">
	<!--<link rel="stylesheet" href="assets/css/owl.theme.css">-->
	<link href="assets/css/lightbox.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/css/animate.min.css">
	<link rel="stylesheet" href="assets/css/rateit.css">
	<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">

	<!-- Demo Purpose Only. Should be removed in production -->
	<link rel="stylesheet" href="assets/css/config.css">

	<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
	<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
	<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
	<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
	<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
	<!-- Demo Purpose Only. Should be removed in production : END -->


	<!-- Icons/Glyphs -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Fonts --> 
	<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>

	<!-- Favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico">

	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

	<!-- HTML5 elements and media queries Support for IE8 : HTML5 shim and Respond.js -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->

	</head>
	<body class="cnt-home">

		<header class="header-style-1">

			<!-- ============================================== TOP MENU ============================================== -->
			<?php include('includes/top-header.php');?>
			<!-- ============================================== TOP MENU : END ============================================== -->
			<?php include('includes/main-header.php');?>
			<!-- ============================================== NAVBAR ============================================== -->
			<?php include('includes/menu-bar.php');?>
			<!-- ============================================== NAVBAR : END ============================================== -->

		</header>
		<!-- ============================================== HEADER : END ============================================== -->
	</div><!-- /.breadcrumb -->
	<div class="body-content outer-top-xs">
		<div class='container'>
			<div class='row outer-bottom-sm'>
				<div class='col-md-3 sidebar'>
					<!-- ================================== TOP NAVIGATION ================================== -->
					<div class="side-menu animate-dropdown outer-bottom-xs">       
						<div class="side-menu animate-dropdown outer-bottom-xs">
							<div class="head"><i class="icon fa fa-align-justify fa-fw"></i>Sub Categories</div>        
							<nav class="yamm megamenu-horizontal" role="navigation">

								<ul class="nav">
									<li class="dropdown menu-item">
										<?php $sql=mysqli_query($con,"select id,subcategory  from subcategory where categoryid='$cid'");

										while($row=mysqli_fetch_array($sql))
										{
											?>
											<a href="sub-category.php?scid=<?php echo $row['id'];?>" class="dropdown-toggle"><i class="icon fa fa-desktop fa-fw"></i>
												<?php echo $row['subcategory'];?></a>
											<?php }?>

										</li>
									</ul>
								</nav>
							</div>
						</div><!-- /.side-menu -->
						<!-- ================================== TOP NAVIGATION : END ================================== -->
						<div class="sidebar-module-container">
							<h3 class="section-title">shop by</h3>
							<div class="sidebar-filter">
								<!-- ============================================== SIDEBAR CATEGORY ============================================== -->
								<div class="sidebar-widget wow fadeInUp outer-bottom-xs ">
									<div class="widget-header m-t-20">
										<h4 class="widget-title">Category</h4>
									</div>
									<div class="sidebar-widget-body m-t-10">
										<?php $sql=mysqli_query($con,"select id,categoryName  from category");
										while($row=mysqli_fetch_array($sql))
										{
											?>
											<div class="accordion">
												<div class="accordion-group">
													<div class="accordion-heading">
														<a href="category.php?cid=<?php echo $row['id'];?>"  class="accordion-toggle collapsed">
															<?php echo $row['categoryName'];?>
														</a>
													</div>  
												</div>
											</div>
										<?php } ?>
									</div><!-- /.sidebar-widget-body -->
								</div><!-- /.sidebar-widget -->




								<!-- ============================================== COLOR: END ============================================== -->

							</div><!-- /.sidebar-filter -->
						</div><!-- /.sidebar-module-container -->
					</div><!-- /.sidebar -->
					<div class='col-md-9'>
						<!-- ========================================== SECTION – HERO ========================================= -->
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-6">
									<h3>TAMBAH DATA PENJUAL</h3>
								</div>
								<div class="col-md-6">
								</div>
							</div>
						</div>
						<br />
						<div class="search-result-container">
							<div id="myTabContent" class="tab-content">
								<div class="tab-pane active " id="grid-container">
									<div class="category-product  inner-top-vs">

										<form id="form" class="form-horizontal" action="action_reseller_add.php" method="post">
											<input type="hidden" id="id_data" name="id_data">
											<div class="form-body">
												<div class="form-group">
													<label class="control-label col-md-3">Nama</label>
													<div class="col-md-9">
														<input name="nama" id="nama" placeholder="Nama" class="form-control" type="text" required>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
											<div class="form-body">
												<div class="form-group">
													<label class="control-label col-md-3">Email</label>
													<div class="col-md-9">
														<input name="email" id="email" placeholder="Email" class="form-control" type="text" required>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
											<div class="form-body">
												<div class="form-group">
													<label class="control-label col-md-3">Nomor HP</label>
													<div class="col-md-9">
														<input name="noHP" id="noHP" placeholder="Nomor HP" class="form-control" type="text" required>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="control-label col-md-3">Jenis Kelamin</label>
												<div class="col-md-9">
													<select data-placeholder="Pilih Jenis Kelamin" name="jeniskelamin" id="jeniskelamin" class="form-control" required>
														<option value="">-- Pilih Jenis Kelamin --</option>
														<option value="1"> Laki- Laki</option>
														<option value="2"> Perempuan</option>
													</select>
												</div>
											</div>
											<div class="form-body">
												<div class="form-group">
													<label class="control-label col-md-3">Username</label>
													<div class="col-md-9">
														<input name="username" id="username" placeholder="Username" class="form-control" type="text" required>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
											<div class="form-body">
												<div class="form-group">
													<label class="control-label col-md-3">Password</label>
													<div class="col-md-9">
														<input name="password" id="password" placeholder="Password" class="form-control" type="password" required>
														<span class="help-block"></span>
													</div>
												</div>
											</div>
											<div class="form-body">
												<div class="form-group">
													<label class="control-label col-md-3">Alamat</label>
													<div class="col-md-9">
														<textarea rows="5" cols="40" class="form-control" name="alamat" required></textarea>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<div class="col-md-7">
												</div>
												<div class="col-md-5">
													<button type="submit" id="btnSave" class="btn btn-success"><font color="white"><i class="glyphicon glyphicon-file"></i> Save</font></button>
													<button type="reset" id="btnSave" class="btn btn-warning"><i class="glyphicon glyphicon-refresh"></i> Reset</button>
													<a href="reseller.php" type="button" class="btn btn-primary" ><font color="white"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</font></a>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>



					</div>
				</div>
				<?php include('includes/brands-slider.php');?>
			</div>
		</div>
		<?php include('includes/footer.php');?>
		<script src="assets/js/jquery-1.11.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/datatables/js/jquery.dataTables.min.js"></script>
		<script src="assets/datatables/js/dataTables.bootstrap.min.js"></script>

		<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
		<script src="assets/js/owl.carousel.min.js"></script>
		<script src="assets/js/echo.min.js"></script>
		<script src="assets/js/jquery.easing-1.3.min.js"></script>
		<script src="assets/js/bootstrap-slider.min.js"></script>
		<script src="assets/js/jquery.rateit.min.js"></script>
		<script type="text/javascript" src="assets/js/lightbox.min.js"></script>
		<script src="assets/js/bootstrap-select.min.js"></script>
		<script src="assets/js/wow.min.js"></script>
		<script src="assets/js/scripts.js"></script>
		<script src="switchstylesheet/switchstylesheet.js"></script>
		<script>
			$(function() {
				jQuery.fn.exists = function(){return this.length>0;}
				var table_2 = $('#example-datatables').dataTable({
					"lengthMenu": [[10, 25, 50,100, -1], [10, 25, 50,100, "All"]],
					"aoColumnDefs": [{"bSortable": false, "aTargets": [0]}]
				});

				$('.dataTables_filter input').addClass('form-control').attr('placeholder', 'Search');

			});

			$(window).bind("load", function() {
				$('.show-theme-options').delay(2000).trigger('click');
			});


		</script>
	</body>
	</html>