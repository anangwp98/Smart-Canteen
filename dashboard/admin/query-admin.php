<?php  
include('../koneksi.php');

// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['username'])){
	header("location:./../index.php");
} else {

  $sql_jml_admin = "SELECT count(*) as Jumlah from users WHERE level='admin'";
  $query1_jml_admin= mysqli_query($koneksi, $sql_jml_admin );
  $jumlah_data_admin = mysqli_fetch_array($query1_jml_admin);

  $sql_jml_user = "SELECT count(*) as Jumlah from users WHERE level='user'";
  $query1_jml_user= mysqli_query($koneksi, $sql_jml_user );
  $jumlah_data_user = mysqli_fetch_array($query1_jml_user);

  $query_jml_saldo = "SELECT SUM(saldo) AS 'jml_saldo' FROM dompet";
  $sql_jml_saldo= mysqli_query($koneksi, $query_jml_saldo );
  $jml_saldo = mysqli_fetch_array($sql_jml_saldo);

  $query_jml_barang = "SELECT COUNT(*) AS 'Jumlah' FROM barang";
  $sql_jml_barang= mysqli_query($koneksi, $query_jml_barang );
  $jml_barang  = mysqli_fetch_array($sql_jml_barang);

  $view_user = false;  
  $cek_data_user = mysqli_num_rows($query1_jml_user);
  if($cek_data_user == NULL) {
      $hasil_jml_user = "Maaf, data tidak ada";
      $view_user = false;
  } else if ($cek_data_user > 0){
      $hasil_jml_user = $jumlah_data_user['Jumlah'];
      $view_user = true;
  } else if ($cek_data_user == 0) {
      $hasil_jml_user = '0';
      $view_user = true;
  } else {
      echo "Gagal mendapatkan data";
  }

  $cek_data_barang = mysqli_num_rows($sql_jml_barang);
  if($cek_data_barang == NULL) {
      $hasil_jml_barang = "Maaf, data tidak ada";
      $view_barang = false;
  } else if ($cek_data_barang > 0){
      $hasil_jml_barang = $jml_barang['Jumlah'];
      $view_barang = true;
  } else if ($cek_data_barang == 0) {
      $hasil_jml_barang = '0';
      $view_barang = true;
  } else {
      echo "Gagal mendapatkan data";
  }

}
?>