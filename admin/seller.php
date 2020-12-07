<?php
session_start();
include('include/config.php');
if(strlen($_SESSION['alogin'])==0)
{	
	header('location:index.php');
}
else{

	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin|  Sellers</title>
		<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link type="text/css" href="css/theme.css" rel="stylesheet">
		<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
		<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
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
									<h3>Daftar Reseller</h3><br/>
									<a href="tambahseller.php" type="button" class="btn btn-info" ><font color="white"><i class="glyphicon glyphicon-plus"></i> Add Data Reseller</font></a>
								</div>

								<div class="module-body table">
									<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama</th>
												<th>Email</th>
												<th>No.HP</th>
												<th>JK</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>

											<?php $query=mysqli_query($con,"select * from seller order by id DESC");
											$cnt=1;
											while($row=mysqli_fetch_array($query))
											{
												?>									
												<tr>
													<td><?php echo htmlentities($cnt);?></td>
													<td><?php echo htmlentities($row['nama']);?></td>
													<td><?php echo htmlentities($row['email']);?></td>
													<td><?php echo htmlentities($row['noHP']);?></td>
													<?php if($row['jeniskelamin']==1){ ?>
														<td><?php echo 'Laki-Laki' ?></td>
													<?php }else{ ?>
														<td><?php echo 'Perempuan' ?></td>
													<?php } ?>
													<td>
														<a href="seller_edit.php?id=<?php echo $row['id']; ?>" title="Edit Data" type="button" class="btn btn-sm btn-warning"><font color="white"><i class="icon-edit"></i></font></a>
														<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='action_reseller_delete.php?id=<?php echo $row['id']; ?>' }" title= "Delete Data" class="btn btn-sm btn-danger"><i class="icon-remove-sign"></i></a>

													</td>


													<?php $cnt=$cnt+1; } ?>

												</table>
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