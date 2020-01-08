<?php
// cek apakah yang mengakses halaman ini sudah login

if(!isset($_SESSION['id_pedagang'])){
	header("location:./../index.php");
} else {
    $sql_view_menu = "SELECT name_menu FROM `menu` WHERE id_pedagang='" . $_SESSION['id_pedagang'] . "'";
    $query_view_menu= mysqli_query($koneksi, $sql_view_menu );
    $jml_menu = mysqli_fetch_array($query_view_menu);
    
    $cek_data = mysqli_num_rows($query_view_menu);
    $sql_jml_user = "SELECT menu.id_menu, pedagang.nama FROM menu JOIN pedagang ON menu.id_pedagang = pedagang.id_pedagang WHERE $_SESSION[id_pedagang]";
//   $query1_jml_user= mysqli_query($koneksi, $sql_jml_user );
//   $jumlah_data_user = mysqli_fetch_array($query1_jml_user);

//   $view_user = false;  
//   $cek_data_user = mysqli_num_rows($query1_jml_user);
//   if($cek_data_user == NULL) {
//       $hasil_jml_user = "Maaf, data tidak ada";
//       $view_user = true;
//   } else if ($cek_data_user > 0){
//       $hasil_jml_user = $jumlah_data_user['Jumlah'];
//       $view_user = false;
//   } else if ($cek_data_user == 0) {
//       $hasil_jml_user = '0';
//       $view_user = true;
//   } else {
//       echo "Gagal mendapatkan data";
//   }
}
?>