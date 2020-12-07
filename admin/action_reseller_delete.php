<?php 
include('include/config.php');
$id=$_GET['id'];

// echo($id);
// exit();


$sql=mysqli_query($con,"delete from seller where id='$id'");

if ($sql){
	?>
	<script language="javascript">
		alert("Data berhasil di Hapus");
		history.back();
	</script>
<?php 
// header("location:reseller.php");
} else
{
	echo"Data Gagal Disimpan";
}
?>