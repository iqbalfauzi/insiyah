<?php
session_start();
//error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
{   
	header('location:index.php');
}
else{
	if(isset($_POST['update']))
	{

		$id_prov=$_POST['provinsi'];
		$id_kab=$_POST['kota'];
		$id_kec=$_POST['kecamatan'];
		$id_kel=$_POST['kelurahan'];
		$alamat=$_POST['alamat'];
		$query=mysqli_query($con,"update users set id_prov='$id_prov',id_kab='$id_kab',id_kec='$id_kec',id_kel='$id_kel',alamat='$alamat' where id='".$_SESSION['id']."'");
		if($query)
		{
			echo "<script>alert('Billing Address has been updated');</script>";
		}
	}
	if(isset($_POST['shipupdate']))
	{
		$saddress=$_POST['shippingaddress'];
		$sstate=$_POST['shippingstate'];
		$scity=$_POST['shippingcity'];
		$spincode=$_POST['shippingpincode'];
		$query=mysqli_query($con,"update users set shippingAddress='$saddress',shippingState='$sstate',shippingCity='$scity',shippingPincode='$spincode' where id='".$_SESSION['id']."'");
		if($query)
		{
			echo "<script>alert('Shipping Address has been updated');</script>";
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

		<title>Akun Saya</title>

		<!-- Bootstrap Core CSS -->
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

		<link rel="stylesheet" href="asset/select2/dist/css/select2.min.css">
		
		

		<link href="assets/css/green.css" rel="alternate stylesheet" title="Green color">
		<link href="assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
		<link href="assets/css/red.css" rel="alternate stylesheet" title="Red color">
		<link href="assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
		<link href="assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color">
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
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
						<li><a href="#">Beranda</a></li>
						<li class='active'>Checkout</li>
					</ul>
				</div><!-- /.breadcrumb-inner -->
			</div><!-- /.container -->
		</div><!-- /.breadcrumb -->

		<div class="body-content outer-top-bd">
			<div class="container">
				<div class="checkout-box inner-bottom-sm">
					<div class="row">
						<div class="col-md-8">
							<div class="panel-group checkout-steps" id="accordion">
								<!-- checkout-step-01  -->
								<div class="panel panel-default checkout-step-01">

									<!-- panel-heading -->
									<div class="panel-heading">
										<h4 class="unicase-checkout-title">
											<a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
												<span>1</span>Alamat Pengiriman <?=$_SESSION['id'];?>
											</a>
										</h4>
									</div>
									<!-- panel-heading -->

									<div id="collapseOne" class="panel-collapse collapse in">

										<!-- panel-body  -->
										<div class="panel-body">
											<div class="row">		
												<div class="col-md-12 col-sm-12 already-registered-login">

													<form class="register-form" role="form" method="post">
														<div class="form-group">
															<label class="info-title" for="Billing Address">Provinsi:<span>*</span></label>		
															<?php                    
															$sql_provinsi = mysqli_query($con,"SELECT * FROM ref_prov ORDER BY id_prov ASC");
															?>
															<select class="form-control" name="provinsi" id="provinsi" required="required">
																<option value="">--Pilih Provinsi--</option>
																<?php                       
																while($rs_provinsi = mysqli_fetch_assoc($sql_provinsi)){ 
																	echo '<option value="'.$rs_provinsi['id_prov'].'">'.$rs_provinsi['nama'].'</option>';
																}                        
																?>
															</select>
														</div>
														<div class="form-group">
															<label class="info-title" for="Billing Address">Kota/Kabupaten:<span>*</span></label>

															<select class="form-control" name="kota" id="kota" required="required">
																<option></option>
															</select>
														</div>
														<div class="form-group">
															<label class="info-title" for="Billing Address">Kecamatan:<span>*</span></label>
															<select class="form-control" name="kecamatan" id="kecamatan" required="required">
																<option></option>
															</select>
														</div>
														<div class="form-group">
															<label class="info-title" for="Billing Address">Kelurahan:<span>*</span></label>
															<select class="form-control" name="kelurahan" id="kelurahan" required="required">
																<option></option>
															</select>
														</div>
														<div class="form-group">
															<label class="info-title" for="Billing Address">Alamat:<span>*</span></label>
															<textarea class="form-control unicase-form-control text-input" name="alamat" id="alamat" required="required"></textarea>
														</div>

														<button type="submit" name="update" class="btn-upper btn btn-primary checkout-page-button">Update</button>
													</form>
												</div>	
												<!-- already-registered-login -->		

											</div>			
										</div>
										<!-- panel-body  -->

									</div><!-- row -->
								</div>
								<!-- checkout-step-01  -->

							</div><!-- /.checkout-steps -->
						</div>
						<?php include('includes/myaccount-sidebar2.php');?>
					</div><!-- /.row -->
				</div><!-- /.checkout-box -->
				<?php include('includes/brands-slider.php');?>

			</div>
		</div>
		<?php include('includes/footer.php');?>
		<!-- <script src="assets/js/jquery-1.11.1.min.js"></script> -->
		<script src="asset/jquery-3.3.1.min.js"></script>
		<script src="asset/select2/dist/js/select2.min.js"></script>   
		<script src="asset/select2/dist/js/i18n/id.js"></script> 

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
			$(window).bind("load", function() {
				$('.show-theme-options').delay(2000).trigger('click');
			});


			$( document ).ready(function() {

				// $(".changecolor").switchstylesheet( { seperator:"color"} );
				// $('.show-theme-options').click(function(){
				// 	$(this).parent().toggleClass('open');
				// 	return false;
				// });

				$('#provinsi').select2({
					placeholder: 'Pilih Provinsi',
					language: "id"
				});
				$('#kota').select2({
					placeholder: 'Pilih Kota/Kabupaten',
					language: "id"
				});
				$('#kecamatan').select2({
					placeholder: 'Pilih Kecamatan',
					language: "id"
				});
				$('#kelurahan').select2({
					placeholder: 'Pilih Kelurahan',
					language: "id"
				});

				$("#provinsi").change(function(){
					// $("img#load1").show();
					var id_provinces = $(this).val(); 
					$.ajax({
						type: "POST",
						dataType: "html",
						url: "data-wilayah.php?jenis=kota",
						data: "id_prov="+id_provinces,
						success: function(msg){
							$("select#kota").html(msg);                                                       
							// $("img#load1").hide();
							// getAjaxKota();                                                        
						}
					});                    
				});  

				$("#kota").change(getAjaxKota);
				function getAjaxKota(){
					// $("img#load2").show();
					var id_regencies = $("#kota").val();
					$.ajax({
						type: "POST",
						dataType: "html",
						url: "data-wilayah.php?jenis=kecamatan",
						data: "id_kab="+id_regencies,
						success: function(msg){
							$("select#kecamatan").html(msg);                              
							// $("img#load2").hide(); 
							// getAjaxKecamatan();                                                    
						}
					});
				}

				$("#kecamatan").change(getAjaxKecamatan);
				function getAjaxKecamatan(){
					// $("img#load3").show();
					var id_district = $("#kecamatan").val();
					$.ajax({
						type: "POST",
						dataType: "html",
						url: "data-wilayah.php?jenis=kelurahan",
						data: "id_kec="+id_district,
						success: function(msg){
							$("select#kelurahan").html(msg);                              
							// $("img#load3").hide();                                                 
						}
					});
				}
			});
		</script>
	</body>
	</html>
	<?php } ?>