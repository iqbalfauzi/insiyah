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
		<title>Admin|  Rating</title>
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
									<h3>Perhitungan Bobot</h3><br/>
									<button type="button" class="btn btn-success feed-id" data-toggle="modal"  data-target="#myModal">Proseskan Rating</button>
								</div>  
								<div class="module-body table">
									<table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
										<thead>
											<tr>
												<th>No</th>
												<th>Nama Barang</th>
												<th>Nama Kriteria</th>
												<th>Average Reting User</th> 
												<th>Hasil Bobot Reting</th> 
												<!-- <th>Action</th>	 -->
											</tr>
										</thead>
										<tbody> 

											<?php $query=mysqli_query($con,"SELECT * FROM rating_group,products,kriteria,bobot WHERE rating_group.id_barang_group=products.id AND rating_group.id_kriteria_group=kriteria.id_kriteria AND rating_group.id_kriteria_group=bobot.id_kriteria_bobot");
											$cnt=1;
											while($row=mysqli_fetch_array($query))
											{

												$update = mysqli_query($con, "UPDATE `rating_group` SET `bobot_rating`= '".$row['total_rating']*$row['bobot']."' WHERE id_penilaian_rating= '".$row['id_penilaian_rating']."'");

												?>									
												<tr>
													<td><?php echo htmlentities($cnt);?></td>
													<td><?php echo htmlentities($row['productName']);?></td>
													<td><?php echo htmlentities($row['nama_kriteria']);?></td>													 
													<td><?php echo htmlentities($row['total_rating']);?></td>											 
													<td><?php echo htmlentities($row['total_rating']*$row['bobot']);?></td>
													<!-- <td>
														<a href="seller_edit.php?id=<?php echo $row['id']; ?>" title="Edit Data" type="button" class="btn btn-sm btn-warning"><font color="white"><i class="icon-edit"></i></font></a>
														<a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='action_reseller_delete.php?id=<?php echo $row['id']; ?>' }" title= "Delete Data" class="btn btn-sm btn-danger"><i class="icon-remove-sign"></i></a>

													</td> -->

</tr>
													<?php $cnt=$cnt+1; } ?>
</tbody>

													 					</table>
											</div>
										</div>						



									</div><!--/.content-->
								</div><!--/.span9-->
							</div>

					<div id="myModal" class="modal fade" role="dialog">
					  <div class="modal-dialog modal-lg">

					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title">Rating Produk Hasil Perhitungan</h4>
					      </div>
					      
					      	<div class="modal-body"> 
					      	  <div class="module-body table-responsive">
									<table class="table table-bordered table-striped" >
										<thead>
											<tr>
												<th>No</th>
												<th>Produk</th>
												<th>Rating</th> 
											</tr>
										</thead>
										<tbody>

											<?php $query=mysqli_query($con,"select id_barang_group, productName,sum(bobot_rating) as rating from rating_group,products where rating_group.id_barang_group=products.id group by id_barang_group");
											$cnt=1;
											while($row=mysqli_fetch_array($query))
											{
												$update2 = mysqli_query($con, "UPDATE products SET rating_produk= '".$row['rating']."' WHERE id= '".$row['id_barang_group']."'");

												?>									
												<tr>
													<td><?php echo htmlentities($cnt);?></td>
													<td><?php echo htmlentities($row['productName']);?></td>
													<td><?php echo htmlentities($row['rating']);?></td>
													 
											</tr>
												<?php $cnt=$cnt+1; } ?>

											</tbody>

									</table>
								</div>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Oke</button>
					      </div>
					    </div>

					  </div>
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

						$(window).bind("load", function() {
						   $('.show-theme-options').delay(2000).trigger('click');
						});
					</script>
				</body>
				<?php } ?>