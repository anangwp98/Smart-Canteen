<?php
// cek apakah yang mengakses halaman ini sudah login

if(!isset($_SESSION['id_pedagang'])){
	header("location:./../index.php");
} else {
    $id_pedagang = $_SESSION['id_pedagang'];
    $sql_view_menu = "SELECT name_menu FROM `menu` WHERE id_pedagang=' $id_pedagang'";
    $query_view_menu= mysqli_query($koneksi, $sql_view_menu );
    $jml_menu = mysqli_fetch_array($query_view_menu);
    
    $cek_data = mysqli_num_rows($query_view_menu);

    if($cek_data == NULL) {
        $jml_menu = "Tidak ada menu di sini.";
    } else if ($cek_data > 0){
        $jml_menu = $cek_data['jml_menu'];
    } else if ($cek_data == 0) {
        $jml_menu = '0';
    } else {
        echo "Gagal mendapatkan data";
    }
}
?>