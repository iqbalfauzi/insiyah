<?php
 include('includes/config.php'); 
 switch ($_GET['jenis']) {
  //ambil data kota / kabupaten
  case 'kota':
  $id_provinces = $_POST['id_prov'];
  if($id_provinces == ''){
       exit;
  }else{
       $getcity = mysqli_query($con,"SELECT  * FROM ref_kab WHERE id_prov ='$id_provinces' ORDER BY id_kab ASC") or die ('Query Gagal');
       while($data = mysqli_fetch_array($getcity)){
            echo '<option value="'.$data['id_kab'].'">'.$data['nama'].'</option>';
       }
       exit;    
  }
  break;

  //ambil data kecamatan
  case 'kecamatan':
  $id_regencies = $_POST['id_kab'];
  if($id_regencies == ''){
       exit;
  }else{
       $getcity = mysqli_query($con,"SELECT  * FROM ref_kec WHERE id_kab ='$id_regencies' ORDER BY id_kec ASC") or die ('Query Gagal');
       while($data = mysqli_fetch_array($getcity)){
            echo '<option value="'.$data['id_kec'].'">'.$data['nama'].'</option>';
       }
       exit;    
  }
  break;
  
  //ambil data kelurahan
  case 'kelurahan':
  $id_district = $_POST['id_kec'];
  if($id_district == ''){
       exit;
  }else{
       $getcity = mysqli_query($con,"SELECT * FROM ref_kel WHERE id_kec ='$id_district' ORDER BY id_kel ASC") or die ('Query Gagal');
       while($data = mysqli_fetch_array($getcity)){
            echo '<option value="'.$data['id_kel'].'">'.$data['nama'].'</option>';
       }
       exit;    
  }
  break;
 }
?>