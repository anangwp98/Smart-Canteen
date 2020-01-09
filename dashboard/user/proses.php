<?php
include('../koneksi.php');
session_start();
if(isset($_POST['create_dompet'])) {
    $id_user        = $_SESSION['id_user'];
    $saldo = 0;
    $new_auto_increment = rand();
    $id="DP".$new_auto_increment;
    $query="INSERT INTO `dompet` (`id_dompet`, `saldo`, `id_user`) VALUES ('$id', '$saldo', '$id_user');";
    if(mysqli_query($koneksi, $query)) {
        header("location:./index.php");
    } else {
        echo"<script language='javascript'> alert('Data Gagal Disimpan!');history.go(-1); </script>";
    }
} else if(isset($_POST['input_topup'])) {
    $nominal            = $_POST['nominal'];
    $id_user            = $_SESSION['id_user'];

    date_default_timezone_set('Asia/Jakarta');
    $date = date('Y-m-d');
    
    $date_detail = date('Y-m-d H:i:s');
    $id="TP".rand().$date;
    $query="INSERT INTO `topup` (`id_topup`,`id_user`,`jml_topup`,`tgl_topup`) VALUES ('$id', '$id_user', '$nominal', '$date_detail' )";
    if(mysqli_query($koneksi, $query)) {
        $statusTopup = "sukses";
        header("location:./index.php");
    } else {
        echo"<script language='javascript'> alert('Data Gagal Disimpan!'); </script>";
    }
}
?>