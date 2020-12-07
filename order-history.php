<?php 
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
    {   
header('location:login.php');
}
else{
 // INSERT RATING USER PER BARANG
if (isset($_POST['submit'])) { 
		$query1 =  mysqli_query($con,"insert into penilaian_rating (id_barang_penilaian, id_kriteria_penilaian, id_user_penilaian, rating_user, tanggal_penilaian) values('".$_POST['id_barang']."','1','{$_SESSION['id']}',".$_POST['hrateYoHarga'].",now() )");
		$query2 =  mysqli_query($con,"insert into penilaian_rating (id_barang_penilaian, id_kriteria_penilaian, id_user_penilaian, rating_user, tanggal_penilaian) values('".$_POST['id_barang']."','2','{$_SESSION['id']}',".$_POST['hrateYoKualitas'].",now())");
		$query3 =  mysqli_query($con,"insert into penilaian_rating (id_barang_penilaian, id_kriteria_penilaian, id_user_penilaian, rating_user, tanggal_penilaian) values('".$_POST['id_barang']."','3','{$_SESSION['id']}',".$_POST['hrateYoMerk'].",now())");
		$query4 =  mysqli_query($con,"insert into penilaian_rating (id_barang_penilaian, id_kriteria_penilaian, id_user_penilaian, rating_user, tanggal_penilaian) values('".$_POST['id_barang']."','4','{$_SESSION['id']}',".$_POST['hrateYoKecepatan'].",now())");
		$query5 =  mysqli_query($con,"insert into penilaian_rating (id_barang_penilaian, id_kriteria_penilaian, id_user_penilaian, rating_user, tanggal_penilaian) values('".$_POST['id_barang']."','5','{$_SESSION['id']}',".$_POST['hrateYoRespon'].",now())");
		$query6 =  mysqli_query($con,"insert into penilaian_rating (id_barang_penilaian, id_kriteria_penilaian, id_user_penilaian, rating_user, tanggal_penilaian) values('".$_POST['id_barang']."','6','{$_SESSION['id']}',".$_POST['hrateYoStrategi'].",now())");
		$query7 =  mysqli_query($con,"insert into penilaian_rating (id_barang_penilaian, id_kriteria_penilaian, id_user_penilaian, rating_user, tanggal_penilaian) values('".$_POST['id_barang']."','7','{$_SESSION['id']}',".$_POST['hrateYoKemudahan'].",now())");
		 
	
	if($query7){ 
 			// CARI NILAI AVARAGE RATING USER PER KRITERIA
			$result1 = mysqli_query($con, "SELECT sum(rating_user)/count(id_barang_penilaian) as hasil1 FROM penilaian_rating where id_kriteria_penilaian='1' GROUP by id_barang_penilaian"); 
			$row1 = mysqli_fetch_assoc($result1);
			$result2 = mysqli_query($con, "SELECT sum(rating_user)/count(id_barang_penilaian) as hasil2 FROM penilaian_rating where id_kriteria_penilaian='2' GROUP by id_barang_penilaian"); 
			$row2 = mysqli_fetch_assoc($result2);
			$result3 = mysqli_query($con, "SELECT sum(rating_user)/count(id_barang_penilaian) as hasil3 FROM penilaian_rating where id_kriteria_penilaian='3' GROUP by id_barang_penilaian"); 
			$row3 = mysqli_fetch_assoc($result3);
			$result4 = mysqli_query($con, "SELECT sum(rating_user)/count(id_barang_penilaian) as hasil4 FROM penilaian_rating where id_kriteria_penilaian='4' GROUP by id_barang_penilaian"); 
			$row4 = mysqli_fetch_assoc($result4);
			$result5 = mysqli_query($con, "SELECT sum(rating_user)/count(id_barang_penilaian) as hasil5 FROM penilaian_rating where id_kriteria_penilaian='5' GROUP by id_barang_penilaian"); 
			$row5 = mysqli_fetch_assoc($result5);
			$result6 = mysqli_query($con, "SELECT sum(rating_user)/count(id_barang_penilaian) as hasil6 FROM penilaian_rating where id_kriteria_penilaian='6' GROUP by id_barang_penilaian"); 
			$row6 = mysqli_fetch_assoc($result6);
			$result7 = mysqli_query($con, "SELECT sum(rating_user)/count(id_barang_penilaian) as hasil7 FROM penilaian_rating where id_kriteria_penilaian='7' GROUP by id_barang_penilaian"); 
			$row7 = mysqli_fetch_assoc($result7);
			 
			if($result7){
				// CEK DATA RATING
				$query=mysqli_query($con,"SELECT * FROM rating_group where id_barang_group='".$_POST['id_barang']."'");
				$num=mysqli_num_rows($query);

				if($num>0){
					// UPDATE DATA AVAREGE RATING
					$update1 = mysqli_query($con, "UPDATE `rating_group` SET `total_rating`= '".$row1['hasil1']."' WHERE id_kriteria_group= '1' ");
					$update2 = mysqli_query($con, "UPDATE `rating_group` SET `total_rating`= '".$row2['hasil2']."' WHERE id_kriteria_group= '2' ");
				 	$update3 = mysqli_query($con, "UPDATE `rating_group` SET `total_rating`= '".$row3['hasil3']."' WHERE id_kriteria_group= '3' ");
				 	$update4 = mysqli_query($con, "UPDATE `rating_group` SET `total_rating`= '".$row4['hasil4']."' WHERE id_kriteria_group= '4' ");
				 	$update5 = mysqli_query($con, "UPDATE `rating_group` SET `total_rating`= '".$row5['hasil5']."' WHERE id_kriteria_group= '5' ");
				 	$update6 = mysqli_query($con, "UPDATE `rating_group` SET `total_rating`= '".$row6['hasil6']."' WHERE id_kriteria_group= '6' ");
				 	$update7 = mysqli_query($con, "UPDATE `rating_group` SET `total_rating`= '".$row7['hasil7']."' WHERE id_kriteria_group= '7' ");

				 	if($update7){
 

						echo "<script>alert('Terima kasih telah melakukan penilaian pada produk kami');</script>";
				 	}
				}else{
					$query11 =  mysqli_query($con,"insert into rating_group (id_barang_group, id_kriteria_group, total_rating) values('".$_POST['id_barang']."','1','".$row1['hasil1']."')");
					$query12 =  mysqli_query($con,"insert into rating_group (id_barang_group, id_kriteria_group, total_rating) values('".$_POST['id_barang']."','2','".$row2['hasil2']."')");
					$query13 =  mysqli_query($con,"insert into rating_group (id_barang_group, id_kriteria_group, total_rating) values('".$_POST['id_barang']."','3','".$row3['hasil3']."')");
					$query14 =  mysqli_query($con,"insert into rating_group (id_barang_group, id_kriteria_group, total_rating) values('".$_POST['id_barang']."','4','".$row4['hasil4']."')");
					$query15 =  mysqli_query($con,"insert into rating_group (id_barang_group, id_kriteria_group, total_rating) values('".$_POST['id_barang']."','5','".$row5['hasil5']."')");
					$query16 =  mysqli_query($con,"insert into rating_group (id_barang_group, id_kriteria_group, total_rating) values('".$_POST['id_barang']."','6','".$row6['hasil6']."')");
					$query17 =  mysqli_query($con,"insert into rating_group (id_barang_group, id_kriteria_group, total_rating) values('".$_POST['id_barang']."','7','".$row7['hasil7']."')");
		 			
		 			if($query17){

						echo "<script>alert('Terima kasih telah melakukan penilaian pada produk kami');</script>";
				 	}
				}
				
					 

			}	
		




	}else{

		echo "<script>alert('Not register something went worng');</script>";

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

	    <title>Riwayat Pemesanan</title>
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
		<link rel="stylesheet" href="assets/css/font-awesome.min.css">
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link rel="shortcut icon" href="assets/images/favicon.ico">
 		<link rel="stylesheet" href="assets/rateyorating/jquery.rateyo.css"/>

	<script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>

	</head>
    <body class="cnt-home">
	
		
	
		<!-- ============================================== HEADER ============================================== -->
<header class="header-style-1">
<?php include('includes/top-header.php');?>
<?php include('includes/main-header.php');?>
<?php include('includes/menu-bar.php');?>
</header>
<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Beranda</a></li>
				<li class='active'>Keranjang Belanja</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
		<div class="row inner-bottom-sm">
			<div class="shopping-cart">
				<div class="col-md-12 col-sm-12 shopping-cart-table ">
	<div class="table-responsive">
<form name="cart" method="post">	

		<table class="table table-bordered">
			<thead>
				<tr>
					<th class="cart-romove item">#</th>
					<th class="cart-description item">Gambar</th>
					<th class="cart-product-name item">Nama Produk</th>
			
					<th class="cart-qty item">Jumlah per barang</th>
					<th class="cart-sub-total item">Harga per barang</th>
					<th class="cart-sub-total item">Ongkos kirim</th>
					<th class="cart-total item">Total</th>
					<th class="cart-total item">Metode Pembayaran</th>
					<th class="cart-description item">Tanggal Pemesanan</th>
					<th class="cart-total last-item">Aksi</th>
					<th class="cart-star last-item">Penilaian</th>
				</tr>
			</thead><!-- /thead -->
			
			<tbody>

<?php $query=mysqli_query($con,"select products.productImage1 as pimg1,products.id as id_barang_group,products.productName as pname,products.id as proid,orders.productId as opid,orders.quantity as qty,products.productPrice as pprice,products.shippingCharge as shippingcharge,orders.paymentMethod as paym,orders.orderDate as odate,orders.id as orderid from orders join products on orders.productId=products.id where orders.userId='".$_SESSION['id']."' and orders.paymentMethod is not null");
$cnt=1;
while($row=mysqli_fetch_array($query))
{
?>
				<tr>
					<td><?php echo $cnt;?></td>
					<td class="cart-image">
						<a class="entry-thumbnail" href="detail.html">
						    <img src="admin/productimages/<?php echo $row['proid'];?>/<?php echo $row['pimg1'];?>" alt="" width="84" height="146">
						</a>
					</td>
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="product-details.php?pid=<?php echo $row['opid'];?>">
						<?php echo $row['pname'];?></a></h4>
						
						
					</td>
					<td class="cart-product-quantity">
						<?php echo $qty=$row['qty']; ?>   
		            </td>
					<td class="cart-product-sub-total"><?php echo $price=$row['pprice']; ?>  </td>
					<td class="cart-product-sub-total"><?php echo $shippcharge=$row['shippingcharge']; ?>  </td>
					<td class="cart-product-grand-total"><?php echo (($qty*$price)+$shippcharge);?></td>
					<td class="cart-product-sub-total"><?php echo $row['paym']; ?>  </td>
					<td class="cart-product-sub-total"><?php echo $row['odate']; ?>   
					
					<td>
 					<a href="javascript:void(0);" onClick="popUpWindow('track-order.php?oid=<?php echo htmlentities($row['orderid']);?>');" title="Track order">
					<button type="button" class="btn btn-info btn-ms">Lacak</button>					
					</td>
					 <td><button type="button" class="btn btn-success feed-id" data-toggle="modal" data-id="<?php echo $row['id_barang_group']; ?>" data-target="#myModal">Nilai Rating</button>
</td>
				</tr>
<?php $cnt=$cnt+1;} ?>
				
			</tbody><!-- /tbody -->
		</table><!-- /table -->
		
	</div>
</div>

		</div><!-- /.shopping-cart -->
		</div> <!-- /.row -->
		</form>

		<!-- Modal -->
		<div id="myModal" class="modal fade" role="dialog">
		  <div class="modal-dialog">

		    <!-- Modal content-->
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <h4 class="modal-title">Silahkan masukkan Penilaian Anda</h4>
		      </div>
		      <div class="modal-body"> 
		      	<table>
		      	<tr>
		      		<td><label>Penilaian Harga : </label></td>
		      		<td><div id="rateYoHarga" ></div></td> 
		      		<!-- <td><div id="hrateYoHarga">0</div></td> -->
		      	</tr>
		      	<tr>
		      		<td><label>Penilaian Kualitas Barang : </label></td>
		      		<td><div id="rateYoKualitas"></div></td>
		      		<!-- <td><div id="hrateYoKualitas">0</div></td> -->
		      	</tr>
		      	<tr>
		      		<td><label>Penilaian Merk : </label></td>
		      		<td><div id="rateYoMerk"></div></td>
		      		<!-- <td><div id="hrateYoMerk">0</div></td> -->
		      	</tr>
		      	<tr>
		      		<td><label>Penilaian Kecepatan Pengiriman : </label></td>
		      		<td><div id="rateYoKecepatan"></div></td>
		      		<!-- <td><div id="hrateYoKecepatan">0</div></td> -->
		      	</tr>
		      	<tr>
		      		<td><label>Penilaian Respon Penjual : </label></td>
		      		<td><div id="rateYoRespon"></div></td>
		      		<!-- <td><div id="hrateYoRespon">0</div></td> -->
		      	</tr>
		      	<tr>
		      		<td><label>Penilaian Strategi Promosi : </label></td>
		      		<td><div id="rateYoStrategi"></div></td> 
		      	</tr>
		      	<tr>
		      		<td><label>Penilaian Kemudahan Bertransaksi : </label></td>
		      		<td><div id="rateYoKemudahan"></div></td>
		      		<!-- <td><div id="hrateYoKemudahan">0</div></td> -->
		      	</tr> 
		      	</table>
		      </div>
		      <div class="modal-footer">
		      	 <form name="ratingpost" method="post">
				    <input type="hidden" id="hrateYoHarga" name="hrateYoHarga" value="" >
				    <input type="hidden" id="hrateYoKualitas" name="hrateYoKualitas">
				    <input type="hidden" id="hrateYoMerk" name="hrateYoMerk">
				    <input type="hidden" id="hrateYoKecepatan" name="hrateYoKecepatan">
				    <input type="hidden" id="hrateYoRespon" name="hrateYoRespon">
				    <input type="hidden" id="hrateYoStrategi" name="hrateYoStrategi">
				    <input type="hidden" id="hrateYoKemudahan" name="hrateYoKemudahan">
				    <input type="hidden" id="id_barang" name="id_barang">
				    <input type="submit" value="submit" name="submit" class="btn btn-primary">				    	

				    </form>		
		      </div>
		    </div>

		  </div>
		</div>
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
<?php echo include('includes/brands-slider.php');?>
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->
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
	 
  	<script src="assets/rateyorating/jquery.rateyo.js"></script>
	
	<script>
 
		
		$(function () { 
		  $("#rateYoHarga").rateYo({				   
		   		 fullStar: true 
			})
              .on("rateyo.change", function (e, data) {
 
                var rating = data.rating;  
              	document.getElementById("hrateYoHarga").value=rating;
            });     
		});

		$(function () { 
		  $("#rateYoKualitas").rateYo({				   
		   		 fullStar: true 
			})
              .on("rateyo.change", function (e, data) {
                var rating = data.rating; 
              	document.getElementById("hrateYoKualitas").value=rating;
              });
		});

		$(function () { 
		  $("#rateYoMerk").rateYo({				   
		   		 fullStar: true 
			})
              .on("rateyo.change", function (e, data) { 
                var rating = data.rating; 
              	document.getElementById("hrateYoMerk").value=rating;
              });
		});

		$(function () { 
		  $("#rateYoKecepatan").rateYo({				   
		   		 fullStar: true 
			})
              .on("rateyo.change", function (e, data) {
                var rating = data.rating; 
              	document.getElementById("hrateYoKecepatan").value=rating;
              });
		});

		$(function () { 
		  $("#rateYoRespon").rateYo({				   
		   		 fullStar: true 
			})
              .on("rateyo.change", function (e, data) {
                var rating = data.rating; 
              	document.getElementById("hrateYoRespon").value=rating;
              });
		});

		$(function () { 
		  $("#rateYoStrategi").rateYo({				   
		   		 fullStar: true 
			})
              .on("rateyo.change", function (e, data) {
                var rating = data.rating; 
              	document.getElementById("hrateYoStrategi").value=rating;
              });
		});

		$(function () { 
		  $("#rateYoKemudahan").rateYo({				   
		   		 fullStar: true 
			})

		  	.on("rateyo.change", function (e, data) {

            var rating = data.rating; 
          	document.getElementById("hrateYoKemudahan").value=rating;

	  
          });

          
		});
 
		$(document).ready(function(){ 
			$('body').on('click','.feed-id', function(){
				document.getElementById("id_barang").value = $(this).attr('data-id');
			})
		});
 

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->
</body>
</html>
<?php } ?>