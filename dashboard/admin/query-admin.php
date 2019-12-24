<?php  
include('../koneksi.php');

// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['id_user'])){
	header("location:./../index.php");
} else {

  $sql_jml_admin = "SELECT count(*) as Jumlah from user WHERE level='admin'";
  $query1_jml_admin= mysqli_query($koneksi, $sql_jml_admin );
  $jumlah_data_admin = mysqli_fetch_array($query1_jml_admin);

  $sql_jml_user = "SELECT count(*) as Jumlah from user WHERE level='user'";
  $query1_jml_user= mysqli_query($koneksi, $sql_jml_user );
  $jumlah_data_user = mysqli_fetch_array($query1_jml_user);

  $view_user = false;  
  $cek_data_user = mysqli_num_rows($query1_jml_user);
  if($cek_data_user == NULL) {
      $hasil_jml_user = "Maaf, data tidak ada";
      $view_user = true;
  } else if ($cek_data_user > 0){
      $hasil_jml_user = $jumlah_data_user['Jumlah'];
      $view_user = false;
  } else if ($cek_data_user == 0) {
      $hasil_jml_user = '0';
      $view_user = true;
  } else {
      echo "Gagal mendapatkan data";
  }


  $query_jml_saldo = "SELECT SUM(saldo) AS 'jml_saldo' FROM dompet";
  $sql_jml_saldo= mysqli_query($koneksi, $query_jml_saldo );
  $jml_saldo = mysqli_fetch_array($sql_jml_saldo);

  $query_jml_pedagang = "SELECT COUNT(*) AS 'Jumlah' FROM pedagang";
  $sql_jml_pedagang = mysqli_query($koneksi, $query_jml_pedagang );
  $jml_pedagang  = mysqli_fetch_array($sql_jml_pedagang);

  $cek_data_pedagang = mysqli_num_rows($sql_jml_pedagang);
  if($cek_data_pedagang == NULL) {
      $hasil_jml_pedagang = "Maaf, data tidak ada";
      $view_pedagang = false;
  } else if ($cek_data_pedagang > 0){
      $hasil_jml_pedagang = $jml_pedagang['Jumlah'];
      $view_pedagang = false;
  } else if ($cek_data_pedagang == 0) {
      $hasil_jml_pedagang = '0';
      $view_pedagang = false;
  } else {
      echo "Gagal mendapatkan data";
  }

}
?>