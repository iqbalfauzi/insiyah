
<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
{	
	header('location:index.php');
}
else{
	
	if(isset($_POST['submit']))
	{
		$nama=$_POST['nama'];
		$email=$_POST['email'];
		$NoHP=$_POST['noHP'];
		$jeniskelamin=$_POST['jeniskelamin'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$alamat=$_POST['alamat'];


//for getting product id
/* $query=mysqli_query($con,"select max(id) as pid from products");
	$result=mysqli_fetch_array($query);
	 $productid=$result['pid']+1;
	$dir="productimages/$productid";
if(!is_dir($dir)){
		mkdir("productimages/".$productid);
	}

	move_uploaded_file($_FILES["productimage1"]["tmp_name"],"productimages/$productid/".$_FILES["productimage1"]["name"]);
	move_uploaded_file($_FILES["productimage2"]["tmp_name"],"productimages/$productid/".$_FILES["productimage2"]["name"]);
	move_uploaded_file($_FILES["productimage3"]["tmp_name"],"productimages/$productid/".$_FILES["productimage3"]["name"]); */
	$sql=mysqli_query($con,"insert into seller(nama,email,noHP,jeniskelamin,username, password,alamat) values('$nama','$email','$NoHP','$jeniskelamin','$username','$password','$alamat')");
	$_SESSION['msg']="Seller Berhasil ditambahkan !!";

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Tambah Seller</title>
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
	<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>

	<script>
//function getSubcat(val) {
	//$.ajax({
	//type: "POST",
	//url: "get_subcat.php",
	//data:'cat_id='+val,
	//success: function(data){
	//	$("#subcategory").html(data);
	//}
	//});
//}
//function selectCountry(val) {
//$("#search-box").val(val);
//$("#suggesstion-box").hide();
//} 
</script>	


</head>
<body>
	<?php include('include/header.php');?>

	<div class="wrapper">
		<div class="container">
			<div class="row">
				<?php include('include/sidebar.php');?>				
				<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Tambah Seller</h3>
							</div>
							<div class="module-body">

								<?php if(isset($_POST['submit']))
								{?>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Well done!</strong>	<?php echo htmlentities($_SESSION['msg']);?><?php echo htmlentities($_SESSION['msg']="");?>
									</div>
								<?php } ?>


								<?php if(isset($_GET['del']))
								{?>
									<div class="alert alert-error">
										<button type="button" class="close" data-dismiss="alert">×</button>
										<strong>Oh snap!</strong> 	<?php echo htmlentities($_SESSION['delmsg']);?><?php echo htmlentities($_SESSION['delmsg']="");?>
									</div>
								<?php } ?>

								<br />

								<form class="form-horizontal row-fluid" name="insertproduct" action="action_reseller_add.php" method="post" enctype="multipart/form-data">


									<div class="control-group">
										<label class="control-label" for="basicinput">Nama</label>
										<div class="controls">
											<input type="text"    name="nama"  placeholder="Masukkan Nama" class="span8 tip" required>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="basicinput">Email</label>
										<div class="controls">
											<input type="text"    name="email"  placeholder="Masukkan Email" class="span8 tip" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="basicinput">No HP</label>
										<div class="controls">
											<input type="text"    name="noHP"  placeholder="Masukkan No HP" class="span8 tip" required>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="basicinput">Jenis Kelamin</label>
										<div class="controls">
											<select   name="jeniskelamin"  id="productAvailability" class="span8 tip" required>
												<option value="">Select</option>
												<option value="1">Laki-laki</option>
												<option value="2">Perempuan</option>
											</select>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="basicinput">Username</label>
										<div class="controls">
											<input type="text"    name="username"  placeholder="Masukkan Username" class="span8 tip" required>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label" for="basicinput">Password</label>
										<div class="controls">
											<input type="password"    name="password"  placeholder="Masukkan Password" class="span8 tip" required>
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="basicinput">Alamat</label>
										<div class="controls">
											<textarea  name="alamat"  placeholder="Enter Product Description" rows="6" class="span8 tip">
											</textarea>  
										</div>
									</div>



									<div class="control-group">
										<div class="controls">
											<!-- <button type="submit" name="submit" class="btn">Tambah</button> -->
											<button type="submit" id="btnSave" class="btn btn-success"><font color="white"><i class="icon-file"></i> Save</font></button>
												<a href="seller.php" type="button" class="btn btn-primary" ><font color="white"><i class="icon-chevron-left"></i> Kembali</font></a>
										</div>
									</div>
								</form>
							</div>
						</div>



						
						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->

	<?php include('include/footer.php');?>

	<script src="scripts/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="scripts/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
	<script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="scripts/flot/jquery.flot.js" type="text/javascript"></script>
	<script src="scripts/datatables/jquery.dataTables.js"></script>
	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>
</body>
<?php } ?>