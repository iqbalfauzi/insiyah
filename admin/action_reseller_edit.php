<?php 
include('include/config.php');
$id=$_POST['id_data'];
$nama=$_POST['nama'];
$email=$_POST['email'];
$noHP=$_POST['noHP'];
$jeniskelamin=$_POST['jeniskelamin'];
$username = $_POST['username'];
$password = $_POST['password'];
$alamat=$_POST['alamat'];


$sql=mysqli_query($con,"update seller set nama='$nama',email='$email',noHP='$noHP',jeniskelamin='$jeniskelamin',username='$username',password='$password',alamat='$alamat' where id='$id'");

if ($sql){
	?>
	<script language="javascript">
		alert("Data berhasil di Update");
	</script>
<?php 
header("location:seller.php");
} else
{
	echo"Data Gagal Disimpan";
}
?>