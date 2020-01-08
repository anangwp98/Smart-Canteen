<?php
// cek apakah yang mengakses halaman ini sudah login
if(!isset($_SESSION['id_user'])){
	header("location:./../index.php");
} else {
    $sql_view_saldo = "SELECT dompet.saldo as 'jmlsaldo' FROM `dompet` JOIN user ON user.id_user=dompet.id_user WHERE user.id_user='$_SESSION[id_user]'";
    $query_view_saldo= mysqli_query($koneksi, $sql_view_saldo );
    $jml_saldo = mysqli_fetch_array($query_view_saldo);
    
    $cek_data = mysqli_num_rows($query_view_saldo);

    if($cek_data == NULL) {
        $a = "Belum Memiliki Dompet";
        $showCreateDompet = true;
    } else if ($cek_data > 0){ 
        $mataUang = "Rp. ";
        $akhirMataUang = ",-";
        $a = $mataUang.$jml_saldo['jmlsaldo'].$akhirMataUang;
        $showCreateDompet = false;
    } else if ($cek_data == 0) {
        $a = '0';
    } else {
        echo "Gagal mendapatkan data";
    }

    $sql_view_total_pesanan = "SELECT SUM(total_bayar) as 'total_pesanan' FROM pemasanan WHERE id_user='$_SESSION[id_user]'";
    $query_view_total_pesanan= mysqli_query($koneksi, $sql_view_total_pesanan );
    $jml_total_pesanan = mysqli_fetch_array($query_view_total_pesanan);
    
    $cek_data_total_pesanan = mysqli_num_rows($query_view_total_pesanan);

    if($cek_data_total_pesanan == NULL) {
        $status_pesanan = "Belum Memiliki Pesanan Aktif";
    } else if ($cek_data_total_pesanan > 0){
        $mataUang = "Rp. ";
        $akhirMataUang = ",-";
        $status_pesanan = $mataUang.$jml_total_pesanan['total_pesanan'].$akhirMataUang;
    } else if ($cek_data_total_pesanan == 0) {
        $status_pesanan = '0';
    } else {
        echo "Gagal mendapatkan data";
    }

    $sql_view_total_menu = "SELECT COUNT(*) as jml_menu FROM menu";
    $query_view_total_menu = mysqli_query($koneksi, $sql_view_total_menu );
    $jml_total_menu = mysqli_fetch_array($query_view_total_menu);
    
    $cek_data_total_menu = mysqli_num_rows($query_view_total_menu);

    if($cek_data_total_menu == NULL) {
        $jml_menu = "Tidak ada menu di sini.";
    } else if ($cek_data_total_menu > 0){
        $jml_menu = $jml_total_menu['jml_menu'];
    } else if ($cek_data_total_menu == 0) {
        $jml_menu = '0';
    } else {
        echo "Gagal mendapatkan data";
    }
}
?>