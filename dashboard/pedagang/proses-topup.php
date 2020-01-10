<?php 
include ('../koneksi.php');
session_start();
if(isset($_POST['simpan_topup'])){
    $id           = $_SESSION['id_pedagang'];
    $nama_user           = $_POST['id_user'];
    $jml_topup          = $_POST['totaltopup'];
    $id_topup = "TP-".rand();
    $id_log_topup = "LGTP-".rand();
    $query = "INSERT INTO `topup` (`id_topup`, `id_user`, `jml_topup`, `tgl_topup`, `status`) VALUES ('$id_topup', '$nama_user', '$jml_topup', CURRENT_TIMESTAMP(), 'SELESAI');";
    if(mysqli_query($koneksi, $query)) {

        
        
        $query_log = "INSERT INTO `log_topup` (`id`, `tgl_diterima`, `saldo_awal`, `saldo_akhir`, `id_user`, `id_topup`) VALUES ('$id_log_topup', CURRENT_TIMESTAMP(), '', '120000', '$nama_user', '$id_topup');";
        if(mysqli_query($koneksi, $query)) {
            header("location: ./index.php");
        } else {
            echo"<script language='javascript'> alert('Query Salah! Data Gagal Disimpan!');history.go(-1); </script>";
        }


    } else {
        echo"<script language='javascript'> alert('Query Salah! Data Gagal Disimpan!');history.go(-1); </script>";
    }
} else {
    echo "<script language='javascript'> alert('Data Gagal Disimpan!');history.go(-1); </script>";
}
?>