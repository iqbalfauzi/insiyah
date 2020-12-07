<?php 
include('include/config.php');
$nama=$_POST['nama'];
$email=$_POST['email'];
$NoHP=$_POST['noHP'];
$jeniskelamin=$_POST['jeniskelamin'];
$username = $_POST['username'];
$password = $_POST['password'];
$alamat=$_POST['alamat'];


$sql=mysqli_query($con,"insert into seller(nama,email,noHP,jeniskelamin,username, password,alamat) values('$nama','$email','$NoHP','$jeniskelamin','$username','$password','$alamat')");

if ($sql){
	?>
	<script language="javascript">
		alert("Data berhasil di Simpan");
	</script>
<?php 
header("location:seller.php");
} else
{
	echo"Data Gagal Disimpan";
}
?>