<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
{   
	header('location:index.php');
}
else{
// Code forProduct deletion from  wishlist	
	$wid=intval($_GET['del']);
	if(isset($_GET['del']))
	{
		$query=mysqli_query($con,"delete from wishlist where id='$wid'");
	}
	if(isset($_GET['action']) && $_GET['action']=="add"){
		$id=intval($_GET['id']);
		$query=mysqli_query($con,"delete from wishlist where productId='$id'");
		if(isset($_SESSION['cart'][$id])){
			$_SESSION['cart'][$id]['quantity']++;
		}else{
			$sql_p="SELECT * FROM products WHERE id={$id}";
			$query_p=mysqli_query($con,$sql_p);
			if(mysqli_num_rows($query_p)!=0){
				$row_p=mysqli_fetch_array($query_p);
				$_SESSION['cart'][$row_p['id']]=array("quantity" => 1, "price" => $row_p['productPrice']);	
				header('location:my-wishlist.php');
			}
			else{
				$message="Product ID is invalid";
			}
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

		<title>My Account</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">

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
		<link rel="shortcut icon" href="assets/images/favicon.ico">
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
		<div class="breadcrumb">
			<div class="container">
				<div class="breadcrumb-inner">
					<ul class="list-inline list-unstyled">
						<li><a href="home.html">Beranda</a></li>
						<li class='active'>My Account</li>
					</ul>
				</div><!-- /.breadcrumb-inner -->
			</div><!-- /.container -->
		</div><!-- /.breadcrumb -->

		<div class="body-content outer-top-bd">
			<div class="container">
				<div class="my-wishlist-page inner-bottom-sm">
					<div class="row">
						<div class="col-md-12 my-wishlist">
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th colspan="4">Detail Account</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$sql_user="SELECT * FROM users WHERE id=".$_SESSION['id'];
										$query_user=mysqli_query($con,$sql_user);
										while($row=mysqli_fetch_array($query_user)){ ?>
										<tr>
											<td><b>Nama</b></td>
											<td>:</td>
											<td><?=$row['name'];?></td>
										</tr>
										<tr>
											<td><b>Email</b></td>
											<td>:</td>
											<td><?=$row['email'];?></td>
										</tr>
										<tr>
											<td><b>Contact</b></td>
											<td>:</td>
											<td><?=$row['contactno'];?></td>
										</tr>
										<tr>
											<td><b>Alamat</b></td>
											<td>:</td>
											<td><?=$row['shippingAddress'];?></td>
										</tr>
										<tr>
											<td><b>Negara</b></td>
											<td>:</td>
											<td><?=$row['shippingState'];?></td>
										</tr>
										<tr>
											<td><b>Kota</b></td>
											<td>:</td>
											<td><?=$row['shippingCity'];?></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>			</div><!-- /.row -->
					</div><!-- /.sigin-in-->
				</div>
			</div>
			<?php include('includes/footer.php');?>

			<script src="assets/js/jquery-1.11.1.min.js"></script>

			<script src="assets/js/bootstrap.min.js"></script>

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

			<!-- For demo purposes – can be removed on production -->

			<script src="switchstylesheet/switchstylesheet.js"></script>

			<script>
				$(document).ready(function(){ 
					$(".changecolor").switchstylesheet( { seperator:"color"} );
					$('.show-theme-options').click(function(){
						$(this).parent().toggleClass('open');
						return false;
					});
				});

				$(window).bind("load", function() {
					$('.show-theme-options').delay(2000).trigger('click');
				});
			</script>
		</body>
		</html>
		<?php } ?>